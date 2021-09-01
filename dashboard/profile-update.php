<?php
    ob_start();
    require_once('inc/db.php');
    require_once('inc/session-start.php');
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $profile_img = $_FILES['Profile_image']['name'];
    $profile_img_name = $_FILES['Profile_image']['name'];
    $img_name_explode = explode('.',$profile_img_name);
    $imgExt =  end($img_name_explode);
    $newImgname = $id.'.'.$imgExt;
    $allowed_image_ext = ['JPG','jpg','JPEG','jpg','PNG','png','GIF','gif','svg','SVG'];
    $newLocation = '../profile-img/'.$newImgname;

    if(empty($name)){
        $_SESSION['profileNameUpdateEmpty']= "Name field could not be empty";
        header('location:edit-profile.php');
    }else if(empty($email)){
        $_SESSION['profileEmailUpdateEmpty']= "Email field could not be empty";
        header('location:edit-profile.php');
    }else if(empty($profile_img)){
        $_SESSION['profileImgUpdateEmpty']= "Image field could not be empty";
        header('location:edit-profile.php');
    }else if(!in_array($imgExt,$allowed_image_ext)){
        $_SESSION['profileImgExtErr']= "You trying to upload invalid attachment file  or anything else";
        header('location:edit-profile.php');
    }else if($_FILES['Profile_image']['size']>5000000){
        $_SESSION['profileSizeErr']= "You trying to upload big size attachment file, Maximum size 5MB";
        header('location:edit-profile.php');
    }
    else{
        $img_select = "SELECT * FROM user_info WHERE id = $id";
        $img_q = mysqli_query($db,$img_select);
        $img_assoc = mysqli_fetch_assoc($img_q);
        $img_assoc['profile_img'];
        $old_prImage_location = '../profile-img/'.$img_assoc['profile_img'];

        if($img_assoc['profile_img'] != 'default.png'){
            if(file_exists($old_prImage_location)){
                unlink($old_prImage_location);
            }
        }
        $update_query = "UPDATE user_info SET name='$name',email = '$email', profile_img = '$newImgname' WHERE id = $id";
        $update_q = mysqli_query($db,$update_query);   
        if($update_q){

            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['profile_img'] = $newImgname;
            move_uploaded_file($_FILES['Profile_image']['tmp_name'],$newLocation);
            header('location:edit-profile.php');
        }else{
            echo "ase";
        }
    }
    ob_end_flush();
?>