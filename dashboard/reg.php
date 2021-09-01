<?php
    ob_start();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require_once('inc/db.php');
        if($_SERVER["REQUEST_METHOD"]=="POST"){
        session_start();
        $_SESSION['rname'] = $name = $_POST['name'];
        $_SESSION['remail'] = $email= $_POST['email'];
        $_SESSION['rpswd'] = $pswd= $_POST['pswd'];
        $_SESSION['rconpswd'] = $conpswd= $_POST['conpswd'];
        $regexEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$/';
        $regexPassword = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%.]{8,20}$/';
        $email_select = "SELECT COUNT(*) as total FROM user_info WHERE email = '$email'";
        $email_check = mysqli_query($db,$email_select);
        $email_fetch = mysqli_fetch_assoc($email_check);
        
        if(empty($name)){
            $_SESSION['nameErr'] = 'Please Enter Your Name!';
            header('location:insert.php');
        }
        else if (!preg_match ("/^[a-zA-Z ]*$/", $name) ) {
            $_SESSION['nameTypeErr'] = "Only alphabets and whitespace are allowed.";
            header('location:insert.php');
        }
        else if(empty($email)){
            $_SESSION['emailErr'] = 'Please Enter Your Password!';
            header('location:insert.php');
        }
        else if(!preg_match($regexEmail,$email)){
            $_SESSION['emailValidationErr'] = "Please Enter Valid Email";
            header('location:insert.php');
        }else if($email_fetch['total']>0){
            $_SESSION['emailFetchErr'] = "This email was already registered";
            header('location:insert.php');
        }
        else if(empty($pswd)){
            $_SESSION['passwordErr'] = 'Please Create Password!';
            header('location:insert.php');
        }else if(empty($conpswd)){
            $_SESSION['conPasswordErr'] = 'Please Confirm Your Password!';
            header('location:insert.php');
        }else if($pswd != $conpswd){
            $_SESSION['PassworMatchdErr'] = 'Your Password Does Not Match!';
            header('location:insert.php');
        }else if(!preg_match($regexPassword,$conpswd)){
            $_SESSION['passwordValidationErr'] = "Please Enter Valid Email <br>*May contain letter and numbers<br/>*Must contain at least 1 number and 1 letter<br/>*May contain any special characters<br>Must be 8-20 characters ";
            header('location:insert.php');
        }
        else{
            unset($_SESSION['rname']);
            unset($_SESSION['remail']);
            unset($_SESSION['rpswd']);
            unset($_SESSION['rconpswd']);
            $password = password_hash($_POST['pswd'],PASSWORD_BCRYPT);
            $insert = "INSERT INTO user_info (name,email,password) VALUES ('$name','$email','$password')";
            mysqli_query($db,$insert);
            $_SESSION['regSuccess'] = 'User Registration Successfull';
            header('location:users.php');
        }
    }else{
        
        header('location:insert.php');
    }
    }else{
        echo "<h1 style='text-align:center;font-size:50px;'>You are not able to redirect.<h1>"; 
    }
    ob_end_flush();
?>