<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    echo $id = $_GET['user_id'];
    $trash_item = "UPDATE services SET trash=2 WHERE id = $id";
    $trash_query = mysqli_query($db,$trash_item);
    if($trash_query){
        $_SESSION['moveTrashSuccess'] = 'move to trashSuccess';
        header('location:all-services.php');
    }else{
        echo "404 EROR";
    }
    ob_end_flush();
?>