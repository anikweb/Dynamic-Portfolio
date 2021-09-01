<?php
    ob_start();
    if($_SERVER['REQUEST_METHOD'] =="POST"){
        require_once('inc/db.php');
        session_start();
        $pdate= date('Y');
        $ndate = date('Y') +1;
        $copyright = 'Copyright '.$pdate.' - '.$ndate.' &copy; ';
        $text = $_POST['text'];
        $right = " | All Rights Reserved";
        $insert = "UPDATE copyright SET copyright='$copyright',text = '$text',rightReserved='$right'";
        $q = mysqli_query($db,$insert);
        if($q){
            $_SESSION['copyrightUpdated']='Copyright updated';
            header('location:settings-copyright.php');
        }else{
            "Failed";
        }
    }




    ob_end_flush();
?>