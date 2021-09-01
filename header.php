<?php
    require_once('dashboard/inc/db.php');
    session_start();
    $role_select = "SELECT * FROM user_info WHERE role = 3";
    $roleQuery = mysqli_query($db,$role_select);
    $role_assoc = mysqli_fetch_assoc($roleQuery);
    $id = $role_assoc['id'];
    $nameSelect = "SELECT * FROM user_info WHERE id=$id";
    $nameQuery = mysqli_query($db,$nameSelect);
    $userAssoc = mysqli_fetch_assoc($nameQuery);
    $iconSelect = "SELECT * FROM social_icon WHERE status = 'active'";
    $icon_query = mysqli_query($db,$iconSelect);
   
    $service_select = "SELECT * FROM services WHERE status=1 AND trash=1";
    $servicesQuery = mysqli_query($db,$service_select);
    $services_assoc = mysqli_fetch_assoc($servicesQuery);

    $siteIdentitySelect = "SELECT * FROM site_identity";
    $siteIdentitySelect = mysqli_query($db,$siteIdentitySelect);
    $siteIdentityAssoc = mysqli_fetch_assoc($siteIdentitySelect);
        
    $select = "SELECT * FROM copyright";
    $q = mysqli_query($db,$select);
    $assoc = mysqli_fetch_assoc($q);

    $selectContact = "SELECT * FROM site_contact WHERE type='primary'";
    $contactQ = mysqli_query($db,$selectContact);
    $ContactAssoc = mysqli_fetch_assoc($contactQ);

    $selectAbout = "SELECT * FROM about WHERE status= 1";
    $aboutQ = mysqli_query($db,$selectAbout);
    $aboutAssoc = mysqli_fetch_assoc($aboutQ);
    $selectPort = "SELECT * FROM portfolios WHERE status = 1 AND trash=1 ORDER BY id ASC";
    $portQ = mysqli_query($db,$selectPort);
    $expldPageLocation = explode('/',$_SERVER['PHP_SELF']);
    $currentPage = end($expldPageLocation);


?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
     
    <!--Facebook OG-->
    <meta property="og:url"                content="http://www.aniknandi.com" />
    <meta property="og:type"               content="laravel, e-commerce, student management system, hospital management system" />
    <meta property="og:title"              content="Professional Web Developer" />
    <meta property="og:description"        content="I will develope your web application" />
    <meta property="og:image"              content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />
    
    
    
    
    
    
    <title>
    <?php 
    if($currentPage == 'index.php'){
      echo $siteIdentityAssoc['site_title'];
    }else if($currentPage == 'portfolio-single.php'){
        echo 'Single Portfolio';
    }
    echo '- '.$siteIdentityAssoc['tagline'];
    ?>
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/site-identity/site-icon/<?=$siteIdentityAssoc['site_icon'];?>">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="port-assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="port-assets/css/animate.min.css">
    <link rel="stylesheet" href="port-assets/css/magnific-popup.css">
    <link rel="stylesheet" href="port-assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="port-assets/css/flaticon.css">
    <link rel="stylesheet" href="port-assets/css/slick.css">
    <link rel="stylesheet" href="port-assets/css/aos.css">
    <link rel="stylesheet" href="port-assets/css/default.css">
    <link rel="stylesheet" href="port-assets/css/style.css">
    <link rel="stylesheet" href="port-assets/css/responsive.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="theme-bg">
        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->
        <!-- header-start -->
<header>
    <div id="header-sticky" class="transparent-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="main-menu">
                        <nav class="navbar navbar-expand-lg">
                            <a href="index.php" class="navbar-brand logo-sticky-none"><img width="200px" src="assets/img/site-identity/site-logo/<?=$siteIdentityAssoc['logo'];?>" alt="Logo"></a>
                            <a href="index.php" class="navbar-brand s-logo-none"><img width="150px" src="assets/img/site-identity/sticky-logo/<?=$siteIdentityAssoc['sticky_logo'];?>" alt="Logo"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarNav">
                                <span class="navbar-icon"></span>
                                <span class="navbar-icon"></span>
                                <span class="navbar-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item <?= $currentPage == 'index.php' ? 'active': ''?>"><a class="nav-link" href="<?= $currentPage == 'index.php' ? '#home' : 'index.php' ?>">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= $currentPage == 'index.php' ? '#about' : 'index.php#about' ?> ">about</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= $currentPage == 'index.php' ? '#service' : 'index.php#service' ?>">service</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= $currentPage == 'index.php' ? '#portfolio' : 'index.php#portfolio' ?>">portfolio</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= $currentPage == 'index.php' ? '#contact' : 'index.php#contact' ?>">Contact</a></li>
                                    
                                </ul>
                            </div>
                            <div class="header-btn">
                                <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offcanvas-start -->
    <div class="extra-info">
        <div class="close-icon menu-close">
            <button>
                <i class="far fa-window-close"></i>
            </button>
        </div>
        <div class="logo-side mb-30">
            <a href="index.php">
                <img width="200px" src="assets/img/site-identity/sticky-logo/<?=$siteIdentityAssoc['sticky_logo'];?>" alt="" />
            </a>
        </div>
        <div class="side-info mb-30">
            <div class="contact-list mb-30">
                <h4><?= $ContactAssoc['title']?></h4>
                <p><?= $ContactAssoc['address']?></p>
            </div>
            <div class="contact-list mb-30">
                <h4>Phone Number</h4>
                <p><?= $ContactAssoc['phone']?></p>
            </div>
            <div class="contact-list mb-30">
                <h4>Email Address</h4>
                <p><?= $ContactAssoc['email']?></p>
            </div>
        </div>
        <div class="social-icon-right mt-20">
            <a href="https://<?= $ContactAssoc['link']?>"><i class="<?= $ContactAssoc['socials']?>"></i></a>
        </div>
    </div>
    <div class="offcanvas-overly"></div>
    <!-- offcanvas-end -->
</header>