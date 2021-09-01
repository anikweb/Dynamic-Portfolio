<?php
    ob_start();
    require_once('inc/db.php');
    session_start();

    $id = $_GET['eduskill_id'];
    $restore_update = "UPDATE educationskill SET status = 1 WHERE id=$id";
    $restore_query = mysqli_query($db,$restore_update);
    if($restore_query){
        $_SESSION['restoreSuccess'] = "Your Data Restore Success";
        header('location:education-skill-trash.php');
    }else{
        $_SESSION['restoreErr'] = "Your Data Restore Erorr";
        header('location:education-skill-trash.php');
    }  
    ob_end_flush();
?>