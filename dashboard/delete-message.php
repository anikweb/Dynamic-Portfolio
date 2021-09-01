<?php
    ob_start();
    require_once('inc/db.php');
    $id = $_GET['message_id'];

    if(!empty($id)){
        $delete_select ="DELETE FROM messages WHERE id=$id";
        $delete_query = mysqli_query($db,$delete_select);
        if($delete_query){
            header('location:message.php');
        }
    }
    ob_end_flush();
?>