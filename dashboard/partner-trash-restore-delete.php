<?php
    ob_start();
    require_once('inc/db.php');
    session_start();

    $id1 = $_GET['partner_id1'];
    $id2 = $_GET['partner_id2'];
    if($id1){
        $restore_update = "UPDATE partners SET trash = 1, status=2 WHERE id = $id1";
        $restore_query = mysqli_query($db,$restore_update);
        
        if($restore_query){
            $_SESSION['restoreSuccess'] = "Your Data Restore Success";
            header('location:partners-trash.php');
        }else{
            $_SESSION['restoreErr'] = "Your Data Restore Erorr";
            header('location:partners-trash.php');
        }  
    }

    if($id2){
        $delete = "DELETE FROM partners WHERE id = $id2";
        $deleteQ = mysqli_query($db,$delete);
        
        if($deleteQ){
            $_SESSION['trash_item_delted'] = "Your Data permanently Delete Success";
            header('location:partners-trash.php');
        }else{
            $_SESSION['deleteErr'] = "Your Data Delete Erorr";
            header('location:partners-trash.php');
        }  
    }
  
  

  ob_end_flush();
?>