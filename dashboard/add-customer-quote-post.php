<?php
ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_SESSION['id'];
    $_SESSION['nameOfCustomer'] = $nameOfCustomer = $_POST['nameOfCustomer'];
    $_SESSION['designation'] = $designation = $_POST['designation'];
    $ImageName = $_FILES['Image']['name'];
    $ImageTmpName = $_FILES['Image']['tmp_name'];
    $_SESSION['quote'] = $quote = $_POST['quote'];

    $ImageNameExplode = explode('.',$ImageName);
    $ImageExt = end($ImageNameExplode);
    $imageExtLower = strtolower($ImageExt);
    $newImageName = $id.'Customer-Image'.date('dmy').rand(1,3000).'.'.$imageExtLower;
   
    $escapeQuote = mysqli_real_escape_string($db,$quote);

    $validImageExt = ['jpg','png','gif','svg'];
    // list($width, $height) = getimagesize($_FILES['featured']['tmp_name']);
    // echo $width.'x'.$height;


    if(empty($nameOfCustomer)){
        $_SESSION['customerNameEmpty'] = 'Customer Name Field will not be empty';
        header('location:add-quote.php');
    }else if(empty($designation)){
        $_SESSION['designationEmpty'] = 'Designation Field will not be empty';
        header('location:add-quote.php');
    }else if(empty($ImageName)){
        $_SESSION['ImageEmpty'] = 'Image Field will not be empty';
        header('location:add-quote.php');
    }else if(!in_array($imageExtLower,$validImageExt)){
        $_SESSION['extensionErrImage'] ='Attachment file is not valid';
        header('location:add-quote.php');
    }else if($_FILES['image']['size'] > 5000000){
        $_SESSION['sizeErrimage'] ='Max file size 5MB';
        header('location:add-quote.php');
    }else if(empty($quote)){
        $_SESSION['quoteEmpty'] = 'Quote Field will not be empty';
        header('location:add-quote.php');
    }else{
        // Thumbnail Image
        unset($_SESSION['nameOfCustomer']);
        unset($_SESSION['designation']);
        unset($_SESSION['quote']);
        $insert = "INSERT INTO customer_quotes(c_name,c_designation,c_image,quote) VALUES('$nameOfCustomer','$designation','$newImageName','$escapeQuote')";
        $q = mysqli_query($db,$insert);
        if($q){
            // Thumbnail Image
            $imageNewLocation = '../assets/img/customer-quote/'.$newImageName;
            move_uploaded_file($ImageTmpName,$imageNewLocation);

            $_SESSION['quoteAddSuccess'] = 'Quote Successfully Added';
            header('location:customer-quotes.php');
        }else{
            $_SESSION['quoteAddFailed'] = 'Quote Failed to Add';
            header('location:customer-quotes.php');
        }
        

        
    }
ob_end_flush();
?>