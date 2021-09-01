<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_GET['trash_id'];    
    if(isset($id)){
        $trash = "UPDATE educationskill SET status = 2 WHERE id=$id";
        $q = mysqli_query($db,$trash);
        if($q){
            $_SESSION['trashSuccess']= 'Education moved to trash';
            header('location:education.php');
        }else{
            $_SESSION['trashFailed']= 'Education Failed to move trash';
            header('location:education.php');
        }
    }
    ob_end_flush();
?>