<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_GET['user_id'];
    $restore_update = "UPDATE user_info SET status = 1 WHERE id=$id";
    $restore_query = mysqli_query($db,$restore_update);
    if($restore_query){
        $_SESSION['restoreSuccess'] = "Your Data Restore Success";
        header('location:user-trash.php');
    }else{
        echo "<h2>404 EROR<h2>";
    }  
    ob_end_flush();
?>