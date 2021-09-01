<?php
    ob_start();
    session_start();
    require_once('inc/db.php');
    $siteTitle = $_POST['siteTitle'];
    $tagline = $_POST['tagline'];
    // Logo
    $logoName = $_FILES['logo']['name'];
    $logoTmpName = $_FILES['logo']['tmp_name'];
    $logoSize = $_FILES['logo']['size'];
    // Sticky Logo 
    $stickyLogoName = $_FILES['stickyLogo']['name'];
    $stickyLogoTmpName = $_FILES['stickyLogo']['tmp_name'];
    $stickyLogoSize = $_FILES['stickyLogo']['size'];
    // Site Icon
    $siteIconName = $_FILES['siteIcon']['name'];
    $siteIconTmpName = $_FILES['siteIcon']['tmp_name'];
    $siteIconSize = $_FILES['siteIcon']['size'];
    // Banner Image
    $bannerImageName = $_FILES['bannerImage']['name'];
    $bannerImageTmpName = $_FILES['bannerImage']['tmp_name'];
    $bannerImageSize = $_FILES['bannerImage']['size'];
    // LOGO
    $logoEext = explode('.',$logoName);
    $logoLwrExt = strtolower(end($logoEext));
    $logoValidExt = ['png','jpg','jpeg','gif','svg'];
    // Sticky Logo 
    $stickyLogoEext = explode('.',$stickyLogoName);
    $stickyLogoLwrExt = strtolower(end($stickyLogoEext));
    $stickyLogoValidExt = ['png','jpg','jpeg','gif','svg'];
    // site icon
    $siteIconExt = explode('.',$siteIconName);
    $siteIconLwrExt = strtolower(end($siteIconExt));
    $siteIconValidExt = ['png','jpg','jpeg','gif','svg'];
    // Banner Image
    $bannerImageExt = explode('.',$bannerImageName);
    $bannerImageLwrExt = strtolower(end($bannerImageExt));
    $bannerImageValidExt = ['png','jpg','jpeg','gif','svg'];
    
    $user_id = $_SESSION['id'];
    // New logo name
    $newLogoName = $user_id.'-'.'logo'.date('Y').date('m').date('d').'.'.$logoLwrExt;
     // New sticky logo name
    $newStickyLogoName = $user_id.'-'.'sticky-logo'.date('Y').date('m').date('d').'.'.$stickyLogoLwrExt;
    // New icon name
    $newSiteIconName = $user_id.'-'.'site-icon'.date('Y').date('m').date('d').'.'.$siteIconLwrExt;
    // Banner Image
    $newBannerImageName = $user_id.'-'.'banner-image'.date('Y').date('m').date('d').'.'.$bannerImageLwrExt;
    // Old logo location

    $oldLogoSelect = "SELECT * FROM site_identity";
    $oldLogoQ = mysqli_query($db,$oldLogoSelect);
    $oldLogoAssoc = mysqli_fetch_assoc($oldLogoQ);
    $oldLogoLocation = '../assets/img/site-identity/site-logo/'.$oldLogoAssoc['logo'];
    // Old Sticky Logo location \
    $oldStickyLogoLocation = '../assets/img/site-identity/sticky-logo/'.$oldLogoAssoc['sticky_logo'];
    // Old site icon location
    $oldSiteIconLocation = '../assets/img/site-identity/site-icon/'.$oldLogoAssoc['site_icon'];
    // Old banner Image location
    $oldBannerImageLocation = '../assets/img/site-identity/banner-image/'.$oldLogoAssoc['banner_image'];

    if(empty($siteTitle)){
        echo $_SESSION['siteTitleEmpty'] = "site title empty"; 
        die();
    }else if(empty($tagline)){
        echo $_SESSION['taglineEmpty'] = "tagline empty"; 
        die();     
    }else{
        // Old Images Delete, but default image would not be delete Condition.
        // site identity update.
        $siteIdentityUpdate = "UPDATE site_identity SET site_title ='$siteTitle',tagline='$tagline'";
        $siteIdentityQ = mysqli_query($db,$siteIdentityUpdate);
        if($siteIdentityQ){
            if(!empty($logoName)){
                if(!in_array($logoLwrExt,$logoValidExt)){
                    echo $_SESSION['InvalidAttachmentFile'] = "logo Invalid attachment file "; 
                    die();
                }else if($logoSize > 5000000){
                    echo $_SESSION['logoSizeErr'] = "Logo Size Crose 5MB";
                }else{
                    if($oldLogoAssoc['logo'] !='default.png'){
                        if(file_exists($oldLogoLocation)){
                            unlink($oldLogoLocation);
                        }
                    }
                    $siteLogoUpdate = "UPDATE site_identity SET logo='$newLogoName'";
                    $siteLogoQ = mysqli_query($db,$siteLogoUpdate);
                    if($siteLogoQ){
                        move_uploaded_file($logoTmpName,'../assets/img/site-identity/site-logo/'.$newLogoName);
                    }
                    
                }
            }
            if(!empty($stickyLogoName)){
                if(!in_array($stickyLogoLwrExt,$stickyLogoValidExt)){
                    echo $_SESSION['InvalidAttachmentFile'] = "sticky logo Invalid attachment file "; 
                    die();
                }else if($stickyLogoSize > 5000000){
                    echo $_SESSION['stickylogoSizeErr'] = "sticky Logo Size Crose 5MB";
                    die();
                }else{
                    if($oldLogoAssoc['sticky_logo'] !='default.png'){
                        if(file_exists($oldStickyLogoLocation)){
                            unlink($oldStickyLogoLocation);
                        }
                    }
                    $siteStickyLogoUpdate = "UPDATE site_identity SET sticky_logo='$newStickyLogoName'";
                    $siteStickyLogoQ = mysqli_query($db,$siteStickyLogoUpdate);
                    if($siteStickyLogoQ){
                        move_uploaded_file($stickyLogoTmpName,'../assets/img/site-identity/sticky-logo/'.$newStickyLogoName);
                    }
                }
            }
            if(!empty($siteIconName)){
                if(!in_array($siteIconLwrExt,$siteIconValidExt)){
                    echo $_SESSION['InvalidAttachmentFileIcon'] = "site icon Invalid attachment file "; 
                    die();
                }else if($siteIconSize > 5000000){
                    echo $_SESSION['siteIconSizeErr'] = "Site icon Size Crose 5MB";
                    die();
                }else{
                    if($oldLogoAssoc['site_icon'] !='default.png'){
                        if(file_exists($oldSiteIconLocation)){
                            unlink($oldSiteIconLocation);
                        }
                    }
                    $siteIconUpdate = "UPDATE site_identity SET site_icon='$newSiteIconName'";
                    $siteIconQ = mysqli_query($db,$siteIconUpdate);
                    if($siteIconQ){
                        move_uploaded_file($siteIconTmpName,'../assets/img/site-identity/site-icon/'.$newSiteIconName);
                    }
                }
            }
            // Banner Image
            if(!empty($bannerImageName)){
                if(!in_array($bannerImageLwrExt,$bannerImageValidExt)){
                    $_SESSION['InvalidAttachmentFileBanner'] = " banner Invalid attachment file"; 
                    header(location:settings-site-identity.php);
                }else if($bannerImageSize > 5000000){
                    $_SESSION['bannerImageSizeErr'] = "Banner Image Size Crose 5MB";
                    header(location:settings-site-identity.php);
                }else{
                    if($oldLogoAssoc['banner_image'] !='default.png'){
                        if(file_exists($oldBannerImageLocation)){
                            unlink($oldBannerImageLocation);
                        }
                    }
                    $siteBannerUpdate = "UPDATE site_identity SET `banner_image` ='$newBannerImageName'";
                    $siteBannerQ = mysqli_query($db,$siteBannerUpdate);
                    if($siteBannerQ){
                        move_uploaded_file($bannerImageTmpName,'../assets/img/site-identity/banner-image/'.$newBannerImageName);
                    }
                }
            }
            $_SESSION['siteIdentityUpdateSuccess'] = "Site identity update success";
            header('location:settings-site-identity.php');
            
        }
    
    }
    ob_end_flush();
?> 