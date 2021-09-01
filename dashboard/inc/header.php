<?php 
  require_once('session-start.php');
  require_once('db.php');
  $h_user_id = $_SESSION['id'];
  $h_user_select = "SELECT * FROM user_info WHERE id = $h_user_id";
  $h_user_query = mysqli_query($db,$h_user_select);
  $h_user_assoc = mysqli_fetch_assoc($h_user_query);

  $siteIdentityselect = "SELECT * FROM site_identity";
  $siteIdentityquery = mysqli_query($db,$siteIdentityselect);
  $siteIdentityAassoc = mysqli_fetch_assoc($siteIdentityquery);

  $php_self = $_SERVER['PHP_SELF'];
  $cpage_explode = explode('/',$php_self);
  $current_page =end($cpage_explode);

  $selectMessage = "SELECT * FROM messages WHERE status=1";
  $messagequery = mysqli_query($db,$selectMessage);
  $messageCount = mysqli_num_rows($messagequery);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Meta -->
    <meta name="description" content="Anik Kumar Nandi is a Web Developer From Mymensingh,Bangladesh">
    <meta name="author" content="Anik Kumar Nandi">

    <title>
    <?php 
      if($current_page=='index.php'){
        echo 'Home';
      }else if($current_page=='users.php'){
        echo 'All Users';
      }else if($current_page=='insert.php'){
        echo 'Insert Users';
      }else if($current_page=='edit.php'){
        echo 'Edit Users';
      }else if($current_page=='all-services.php'){
        echo 'All Services';
      }else if($current_page=='add-services.php'){
        echo 'Add Services';
      }else if($current_page=='edit-services.php'){
        echo 'Edit Services';
      }else if($current_page=='portfolios.php'){
        echo 'All Portfolio';
      }else if($current_page=='add-portfolio.php'){
        echo 'Add Portfolio';
      }else if($current_page=='edit-portfolio.php'){
        echo 'Edit Portfolio';
      }else if($current_page=='education.php'){
        echo 'All Education';
      }else if($current_page=='add-education-skill.php'){
        echo 'Add Education';
      }else if($current_page=='edit-education-skill.php'){
        echo 'Edit Education';
      }else if($current_page=='all-social.php'){
        echo 'All Socials';
      }else if($current_page=='add-social.php'){
        echo 'Add Socials';
      }else if($current_page=='edit-social.php'){
        echo 'Edit Socials';
      }else if($current_page=='facts.php'){
        echo 'All Facts';
      }else if($current_page=='edit-fact-value.php'){
        echo 'Edit Facts';
      }else if($current_page=='customer-quotes.php'){
        echo 'All Customer Quotes';
      }else if($current_page=='add-quote.php'){
        echo 'Add Customer Quotes';
      }else if($current_page=='edit-customer-quote.php'){
        echo 'Edit Customer Quotes';
      }else if($current_page=='partners.php'){
        echo 'All Partners';
      }else if($current_page=='add-partners.php'){
        echo 'Add Partners';
      }else if($current_page=='edit-partners.php'){
        echo 'Edit Partners';
      }else if($current_page=='message.php'){
        echo 'All Message';
      }else if($current_page=='message-view.php'){
        echo 'Read Message';
      }else if($current_page=='settings-site-identity.php'){
        echo 'Site Identity';
      }else if($current_page=='edit-site-identity.php'){
        echo 'Edit Site Identity';
      }else if($current_page=='settings-about.php'){
        echo 'About';
      }else if($current_page=='edit-about.php'){
        echo 'Edit About';
      }else if($current_page=='settings-contact.php'){
        echo 'Contact';
      }else if($current_page=='add-site-contact.php'){
        echo 'Add Contact';
      }else if($current_page=='edit-site-contact.php'){
        echo 'Edit Contact';
      }else if($current_page=='settings-copyright.php'){
        echo 'Copyright';
      }else if($current_page=='edit-copyright.php'){
        echo 'Edit Copyright';
      }else if($current_page=='user-trash.php'){
        echo 'User Trash';
      }else if($current_page=='social-trash.php'){
        echo 'Social Trash';
      }else if($current_page=='services-trash.php'){
        echo 'Services Trash';
      }else if($current_page=='portfolio-trash.php'){
        echo 'Portfolios Trash';
      }else if($current_page=='education-skill-trash.php'){
        echo 'Education or Skill Trash';
      }else if($current_page=='customer-quote-trash.php'){
        echo 'Customer Quotes Trash';
      }else if($current_page=='partners-trash.php'){
        echo 'Partners Trash';
      }else{
        echo "Unknwon";
      }
      ?> - Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/site-identity/site-icon/<?=$siteIdentityAassoc['site_icon'];?>">
    <!-- vendor css -->
    <link href="../assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet">

    <!--CSS -->
    <link rel="stylesheet" href="../assets/css/starlight.css">
    <!-- jquery -->
    <script src="../assets/lib/jquery/jquery.js"></script>
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="index.php" class="tx-20" ><i class="icon ion-android-star-outline"></i> <?=$siteIdentityAassoc['site_title']?></a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="index.php" class="sl-menu-link <?= $current_page=='index.php' ? 'active' : '' ?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a>
        <!-- sl-menu-link -->          
        </a>
        <a href="../index.php" target="_blank" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-eye tx-20"></i>
            <span class="menu-item-label">Visit Site</span>
          </div>
          <!-- menu-item -->
        </a>
        <a href="users.php" class="sl-menu-link <?php if($current_page=='users.php' || $current_page=='insert.php' || $current_page=='edit.php'  ){echo 'active';}?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-users tx-20"></i>
            <span class="menu-item-label">Users</span>
          </div>
          <!-- menu-item -->
        </a>
        <a href="all-services.php" class="sl-menu-link <?php if($current_page=='all-services.php' || $current_page=='add-services.php'  || $current_page=='edit-services.php'){echo 'active';} ?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-briefcase tx-20"></i>
            <span class="menu-item-label">All Services</span>
          </div>
          <!-- menu-item -->
        </a>
        <a href="portfolios.php" class="sl-menu-link <?php if($current_page=='portfolios.php' || $current_page=='add-portfolio.php' || $current_page=='edit-portfolio.php'){echo 'active';}?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-book tx-20"></i>
            <span class="menu-item-label">Portfolios</span>
          </div>
          <!-- menu-item -->
        </a>
        <a href="education.php" class="sl-menu-link <?php if($current_page=='education.php' || $current_page=='add-education-skill.php' || $current_page=='edit-education-skill.php' ){echo 'active';}?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-book tx-20"></i>
            <span class="menu-item-label">Education</span>
          </div>
          <!-- menu-item -->
        </a>
        <a href="all-social.php" class="sl-menu-link <?php if($current_page=='all-social.php' || $current_page=='edit-social.php' || $current_page=='add-social.php' ){echo 'active';} ?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-book tx-20"></i>
            <span class="menu-item-label">All Socials</span>
          </div>
          <!-- menu-item -->
        </a>
        <a href="facts.php" class="sl-menu-link <?php if($current_page=='facts.php' || $current_page=='edit-fact-value.php'){echo 'active';} ?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-superpowers tx-20"></i>
            <span class="menu-item-label">Facts</span>
          </div>
          <!-- menu-item -->
        </a>
        <a href="customer-quotes.php" class="sl-menu-link <?php if($current_page=='customer-quotes.php' || $current_page=='add-quote.php' || $current_page=='edit-customer-quote.php' ){echo 'active';} ?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-quote-right tx-20"></i>
            <span class="menu-item-label">Cusotomer Quotes</span>
          </div>
          <!-- menu-item -->
        </a>
        <a href="partners.php" class="sl-menu-link <?php if($current_page=='partners.php' || $current_page=='add-partners.php' || $current_page=='edit-partners.php'){echo 'active';} ?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-product-hunt tx-20"></i>
            <span class="menu-item-label">Partners</span>
          </div>
          <!-- menu-item -->
        </a>
        <a href="message.php" class="sl-menu-link <?php if($current_page=='message.php' || $current_page=='message-view.php' ){echo 'active';} ?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-envelope tx-20"></i>
            <span class="menu-item-label">Messages <span><?= $messageCount?></span> </span>
          </div>
          <!-- menu-item -->
        </a>
        <a href="#" class="sl-menu-link <?php if($current_page=='settings-site-identity.php' || $current_page=='settings-about.php' || $current_page=='settings-contact.php' || $current_page=='settings-copyright.php' || $current_page=='edit-site-identity.php' || $current_page=='edit-about.php' || $current_page=='edit-site-contact.php' || $current_page=='edit-copyright.php' ){echo 'active';}?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-wrench tx-20"></i>
            <span class="menu-item-label">Settings</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a>
        <!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="settings-site-identity.php" class="nav-link">Site Identity</a></li>
          <li class="nav-item"><a href="settings-about.php" class="nav-link">About</a></li>          
          <li class="nav-item"><a href="settings-contact.php" class="nav-link">Contact</a></li>          
          <li class="nav-item"><a href="settings-copyright.php" class="nav-link">Copyright</a></li>          
        </ul>
        <!-- sl-menu-link -->
        <a href="#" class="sl-menu-link <?php if($current_page=='user-trash.php' || $current_page=='social-trash.php' || $current_page=='services-trash.php' || $current_page=='education-skill-trash.php' || $current_page=='portfolio-trash.php' || $current_page=='customer-quote-trash.php' || $current_page=='partners-trash.php' ){echo 'active';}?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-trash tx-20 <?php if($current_page=='user-trash.php' || $current_page=='social-trash.php' || $current_page=='services-trash.php' || $current_page=='education-skill-trash.php' || $current_page=='portfolio-trash.php' || $current_page=='customer-quote-trash.php' || $current_page=='partners-trash.php' ){echo 'text-light';}else{echo "tx-danger";}?>"></i>
            <span class="menu-item-label">Trash</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="user-trash.php" class="nav-link">User</a></li>
          <li class="nav-item"><a href="social-trash.php" class="nav-link">Social</a></li>          
          <li class="nav-item"><a href="services-trash.php" class="nav-link">Services</a></li>          
          <li class="nav-item"><a href="portfolio-trash.php" class="nav-link">Portfolios</a></li>          
          <li class="nav-item"><a href="education-skill-trash.php" class="nav-link">Education or Skill</a></li>          
          <li class="nav-item"><a href="customer-quote-trash.php" class="nav-link">Customer Quotes</a></li>          
          <li class="nav-item"><a href="partners-trash.php" class="nav-link">Partners</a></li>          
        </ul>
        <!-- sl-menu-link -->
        <!-- sl-menu-link -->
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name"><?php if(isset($h_user_assoc['name'])){echo $h_user_assoc['name'];}else{echo "Unknown";} ?></span>
              <img width="30px" height="30px" src="../profile-img/<?=$h_user_assoc['profile_img']?>" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="edit-profile.php"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                <li><a href="change-password.php"><i class="icon fa fa-lock"></i> Change Password</a></li>
                <li><a href="inc/session-destroy.php"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (<?=$messageCount?>)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <?php if($messageCount>0){?>
                <?php foreach ($messagequery as $key => $value) :?>
                <a href="message-redirect.php?message_id=<?=$value['id']?>" class="media-list-link">
                <div class="media">
                  <div class="media-body">
                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13"><?= $value['name']?></p>
                    <span class="d-block tx-11 tx-gray-500"><?= $value['time']?></span>
                    <p class="tx-13 mg-t-10 mg-b-0"><?= $value['message']?></p>
                  </div>
                </div><!-- media -->
              </a>
              <?php endforeach ?>
            <?php }else{echo "<div style='margin:10px 10px'> No Message</div>";} ?>
            
            
            <!-- loop ends here -->
          </div><!-- media-list -->
          <div class="pd-15">
            <a href="message.php" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../assets/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../assets/img/img9.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                  <span class="tx-12">October 02, 2017 12:44am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../assets/img/img10.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">October 01, 2017 10:20pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">October 01, 2017 6:08pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../assets/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                  <span class="tx-12">September 27, 2017 6:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../assets/img/img10.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">September 28, 2017 11:30pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../assets/img/img9.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                  <span class="tx-12">September 26, 2017 11:01am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="../assets/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">September 23, 2017 9:19pm</span>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
        </div><!-- #notifications -->

      </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL #########
    # --->
