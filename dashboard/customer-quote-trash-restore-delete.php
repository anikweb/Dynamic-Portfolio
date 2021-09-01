<?php
    ob_start();
    require_once('inc/db.php');
    session_start();

    $id1 = $_GET['quote_id1'];
    $id2 = $_GET['quote_id2'];
    if($id1){
        $restore_update = "UPDATE customer_quotes SET trash = 1, status=2 WHERE id = $id1";
        $restore_query = mysqli_query($db,$restore_update);
        
        if($restore_query){
            $_SESSION['restoreSuccess'] = "Your Data Restore Success";
            header('location:customer-quote-trash.php');
        }else{
            $_SESSION['restoreErr'] = "Your Data Restore Erorr";
            header('location:customer-quote-trash.php');
        }  
    }

    if($id2){
        $delete = "DELETE FROM customer_quotes WHERE id = $id2";
        $deleteQ = mysqli_query($db,$delete);
        
        if($deleteQ){
            $_SESSION['deleteSuccess'] = "Your Data Permanently Delete Success";
            header('location:customer-quote-trash.php');
        }else{
            $_SESSION['deleteErr'] = "Your Data Permanently Delete Erorr";
            header('location:customer-quote-trash.php');
        }  
    }
  ob_end_flush();
?>