<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('location:../admin/index.php');
    }
?>
