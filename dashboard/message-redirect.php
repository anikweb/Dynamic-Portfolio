<?php
    ob_start();
    require_once('inc/db.php');
    session_start();

    $_SESSION['message_id'] = $id= $_GET['message_id'];
    if(isset($_SESSION['message_id'])){ 
        $updateMessage = "UPDATE messages SET status = 2 WHERE id = $id";
        $updateMessageQ = mysqli_query($db,$updateMessage);
        if($updateMessageQ){
            header('location:message-view.php');
        }
    }
    ob_end_flush();
?>