<?php
    ob_start();
    require_once('inc/db.php');
    $id = $_GET['user_id'];
    $id2 = $_GET['user_id2'];

    if(!empty($id)){
        $icon_select ="UPDATE services SET status = 2 WHERE id=$id";
        $icon_query = mysqli_query($db,$icon_select);
        if($icon_query){
            header('location:all-services.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }

    if(!empty($id2)){
        $icon_select ="UPDATE services SET status = 1 WHERE id=$id2";
        $icon_query = mysqli_query($db,$icon_select);
        if($icon_query){
            header('location:all-services.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }

    ob_end_flush();
?>