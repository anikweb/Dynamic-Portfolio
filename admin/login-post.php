<?php
    ob_start();
    require_once('../dashboard/inc/db.php');
    session_start();
    $_SESSION['loginEmail'] = $email = $_POST['email'];
    $pswd = $_POST['pswd'];
   
    if(empty($email)){
       	$_SESSION['loginEmailEmpty']="Email Field is required";
        header("location:index.php");

    }else if(empty($pswd)){
        $_SESSION['loginPassEmpty']="Password Field is required";
        header('location:index.php');
    }else{
        $select = "SELECT COUNT(*) as total, id, name, email, password, role FROM user_info WHERE email = '$email'";
        $query = mysqli_query($db,$select);
        $assoc = mysqli_fetch_assoc($query);

        if($assoc['total']>0){
            $hash = $assoc['password'];
            if(password_verify($pswd,$hash)){
                echo $_SESSION['id'] = $assoc['id'];
                header('location:../dashboard/index.php');
            }else{
                $_SESSION['loginPassErr']='Incorect Password!';
                header('location:index.php');
            }
        }else{
            $_SESSION['loginEmailErr'] = "You don't have an account with this email";
            header('location:index.php');
        }
    }   
    
    
ob_end_flush();
?>