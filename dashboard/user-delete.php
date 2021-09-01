<?php    
    ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_GET['user_id'];
    $select_delete_item = "UPDATE user_info SET status = 2 WHERE id = $id";
    $delete_query = mysqli_query($db,$select_delete_item);
    if($delete_query){
        $_SESSION['item_moved-to_trash'] = 'Your Item Successfully Moved to trash';
        header('location:users.php');
    }
    ob_end_flush();
?>