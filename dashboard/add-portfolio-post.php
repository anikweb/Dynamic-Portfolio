<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $_SESSION['PortTitle'] = $title = $_POST['title'];
    $_SESSION['PortCategory'] = $category = $_POST['category'];
    $_SESSION['PortThumbnail'] = $thumbnailName = $_FILES['thumbnail']['name'];
    $thumbnailTmpName = $_FILES['thumbnail']['tmp_name'];
    
    $_SESSION['PortFeatured'] = $featuredName = $_FILES['featured']['name'];
    $featuredTmpName = $_FILES['featured']['tmp_name'];
    $_SESSION['PortSummary'] = $summary = $_POST['summary'];
    $id = $_SESSION['id'];

    $thumbnailNameExplode = explode('.',$thumbnailName);
    $thumbnailExt = end($thumbnailNameExplode);
    $thumbnailExtLower = strtolower($thumbnailExt);
    $newThumbnailName = $id.'thumbnail-image'.date('dmy').rand(1,3000).'.'.$thumbnailExtLower;
    // Featured Image 
    $featuredNameExplode = explode('.',$featuredName);
    $featuredExt = end($featuredNameExplode);
    $featuredExtLower = strtolower($featuredExt);
    $newFeaturedName = $id.'featured-image'.date('dmy').rand(1,2000).'.'.$featuredExtLower;
    $escapeSummary = mysqli_real_escape_string($db,$summary);


    $validImageExt = ['jpg','png','gif','svg'];
    // list($width, $height) = getimagesize($_FILES['featured']['tmp_name']);
    // echo $width.'x'.$height;


    if(empty($title)){
        $_SESSION['titleEmpty'] = 'Title Field will not be empty';
        header('location:add-portfolio.php');
    }else if(empty($category)){
        $_SESSION['categoryEmpty'] = 'Category Field will not be empty';
        header('location:add-portfolio.php');
    }else if(empty($thumbnailName)){
        $_SESSION['thumbnailNameEmpty'] = 'Thumbnail Image Field will not be empty';
        header('location:add-portfolio.php');
    }else if(!in_array($thumbnailExtLower,$validImageExt)){
        $_SESSION['extensionErrThumb'] ='Attachment file is not valid';
        header('location:add-portfolio.php');
    }else if($_FILES['thumbnail']['size'] > 5000000){
        $_SESSION['sizeErrThumb'] ='Max file size 5MB';
        header('location:add-portfolio.php');
    }else if(empty($featuredName)){
        $_SESSION['featuredNameEmpty'] = 'Featured Image Field will not be empty';
        header('location:add-portfolio.php');
    }else if(!in_array($featuredExtLower,$validImageExt)){
        $_SESSION['extensionErrFeat'] ='Attachment file is not valid';
        header('location:add-portfolio.php');
    }else if($_FILES['featured']['size'] > 5000000){
        $_SESSION['sizeErrFeat'] ='Max file size 5MB';
        header('location:add-portfolio.php');
    }else if(empty($summary)){
        $_SESSION['summaryEmpty'] = 'Summary Field will not be empty';
        header('location:add-portfolio.php');
    }else{
        // Thumbnail Image
        unset($_SESSION['PortTitle']);
        unset($_SESSION['PortCategory']);
        unset($_SESSION['PortThumbnail']);
        unset($_SESSION['PortFeatured']);
        unset($_SESSION['PortSummary']);
        $insert = "INSERT INTO portfolios(title,category,thumbnail_image,featured_image,summary) VALUES('$title','$category','$newThumbnailName','$newFeaturedName','$escapeSummary')";
        $q = mysqli_query($db,$insert);
        if($q){
            // Thumbnail Image
            $thumbnaiNewLocation = '../assets/img/portfolios/thumbnail/'.$newThumbnailName;
            move_uploaded_file($thumbnailTmpName,$thumbnaiNewLocation);
            // Featured Image 
            $featuredNewLocation = '../assets/img/portfolios/featured/'.$newFeaturedName;
            move_uploaded_file($featuredTmpName,$featuredNewLocation);
            $_SESSION['portfolioAddSuccess'] = 'Portfolio Add Success';
            header('location:portfolios.php');
        }else{
            $_SESSION['portfolioAddFailed'] = 'Portfolio Add Failed';
            header('location:portfolios.php');
        }
        

        
    }
    ob_end_flush();
?>