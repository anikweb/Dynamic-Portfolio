<?php
    ob_start();
    require_once('inc/db.php');
    session_start();

    $id = $_GET['eduskill_id'];    
    if(isset($id)){
        $trash = "DELETE FROM educationskill WHERE id=$id";
        $q = mysqli_query($db,$trash);
        if($q){
            $_SESSION['trash_item_delted'] = 'Your Data Successfully Deleted Permanently';
            header('location:education-skill-trash.php');
        }else{
            $_SESSION['trashErr']= 'Erorr';
            header('location:education-skill-trash.php');
        }
    }
    ob_end_flush();
?>