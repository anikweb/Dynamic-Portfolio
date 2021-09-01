<?php
    ob_start();
    require_once('inc/db.php');
    require_once('inc/session-start.php');
    $_SESSION['chCurrPswd'] = $curPswd= $_POST['CurPswd'];
    $_SESSION['chNewPswd'] = $newPswd= $_POST['pswd'];
    $_SESSION['chConPswd'] = $conPswd= $_POST['conPswd'];
    echo $id = $_SESSION['id'];
    $sessionPswd = $_SESSION['password'];
    $regexPassword = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%.]{8,20}$/';

    if(empty($curPswd)){
        $_SESSION['currPassEmpty'] = 'Please Enter Your Current Password';
        header('location:change-password.php');
    }else if(!password_verify($curPswd,$sessionPswd)){
        $_SESSION['currPassErr']= 'Incorrect Password';
        header('location:change-password.php');
    }
    else if(empty($newPswd)){
        $_SESSION['newPassEmpty']= 'Please Enter New Password';
        header('location:change-password.php');
    }else if(empty($conPswd)){
        $_SESSION['conPassEmpty']= 'Please Confirm Password';
        header('location:change-password.php');
    }else if($newPswd !=$conPswd){
        $_SESSION['passMatchErr']= 'Your Password Does Not Match!';
        header('location:change-password.php');
    }else if(!preg_match($regexPassword,$conPswd)){
        $_SESSION['passwordValidationErr'] = "Please Enter Valid Email <br>*May contain letter and numbers<br/>*Must contain at least 1 number and 1 letter<br/>*May contain any special characters<br>Must be 8-20 characters ";
        header('location:change-password.php');
    }
    else{
        $pass = password_hash($newPswd,PASSWORD_BCRYPT);
        $update = "UPDATE user_info SET password = '$pass' WHERE id= $id";
        $q = mysqli_query($db,$update);
        $_SESSION['changePassSucc']= 'You\'ve successfully changed password';
        $_SESSION['password'] = $pass;

        header('location:change-password.php');
    }
    ob_end_flush();
?>