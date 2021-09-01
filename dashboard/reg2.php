<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $_SESSION['rname'] = $name = $_POST['name'];
    $_SESSION['remail'] = $email= $_POST['email'];
    $_SESSION['rpswd'] = $pswd= $_POST['pswd'];
    $_SESSION['rconpswd'] = $conpswd= $_POST['conpswd'];
    $regexEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$/';
    $regexPassword = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%.]{8,20}$/';
    $email_select = "SELECT COUNT(*) as total, id FROM user_info WHERE email = '$email'";
    $email_check = mysqli_query($db,$email_select);
    $email_fetch = mysqli_fetch_assoc($email_check);

    if(empty($name)){
        $_SESSION['regNameErr'] = 'Please Enter Your Name!';
        header('location:../../registration.php');
    }
    else if (!preg_match ("/^[a-zA-Z ]*$/", $name) ) {
        $_SESSION['regNameTypeErr'] = "Only alphabets and whitespace are allowed.";
        header('location:../registration.php');
    }
    else if(empty($email)){
        $_SESSION['regEmailErr'] = 'Please Enter Your Password!';
        header('location:../registration.php');
    }
    else if(!preg_match($regexEmail,$email)){
        $_SESSION['regEmailValidationErr'] = "Please Enter Valid Email";
        header('location:../registration.php');
    }else if($email_fetch['total']>0){
        $_SESSION['regEmailFetchErr'] = "This email was already registered";
        header('location:../registration.php');
    }
    else if(empty($pswd)){
        $_SESSION['regPasswordErr'] = 'Please Create Password!';
        header('location:../registration.php');
    }else if(empty($conpswd)){
        $_SESSION['regConPasswordErr'] = 'Please Confirm Your Password!';
        header('location:../registration.php');
    }else if($pswd != $conpswd){
        $_SESSION['regPassworMatchdErr'] = 'Your Password Does Not Match!';
        header('location:../registration.php');
    }else if(!preg_match($regexPassword,$conpswd)){
        $_SESSION['regPasswordValidationErr'] = "Please Enter Valid Email <br>*May contain letter and numbers<br/>*Must contain at least 1 number and 1 letter<br/>*May contain any special characters<br>Must be 8-20 characters ";
        header('location:../registration.php');
    }
    else{
        $password = password_hash($_POST['pswd'],PASSWORD_BCRYPT);
        $insert = "INSERT INTO user_info (name,email,password) VALUES ('$name','$email','$password')";
        mysqli_query($db,$insert);
        $_SESSION['regSuccess2'] = 'User Registration Successfull';
        header('location:../admin');
    }
    ob_end_flush();
?>