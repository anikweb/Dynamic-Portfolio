<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $id1 = $_GET['social_id1'];
    $id2 = $_GET['social_id2'];

    if(!empty($id1)){
        $update ="DELETE FROM social_icon WHERE id = $id1";
        $query = mysqli_query($db,$update);
        if($query){
            header('location:social-trash.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }

    if(!empty($id2)){
        $update ="UPDATE social_icon SET trash = 1, status='inactive' WHERE id = $id2";
        $query = mysqli_query($db,$update);
        if($query){
            $_SESSION['restoreSuccess'] = "Your Data Restore Success";
            header('location:social-trash.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }
    ob_end_flush();
?>