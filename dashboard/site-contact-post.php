<?php
    ob_start();
    require_once('inc/db.php');
    require_once('inc/session-start.php');
    $id = $_POST['id'];
    $type = $_POST['type'];
    $title = $_POST['title'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $socials = $_POST['socials'];
    $link = $_POST['link'];
    $address = $_POST['address'];

    if(empty($type)){
        $_SESSION['typeEmpty'] = "Type field will not be empty";
        header('location:edit-site-contact.php');
    }else if(empty($title)){
        $_SESSION['titleEmpty'] = "Title field will not be empty";
        header('location:edit-site-contact.php');
    }else if(empty($phone)){
        $_SESSION['phoneEmpty'] = "Phone field will not be empty";
        header('location:edit-site-contact.php');
    }else if(empty($email)){
        $_SESSION['emailEmpty'] = "Email field will not be empty";
        header('location:edit-site-contact.php');
    }else if(empty($socials)){
        $_SESSION['socialsEmpty'] = "Socials field will not be empty";
        header('location:edit-site-contact.php');
    }else if(empty($link)){
        $_SESSION['linkEmpty'] = "Link field will not be empty";
        header('location:edit-site-contact.php');
    }else if(empty($address)){
        $_SESSION['addressEmpty'] = "Address field will not be empty";
        header('location:edit-site-contact.php');
    }else{
        $update = "UPDATE site_contact SET type='$type',title='$title',address='$address',phone='$phone',email='$email',socials='$socials',link='$link' WHERE id=$id";
        $query = mysqli_query($db,$update);
        if($query){
            $_SESSION['siteContactUpdated'] = 'Site contact updated';
            header('location:settings-contact.php');
        }
    }
    ob_end_flush();
?>