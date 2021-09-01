<?php
    ob_start();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require_once('inc/db.php');
        session_start();
           $_SESSION['name'] =  $name = $_POST['name'];
           $_SESSION['email'] =  $email = $_POST['email'];
           $_SESSION['message'] =  $message = $_POST['message'];
        $regexEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$/';
        if(empty($name)){
            $_SESSION['nameEmpty'] = 'Name field will not be empty';
            header('location:../index.php#contact');
        }else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
            $_SESSION['nameErr'] = 'Name field will not carry any special charecter';
            header('location:../index.php#contact');
        }else if(empty($email)){
            $_SESSION['emailEmpty'] = 'Email field will not be empty';
            header('location:../index.php#contact');
        }else if(!preg_match($regexEmail,$email)){
            $_SESSION['emailValidationErr'] = "Please Enter Valid Email";
            header('location:../index.php#contact');
        }else if(empty($message)){
            $_SESSION['messageEmpty'] = 'Message field will not be empty';
            header('location:../index.php#contact');
        }else{
            unset($_SESSION['name']);
            unset($_SESSION['email']);
            unset($_SESSION['message']);
            $messageEscape = mysqli_real_escape_string($db,$message);
            date_default_timezone_set('Asia/Dhaka');
            $time = date('h:s D/M/Y');
            $insert = "INSERT INTO messages(name,email,message,time) VALUES('$name','$email','$messageEscape','$time')";
            $q = mysqli_query($db,$insert);
            if($q){
                $_SESSION['messageSent'] = 'Message Sent';
                $to = $email; // note the comma
                // Subject
                $subject = 'Got your message';
                // Message
                $message = 'Hello '.$name.' We have got Your message. Thanks for your message';
                // To send HTML mail, the Content-type header must be set
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                // Additional headers
                $headers[] = 'From: Anik Kumar Nandi <anik.mbf@gmail.com>';
                // Mail it
                $mail = mail($to, $subject, $message, implode("\r\n", $headers));
                header('location:../index.php#contact');
            }
            else{
                $_SESSION['messageSentFailed'] = 'Failed to send message';
                header('location:../index.php#contact');
            }
        }
    }
    ob_end_flush();
?>
