<?php
    ob_start();
    require_once('inc/db.php');
    $id1 = $_GET['partner_id'];
    $id2 = $_GET['partner_id2'];

    if(!empty($id1)){
        $partner_select ="UPDATE partners SET status = 2 WHERE id=$id1";
        $partner_query = mysqli_query($db,$partner_select);
        if($partner_query){
            header('location:partners.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }
    if(!empty($id2)){
        $partner_select ="UPDATE partners SET status = 1 WHERE id=$id2";
        $partner_query = mysqli_query($db,$partner_select);
        if($partner_query){
            header('location:partners.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }

           
    ob_end_flush();
?>