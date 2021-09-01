<?php
    ob_start();
    require_once('inc/db.php');
    $id1 = $_GET['quote_id'];
    $id2 = $_GET['quote_id2'];

    if(!empty($id1)){
        $quote_select ="UPDATE customer_quotes SET status = 2 WHERE id=$id1";
        $quote_query = mysqli_query($db,$quote_select);
        if($quote_query){
            header('location:customer-quotes.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }
    if(!empty($id2)){
        $quote_select ="UPDATE customer_quotes SET status = 1 WHERE id=$id2";
        $quote_query = mysqli_query($db,$quote_select);
        if($quote_query){
            header('location:customer-quotes.php');
        }else{
            echo "<h1>DATABASE ERROR</h1>";
        }
    }

           
ob_end_flush();
?>