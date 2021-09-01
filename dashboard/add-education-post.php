<?php
ob_start();
    if($_SERVER['REQUEST_METHOD'] =="POST"){
        require_once('inc/db.php');
        session_start();

        $name = $_POST['name'];
        $year = $_POST['year'];
        $performance = $_POST['performance'];

        if(empty($name)){
            $_SESSION['nameEmpty'] = "name empty";
            header('location:add-education-skill.php');
        }else if(empty($year)){
            $_SESSION['yearEmpty'] = "year empty";
            header('location:add-education-skill.php');
        }else if(strlen($year) != 4){
            $_SESSION['yearErr'] = "year Eror";
            header('location:add-education-skill.php');
        }else if(empty($performance)){
            $_SESSION['performanceEmpty'] = "performance empty";
            header('location:add-education-skill.php');
        }else{
            $insert = "INSERT INTO educationskill(name,year,perfomance) VALUES('$name','$year','$performance')";
            $q = mysqli_query($db,$insert);
            if($q){
                $_SESSION['educationAddSuccess']= 'Education Add Success';
                header('location:education.php');
            }else{
                $_SESSION['educationAddFailed']= 'Education Add Failed';
                header('location:add-education-skill.php');
            }
        }


        
    }
ob_end_flush();
?>