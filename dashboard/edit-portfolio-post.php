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
    $id = $_POST['id'];
    
    // list($width, $height) = getimagesize($_FILES['featured']['tmp_name']);
    // echo $width.'x'.$height;
    if(empty($title)){
        $_SESSION['titleEmpty'] = 'Title Field will not be empty';
        header('location:edit-portfolio.php');
    }else if(empty($category)){
        $_SESSION['categoryEmpty'] = 'Category Field will not be empty';
        header('location:edit-portfolio.php');
    }else if(empty($summary)){
        $_SESSION['summaryEmpty'] = 'Summary Field will not be empty';
        header('location:edit-portfolio.php');
    }else{
        
        $validImageExt = ['jpg','png','gif','svg'];
        
        // Featured Image 
        $featuredNameExplode = explode('.',$featuredName);
        $featuredExt = end($featuredNameExplode);
        $featuredExtLower = strtolower($featuredExt);
        $newFeaturedName = $id.'featured-image'.date('dmy').rand(1,2000).'.'.$featuredExtLower;
        $escapeSummary = mysqli_real_escape_string($db,$summary);
        $update = "UPDATE portfolios SET title = '$title', category ='$category', summary ='$escapeSummary' WHERE id = $id ";
        $q = mysqli_query($db,$update);
        if($q){
            $_SESSION['portfolioEditSuccess'] = 'Portfolio Add Success';
            if(!empty($thumbnailName)){
                $thumbnailNameExplode = explode('.',$thumbnailName);
                $thumbnailExt = end($thumbnailNameExplode);
                $thumbnailExtLower = strtolower($thumbnailExt);
                $newThumbnailName = $id.'thumbnail-image'.date('dmy').rand(1,3000).'.'.$thumbnailExtLower;
                $thumbnaiNewLocation = '../assets/img/portfolios/thumbnail/'.$newThumbnailName;
                if(!in_array($thumbnailExtLower,$validImageExt)){
                    $_SESSION['extensionErrThumb'] ='Attachment file is not valid';
                    header('location:edit-portfolio.php');
                }else if($_FILES['thumbnail']['size'] > 5000000){
                    $_SESSION['sizeErrThumb'] ='Max file size 5MB';
                    header('location:edit-portfolio.php');
                }else{
                    $thumbnailSelect = "SELECT * FROM portfolios WHERE id = $id";
                    $thumbnailQ = mysqli_query($db,$thumbnailSelect);
                    $thumbnail_assoc = mysqli_fetch_assoc($thumbnailQ);
                    $oldThumbnailImageName = $thumbnail_assoc['thumbnail_image'];
                    $oldImageLocation =  '../assets/img/portfolios/thumbnail/'.$oldThumbnailImageName;
                    if(file_exists($oldImageLocation)){
                        unlink($oldImageLocation);
                    }
                    $updateThumb = "UPDATE portfolios SET thumbnail_image = '$newThumbnailName' WHERE id = $id ";
                    $qThumb = mysqli_query($db,$updateThumb);
                    move_uploaded_file($thumbnailTmpName,$thumbnaiNewLocation);
                }
            }
            // Featured Image
            if(!empty($featuredName)){
                  
                if(!in_array($featuredExtLower,$validImageExt)){
                    $_SESSION['extensionErrFeat'] ='Attachment file is not valid';
                    header('location:edit-portfolio.php');
                }else if($_FILES['featured']['size'] > 5000000){
                    $_SESSION['sizeErrFeat'] ='Max file size 5MB';
                    header('location:edit-portfolio.php');
                }else{
                    // Featured Image
                    $featuredSelect = "SELECT * FROM portfolios WHERE id = $id";
                    $featuredQ = mysqli_query($db,$featuredSelect);
                    $featured_assoc = mysqli_fetch_assoc($featuredQ);
                    $oldFeaturedmageName = $featured_assoc['featured_image'];
                    $oldImageLocation = '../assets/img/portfolios/featured/'.$oldFeaturedmageName;
                    if(file_exists($oldImageLocation)){
                        unlink($oldImageLocation);
                    }
                    $updateFeatured = "UPDATE portfolios SET featured_image = '$newFeaturedName' WHERE id = $id ";
                    $qFeatured = mysqli_query($db,$updateFeatured);
                    if($qFeatured){
                        $featuredNewLocation = '../assets/img/portfolios/featured/'.$newFeaturedName;
                        move_uploaded_file($featuredTmpName,$featuredNewLocation);
                    }
                    
                }
            }
            $_SESSION['portfolioEditSuccess'] = 'Portfolio update Success';
            header('location:portfolios.php');
        }else{
            $_SESSION['portfolioEditFailed'] = 'Portfolio update Failed';
            header('location:portfolios.php');
        }
        
    }
    ob_end_flush();
?>