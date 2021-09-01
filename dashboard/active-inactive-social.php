<?php
ob_start();
    require_once('inc/db.php');
    $id = $_GET['user_id'];
    $id2 = $_GET['user_id2'];
    if(!empty($id)){
        $icon_select ="UPDATE social_icon SET status = 'inactive' WHERE id=$id";
        $icon_query = mysqli_query($db,$icon_select);
        if($icon_query){
            header('location:all-social.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
        
    }else if(!empty($id2)){
        $icon_select ="UPDATE social_icon SET status = 'active' WHERE id=$id2";
        $icon_query = mysqli_query($db,$icon_select);
        if($icon_query){
            header('location:all-social.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
        
    }

           
ob_end_flush();
?>