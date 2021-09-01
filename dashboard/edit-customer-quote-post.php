<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_SESSION['id'];
    $id2 = $_POST['id'];
    $_SESSION['nameOfCustomer'] = $nameOfCustomer = $_POST['nameOfCustomer'];
    $_SESSION['designation'] = $designation = $_POST['designation'];
    $ImageName = $_FILES['Image']['name'];
    $ImageSize = $_FILES['Image']['size'];
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
        header('location:edit-customer-quote.php');
    }else if(empty($designation)){
        $_SESSION['designationEmpty'] = 'Designation Field will not be empty';
        header('location:edit-customer-quote.php');
    }else if(empty($quote)){
        $_SESSION['quoteEmpty'] = 'Quote Field will not be empty';
        header('location:edit-customer-quote.php');
    }else{
        // Image
        unset($_SESSION['nameOfCustomer']);
        unset($_SESSION['designation']);
        unset($_SESSION['quote']);
        $update = "UPDATE customer_quotes SET c_name='$nameOfCustomer',c_designation='$designation',quote='$escapeQuote' WHERE id = $id2";
        $q = mysqli_query($db,$update);
        if($q){
            if(!empty($ImageName)){
                if(!in_array($imageExtLower,$validImageExt)){
                    $_SESSION['extensionErrImage'] ='Attachment file is not valid';
                    header('location:edit-customer-quote.php');
                }else if($ImageSize > 5000000){
                    $_SESSION['sizeErrimage'] ='Max file size 5MB';
                    header('location:edit-customer-quote.php');
                }else{
                    $selectOldImage = "SELECT * FROM customer_quotes WHERE id = $id2";
                    $oldQ = mysqli_query($db,$selectOldImage);
                    $oldImage = mysqli_fetch_assoc($oldQ);
                    $imageOldLocation = '../assets/img/customer-quote/'.$oldImage['c_image'];

                    if(file_exists($imageOldLocation)){
                        unlink($imageOldLocation);
                    }
                    $updateImage = "UPDATE customer_quotes SET c_image ='$newImageName' WHERE id = $id2";
                    $qImage = mysqli_query($db,$updateImage);
                    if($qImage){
                        $imageNewLocation = '../assets/img/customer-quote/'.$newImageName;
                        move_uploaded_file($ImageTmpName,$imageNewLocation);
                        $_SESSION['quoteEditSuccess'] = 'Quote Successfully Edited';
                    }
                }
            }
            $_SESSION['quoteEditSuccess'] = 'Quote Edit Success';
            header('location:customer-quotes.php');

        }else{
            $_SESSION['quoteEditFailed'] = 'Quote Edit Failed';
            header('location:customer-quotes.php');
        }
    }
    ob_end_flush();
?>
