<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_GET['quote_id3'];
    $trash_item = "UPDATE customer_quotes SET trash= 2 WHERE id = $id";
    $trash_query = mysqli_query($db,$trash_item);
    if($trash_query){
        $_SESSION['moveTrashSuccess'] = 'move to trashSuccess';
        header('location:customer-quotes.php');
    }else{
        echo "404 EROR";
    }
    ob_end_flush();
?>