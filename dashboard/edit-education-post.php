<?php
    ob_start();
    if($_SERVER['REQUEST_METHOD'] =="POST"){
        require_once('inc/db.php');
        session_start();
        $id = $_POST['id'];
        $name = $_POST['name'];
        $year = $_POST['year'];
        $performance = $_POST['performance'];

        if(empty($name)){
            $_SESSION['nameEmpty'] = "name empty";
            header('location:edit-education-skill.php');
        }else if(empty($year)){
            $_SESSION['yearEmpty'] = "year empty";
            header('location:edit-education-skill.php');
        }else if(strlen($year) != 4){
            $_SESSION['yearErr'] = "year Eror";
            header('location:edit-education-skill.php');
        }else if(empty($performance)){
            $_SESSION['performanceEmpty'] = "performance empty";
            header('location:edit-education-skill.php');
        }else{
            $update = "UPDATE educationskill SET name = '$name', year = '$year', perfomance='$performance' WHERE id=$id";
            $q = mysqli_query($db,$update);
            if($q){
                $_SESSION['EducationEditSuccess']= 'Education edit success';
                header('location:education.php');
            }else{
                $_SESSION['EducationEditFailed']= 'Education edit failed';
                header('location:education.php');

            }
        }
    }
    ob_end_flush();
?>