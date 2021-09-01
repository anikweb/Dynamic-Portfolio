<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $_SESSION['icon'] = $icon = $_POST['icon'];
    $_SESSION['link'] = $link = ''.$_POST['link'];
    
    $icon_exist_select = "SELECT COUNT(*) as total FROM social_icon WHERE icon = '$icon'";
    $icon_exist_query = mysqli_query($db,$icon_exist_select);
    $icon_exist_fetch = mysqli_fetch_assoc($icon_exist_query);
    if($_SESSION['icon'] =="fab fa-facebook-f"){
        $iconName = 'Facebook';
    }else if($_SESSION['icon'] =="fab fa-twitter"){
        $iconName = 'Twitter';
    }else if($_SESSION['icon'] =="fab fa-instagram"){
        $iconName = 'Instagram';
    }else if($_SESSION['icon'] =="fab fa-linkedin-in"){
        $iconName = 'Linkedin';
    }
    if(empty($icon)){
        $_SESSION['iconEmpty'] = "Icon Could not be empty";
        header('location:add-social.php');
    }else if(empty($link)){
        $_SESSION['linkEmpty'] = "Link Could not be empty";
        header('location:add-social.php');
    }else if($icon_exist_fetch['total']>0){
        $_SESSION['iconExist'] = "You have already added".' '.$iconName;
        header('location:add-social.php');
    }else{
            $icon_select ="INSERT social_icon(icon,link) VALUES('$icon','$link')";
            $icon_query = mysqli_query($db,$icon_select);
            $_SESSION['socialAddSuccess'] = 'You have added social icon of '.$iconName;
            unset($_SESSION['icon']);
            unset($_SESSION['link']);
            header('location:all-social.php');
    }
    ob_end_flush();
?>

