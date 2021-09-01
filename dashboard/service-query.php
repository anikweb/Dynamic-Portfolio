<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $_SESSION['name'] = $name = $_POST['name'];
    $_SESSION['icon'] = $icon = $_POST['icon'];
    $_SESSION['summary'] = $summary = $_POST['summary'];
    if(empty($name)){
        $_SESSION['nameEmpty'] = "Name Could not be empty";
        header('location:add-services.php');
    }else if(empty($icon)){
        $_SESSION['iconEmpty'] = "Icon Could not be empty";
        header('location:add-services.php');
    }else if(empty($summary)){
        $_SESSION['summaryEmpty'] = "Summary Could not be empty";
        header('location:add-services.php');
    }else{
        $service_select ="INSERT services (name,icon,summary) VALUES('$name','$icon','$summary')";
        $service_query = mysqli_query($db,$service_select);
        $_SESSION['serviceaddSuccess'] = 'Services Added';
        unset($_SESSION['name']);
        unset($_SESSION['icon']);
        unset($_SESSION['summary']);
        header('location:all-services.php');
    }
    ob_end_flush();
?>

