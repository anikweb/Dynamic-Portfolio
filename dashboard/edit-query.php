<?php
    ob_start();
    require_once('inc/db.php');
    session_start();

    $id2 = $_POST['id2'];
    $name2 = $_POST['name2'];
    $email2 = $_POST['email2'];

    $update_select ="UPDATE user_info SET name = '$name2',email='$email2' WHERE id = $id2";
    $update_query = mysqli_query($db,$update_select);
    if($update_query){
        $_SESSION['updateSuccess'] = 'Information Updated';
        header('location:users.php');
    }
    ob_end_flush();
?>

