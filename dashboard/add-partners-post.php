<?php
ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_SESSION['id'];
    $_SESSION['name'] = $name = $_POST['name'];
    $_SESSION['alt_name'] = $altName = $_POST['alt_name'];
    $ImageName = $_FILES['Image']['name'];
    $ImageTmpName = $_FILES['Image']['tmp_name'];
    
    $ImageNameExplode = explode('.',$ImageName);
    $ImageExt = end($ImageNameExplode);
    $imageExtLower = strtolower($ImageExt);
    $newImageName = $id.'partners-image'.date('dmy').rand(1,3000).'.'.$imageExtLower;
   
    $validImageExt = ['jpg','png','gif','svg'];
    // list($width, $height) = getimagesize($_FILES['featured']['tmp_name']);
    // echo $width.'x'.$height;


    if(empty($name)){
        $_SESSION['nameEmpty'] = 'Name Field will not be empty';
        header('location:add-partners.php');
    }else if(empty($altName)){
        $_SESSION['altNameEmpty'] = 'Alt Name Field will not be empty';
        header('location:add-partners.php');
    }else if(empty($ImageName)){
        $_SESSION['ImageEmpty'] = 'Image Field will not be empty';
        header('location:add-partners.php');
    }else if(!in_array($imageExtLower,$validImageExt)){
        $_SESSION['extensionErrImage'] ='Attachment file is not valid';
        header('location:add-partners.php');
    }else if($_FILES['image']['size'] > 5000000){
        $_SESSION['sizeErrimage'] ='Max file size 5MB';
        header('location:add-partners.php');
    }else{
        // Thumbnail Image
        unset($_SESSION['name']);
        unset($_SESSION['alt_name']);
        $insert = "INSERT INTO partners(p_name,alt_name,p_image) VALUES('$name','$altName','$newImageName')";
        $q = mysqli_query($db,$insert);
        if($q){
            // Thumbnail Image
            $imageNewLocation = '../assets/img/partners/'.$newImageName;
            move_uploaded_file($ImageTmpName,$imageNewLocation);

            $_SESSION['partnersAddSuccess'] = 'Partners Successfully Added';
            header('location:partners.php');
        }else{
            $_SESSION['partnersAddFailed'] = 'Partners Failed to Add';
            header('location:partners.php');
        }
        

        
    }
    ob_end_flush();
?>