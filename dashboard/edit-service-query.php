<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $id= $_POST['id'];
    $name= $_POST['name'];
    $icon= $_POST['icon'];
    $summary= $_POST['summary'];

    if(empty($name)){
        echo $_SESSION['nameEmpty'] = 'Name Field will not be empty';
        header('location:edit-services.php');
    }else if(empty($icon)){
        echo $_SESSION['iconEmpty'] = 'icon Field will not be empty';
        header('location:edit-services.php');
    }else if(empty($summary)){
        echo $_SESSION['summaryEmpty'] = 'summary Field will not be empty';
        header('location:edit-services.php');
    }else{
        $edit_service_select = "UPDATE services SET name = '$name',icon = '$icon', summary = '$summary' WHERE id = $id";
        $edit_service_query = mysqli_query($db,$edit_service_select);
        if($edit_service_query){
            $_SESSION['editServiceSuccess'] = "Service Edited";
            header('location:all-services.php');
        }
    }
    ob_end_flush();
?>









      



















?>