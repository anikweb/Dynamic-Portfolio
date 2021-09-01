<?php
    ob_start();
    if($_SERVER['REQUEST_METHOD']=="POST"){
        require_once('inc/db.php');
        session_start();
        $value = $_POST['value'];
        $id = $_POST['id'];

        if(empty($value)){
           $_SESSION['valueEmpty']='Value will not be empty';
            header("location:edit-fact-value.php?factid=$id");
        }else{
            $update = "UPDATE facts SET value='$value' WHERE id = $id";
            $updateQ = mysqli_query($db,$update);
            if($updateQ){
                $_SESSION['factValueUpdateSuccess'] = 'Fact Value Updated';
                header('location:facts.php');
            }else{
                $_SESSION['factValueUpdateFailed'] = 'Fact Value Update Failed';
                header('location:facts.php');
            }
        }
    }
    ob_end_flush();
?>