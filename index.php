<?php
    ob_start();
    require_once('dashboard/inc/db.php');
    require_once('header.php');
    $factSelect = "SELECT * FROM facts";
    $factQ = mysqli_query($db,$factSelect);
    
    $quoteSelect = "SELECT * FROM customer_quotes WHERE trash=1 AND status=1";
    $quoteQ = mysqli_query($db,$quoteSelect);

    $partnerSelect = "SELECT * FROM partners WHERE trash=1 AND status=1";
    $partnerQ = mysqli_query($db,$partnerSelect);
    
    $selectEdu = "SELECT * FROM educationskill WHERE status=1";
    $eduQ = mysqli_query($db,$selectEdu);
?>
        <!-- header-end -->
        <!-- main-area -->
        <main>
            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?=$userAssoc['name']?> </h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s">I'm <?=$userAssoc['name'].' , '.$siteIdentityAssoc['tagline']?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <?php
                                            foreach ($icon_query as $key2 => $value2):?>
                                                <li>
                                                    <a target="_blank" href="<?= $value2['link'];?>">
                                                        <i class="<?= $value2['icon'];?>"></i>
                                                    </a>
                                                </li>
                                            <?php endforeach ?>
                                    </ul>
                                </div>
                                <a href="#portfolio" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img width="500px" src="assets/img/site-identity/banner-image/<?=$siteIdentityAssoc['banner_image'];?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="port-assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="port-assets/img/banner/banner_img2.png" title="<?=$userAssoc['name'];?>" alt="<?=$userAssoc['name'];?>" width='400px'>
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2><?=$aboutAssoc['title']?></h2>
                            </div>
                            <div class="about-content">
                                <p><?= nl2br($aboutAssoc['aboutSumm']);?></p>
                                <h3>Education or Skill:</h3>
                            </div>
                            <!-- Education Item -->
                            
                            <?php
                            if($eduQ){
                                echo "edu success";
                            }else{
                                echo "edu fail";
                            }
                            echo $eduskillassoc['name'];
                            foreach ($eduQ as $key => $value): ?>
                                <div class="education">
                                <div class="year"><?= $value['year']?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?=$value['name'];?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?php echo $value['perfomance'].'%';?>;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Education Item -->
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                         <?php
                            foreach ($servicesQuery as $key => $value): ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                    <i class="<?= $value['icon']?>"></i>
                                    <h3><?= $value['name']?></h3>
                                    <p><?= $value['summary']?></p>
                                </div>
                            </div>
                        <?php
                         endforeach ?>       
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($portQ as $key => $value) : ?>
                            <div class="col-lg-4 col-md-6 pitem">
                                <div class="speaker-box">
                                    <div class="speaker-thumb">
                                        <img src="assets/img/portfolios/thumbnail/<?= $value['thumbnail_image']?>" alt="img">
                                    </div>
                                    <div class="speaker-overlay">
                                        <span><?= $value['category']?></span>
                                        <h4><a href="portfolio-single.php?port_id=<?= $value['id'];?>" target="_blank"><?= $value['title']?></a></h4>
                                        <a href="portfolio-single.php?port_id=<?= $value['id'];?>" target="_blank" class="arrow-btn">More information <span></span></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </section>
            <!-- services-area-end -->
            <!-- fact-area -->
            
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            <?php foreach ($factQ as $key => $value) :?>
                                <div class="col-xl-2 col-lg-3 col-sm-6">
                                    <div class="fact-box text-center mb-50">
                                        <div class="fact-icon">
                                            <i class="<?= $value['icon']?>"></i>
                                        </div>
                                        <div class="fact-content">
                                            <h2><span class="count"><?= $value['value']?></span></h2>
                                            <span><?= $value['name']?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                                <?php foreach ($quoteQ as $key => $value) :?>
                                    <div class="single-testimonial text-center">
                                        <div class="testi-avatar">
                                            <img style="border-radius: 50%;" width="80px" height="80px" src="assets/img/customer-quote/<?=$value['c_image']?>" alt="img">
                                        </div>
                                        <div class="testi-content">
                                            <h4><span>“</span><?=$value['quote']?><span> ”</span></h4>
                                            <div class="testi-avatar-info">
                                                <h5><?=$value['c_name']?></h5>
                                                <span><?=$value['c_designation']?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Partners</span>
                                <h2>Work With</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row brand-active">
                        <?php foreach ($partnerQ as $key => $value) :?>
                            <div class="col-xl-2 mr-5 pr-5">
                                <div class="single-brand">
                                    <img width="130px"  src="assets/img/partners/<?= $value['p_image'];?>" alt="<?= $value['alt_name'];?>">
                                </div>
                            </div>
                        <?php endforeach ?>
                        
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                                <h5 class="text-uppercase"><?= $ContactAssoc['title']?></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?= $ContactAssoc['address']?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span><?= $ContactAssoc['phone']?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><a class="text-muted" href="mailto:<?= $ContactAssoc['email']?>"><?= $ContactAssoc['email']?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="dashboard/user-message-post.php" method="POST">
                                    <?php if(isset($_SESSION['nameEmpty'])):?>
                                        <span class="text-danger"> <?php echo $_SESSION['nameEmpty']?></span>
                                        <style>
                                        #name{
                                            border: .5px solid red;
                                        }
                                        </style>
                                        
                                    <?php unset($_SESSION['nameEmpty']);
                                    
                                    elseif(isset($_SESSION['nameErr'])): ?>
                                        <span class="text-danger"> <?php echo $_SESSION['nameErr']?></span>
                                        <style>
                                        #name{
                                            border: .5px solid red;
                                        }
                                        </style>
                                    <?php unset($_SESSION['nameErr']);
                                    
                                    endif ?>
                                    <input type="text" value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name']; unset($_SESSION['name']);}?>" name="name" id="name" placeholder="your name *">
                                    <?php if(isset($_SESSION['emailEmpty'])):?>
                                        <span class="text-danger"> <?php echo $_SESSION['emailEmpty']?></span>
                                        <style>
                                        #email{
                                            border: .5px solid red;
                                        }
                                        </style>
                                        
                                    <?php unset($_SESSION['emailEmpty']);
                                    
                                    elseif(isset($_SESSION['emailValidationErr'])): ?>
                                        <span class="text-danger"> <?php echo $_SESSION['emailValidationErr']?></span>
                                        <style>
                                        #email{
                                            border: .5px solid red;
                                        }
                                        </style>
                                    <?php unset($_SESSION['emailValidationErr']);
                                    
                                    endif ?>
                                    <input type="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email']; unset($_SESSION['email']);}?>" name="email" id="email" placeholder="your email *">
                                    <?php if(isset($_SESSION['messageEmpty'])):?>
                                        <span class="text-danger"> <?php echo $_SESSION['messageEmpty']?></span>
                                        <style>
                                        #message{
                                            border: .5px solid red;
                                        }
                                        </style>
                                        
                                    <?php unset($_SESSION['messageEmpty']);
                                    
                                    endif ?>
                                    <textarea name="message" id="message" placeholder="your message *"><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];unset($_SESSION['message']);}?></textarea>
                                    <button class="btn">SEND</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <?php 
            if(isset($_SESSION['messageSent'])):?>
                <script>
                    swal('Message Sent');
                </script>
            <?php unset($_SESSION['messageSent']);
            endif
        ?>
        <?php 
            if(isset($_SESSION['messageSentFailed'])):?>
                <script>
                    swal('Failed to send message');
                </script>
            <?php unset($_SESSION['messageSentFailed']);
            endif
        ?>
<?php
    require_once('footer.php');
    ob_end_flush();
?>
