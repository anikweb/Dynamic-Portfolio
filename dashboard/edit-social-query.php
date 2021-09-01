<?php
    ob_start();
    require_once('inc/db.php');
    session_start();

    $id = $_POST['id'];
    $link = 'https://'.$_POST['link'];
    $icon_select = "SELECT * FROM social_icon WHERE id=$id";
    $icon_q = mysqli_query($db,$icon_select);
    $icon_assoc = mysqli_fetch_assoc($icon_q);
    
    if($icon_assoc['icon'] =="fab fa-facebook-f"){
        $iconName = 'Facebook';
    }else if($icon_assoc['icon'] =="fab fa-twitter"){
        $iconName  = 'Twitter';
    }else if($icon_assoc['icon'] =="fab fa-instagram"){
        $iconName  = 'Instagram';
    }else if($icon_assoc['icon'] =="fab fa-linkedin-in"){
        $iconName = 'Linkedin';
    }
    
    if(empty($link)){
        $_SESSION['linkEmpty'] = "Link Could not be empty";
        header('location:edit-social.php');
    }else{
        $link_select ="UPDATE social_icon SET link = '$link' WHERE id=$id";
        $link_query = mysqli_query($db,$link_select);
        $_SESSION['socialUpdateSuccess'] = 'You have successfully edited link address of '.$iconName;
        header('location:all-social.php');
    }
    ob_end_flush();
?>