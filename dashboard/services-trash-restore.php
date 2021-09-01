<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_GET['user_id'];
    $restore_update = "UPDATE services SET trash = 1, status = 2 WHERE id=$id";
    $restore_query = mysqli_query($db,$restore_update);
    if($restore_query){
        $_SESSION['restoreSuccess'] = "Your Data Restore Success";
        header('location:services-trash.php');
    }else{
        echo "<h2>404 EROR<h2>";
    }  
    ob_end_flush();
?>