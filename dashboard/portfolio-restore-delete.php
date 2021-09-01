<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_GET['user_id'];
    $id2 = $_GET['user_id2'];

    if(!empty($id)){
        $portfolio_delete ="DELETE FROM portfolios WHERE id = $id";
        $portfolio_query = mysqli_query($db,$portfolio_delete);
        if($portfolio_query){
            $_SESSION['trash_item_delted'] = 'Your Data Successfully Deleted Permanently';
            header('location:portfolio-trash.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }
    if(!empty($id2)){
        $portfolio_select ="UPDATE portfolios SET status=2, trash = 1 WHERE id=$id2";
        $portfolio_query = mysqli_query($db,$portfolio_select);
        if($portfolio_query){
            $_SESSION['restoreSuccess'] = 'Your Data Restore Success';
            header('location:portfolio-trash.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }
    ob_end_flush();
?>