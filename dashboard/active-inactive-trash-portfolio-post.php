<?php
ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_GET['user_id'];
    $id2 = $_GET['user_id2'];
    $id3 = $_GET['user_id3'];

    if(!empty($id)){
        $portfolio_select ="UPDATE portfolios SET status = 2 WHERE id=$id";
        $portfolio_query = mysqli_query($db,$portfolio_select);
        if($portfolio_query){
            header('location:portfolios.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }

    if(!empty($id2)){
        $portfolio_select ="UPDATE portfolios SET status = 1 WHERE id=$id2";
        $portfolio_query = mysqli_query($db,$portfolio_select);
        if($portfolio_query){
            header('location:portfolios.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }

    if(!empty($id3)){
        $portfolio_select ="UPDATE portfolios SET trash = 2 WHERE id= $id3";
        $portfolio_query = mysqli_query($db,$portfolio_select);
        if($portfolio_query){
            $_SESSION['portfolioMoveTrashSuccess']='Portfolio Move to Trash Success';
            header('location:portfolios.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }

           
ob_end_flush();
?>