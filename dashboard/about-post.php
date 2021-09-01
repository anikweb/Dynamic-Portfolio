<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $str = mysqli_real_escape_string($db,$summary);
    if(isset($db)){
        $update = "UPDATE about SET title='$title',aboutSumm='$str'";
        $updateQ = mysqli_query($db,$update);
        if($updateQ){
            $_SESSION['aboutUpdateSuccess'] = 'About update success';
            header('location:settings-about.php');
        }
        
    }
    ob_end_flush();
    ?>