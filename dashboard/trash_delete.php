<?php 
    ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_GET['user_id'];
    $delete_item = "DELETE FROM user_info WHERE id = $id";
    $delete_query = mysqli_query($db,$delete_item);
    if($delete_query){
        $_SESSION['trash_item_delted'] = 'Your Data Successfully Deleted Permanently';
        header('location:user-trash.php');
    }else{
        echo "404 EROR";
    }
    ob_end_flush();
?>