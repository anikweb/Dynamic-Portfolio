<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_GET['social_id3'];

    if(!empty($id)){
        $update ="UPDATE social_icon SET trash =2 WHERE id = $id";
        $query = mysqli_query($db,$update);
        if($query){
            $_SESSION['socialMoveTrashSuccess'] = 'Social Moved to Trash';
            header('location:all-social.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }
    ob_end_flush();
?>