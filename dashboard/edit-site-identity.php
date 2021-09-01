<?php
    ob_start();
    require_once('inc/db.php');
    require_once('inc/header.php');
    $id = $_GET['identity'];
    $edit_select = "SELECT * FROM site_identity WHERE id = $id";
    $edit_query = mysqli_query($db,$edit_select);
    $edit_assoc = mysqli_fetch_assoc($edit_query);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <a class="breadcrumb-item" href="settings-site-identity.php">Settings :: Site Identity</a>
        <span class="breadcrumb-item active">Settings :: Edit Site Identity</span>
      </nav>

        <div class="sl-pagebody">
                <form action="site-identity-post.php" method="POST" enctype="multipart/form-data">        
                    <div class="card pd-20 pd-sm-40">
                        
                        <h2 class="text-primary text-center">Settings :: Edit Site Identity</h2>
                        <div class="row">
                            <div class="col-md-6 pt-3 pr-4">
                                <label for="siteTitle">Site Title: <span class="tx-danger">*</span></label>
                                <input type="text"  id="siteTitle" value="<?=$edit_assoc['site_title']?>" name="siteTitle" class="form-control">
                                <!-- <span class="text-danger">
                                    <?php
                                        // if(isset($_SESSION['profileNameUpdateEmpty'])){
                                        //     echo $_SESSION['profileNameUpdateEmpty'];
                                        //     echo "<style>#editPName{border:1px solid red}</style>";
                                        //     unset($_SESSION['profileNameUpdateEmpty']);
                                        // }
                                    ?>
                                </span> -->
                            </div>
                            <!-- col -->
                            <div class="col-md-6 pt-3 pr-4">
                                <label for="tagline">Tagline: <span class="tx-danger">*</span></label>
                                <input type="text" id="tagline" value="<?=$edit_assoc['tagline']?>" name="tagline" class="form-control">
                                <!-- <span class="text-danger">
                                    <?php
                                        // if(isset($_SESSION['profileNameUpdateEmpty'])){
                                        //     echo $_SESSION['profileNameUpdateEmpty'];
                                        //     echo "<style>#editPName{border:1px solid red}</style>";
                                        //     unset($_SESSION['profileNameUpdateEmpty']);
                                        // }
                                    ?>
                                </span> -->
                            </div>
                            <!-- col -->
                            <!-- Logo Start -->
                            <div class="col-md-6 pt-3 pr-4">
                                <label for="logo">Logo:</label>
                                <input type="file" id="logo" class="form-control" name="logo" onchange="document.getElementById('logoPreview').src = window.URL.createObjectURL(this.files[0])">
                                <!-- <span class="text-danger">
                                    <?php
                                        // if(isset($_SESSION['profileImgUpdateEmpty'])){
                                        //     echo $_SESSION['profileImgUpdateEmpty'];
                                        //     echo "<style>#prImageUp{border:1px solid red}</style>";
                                        //     unset($_SESSION['profileImgUpdateEmpty']);
                                        // }
                                    ?>
                                </span> -->
                            </div>
                            <div class="col-md-6 pt-3 pr-4">
                                <label>Preview:</label>
                                <img id="logoPreview" src="../assets/img/site-identity/site-logo/<?=$edit_assoc['logo']?>" height="100px" width="100px" alt="Logo Preview:">
                            </div>
                            <!-- Logo End -->
                            <!-- Sticky Logo Start -->
                            <div class="col-md-6 pt-3 pr-4">
                                <label for="logo">Sticky Logo: </label>
                                <input type="file" id="stickyLogo" class="form-control" name="stickyLogo" onchange="document.getElementById('stickyLogoPreview').src = window.URL.createObjectURL(this.files[0])">
                                <!-- <span class="text-danger">
                                    <?php
                                        // if(isset($_SESSION['profileImgUpdateEmpty'])){
                                        //     echo $_SESSION['profileImgUpdateEmpty'];
                                        //     echo "<style>#prImageUp{border:1px solid red}</style>";
                                        //     unset($_SESSION['profileImgUpdateEmpty']);
                                        // }
                                    ?>
                                </span> -->
                            </div>
                            <div class="col-md-6 pt-3 pr-4">
                                <label>Preview:</label>
                                <img id="stickyLogoPreview" src="../assets/img/site-identity/sticky-logo/<?=$edit_assoc['sticky_logo']?>" height="100px" width="100px" alt="Sticky Logo Preview:">
                            </div>
                            <!-- Sticky Logo End -->

                            <!-- Site Icon Start -->

                            <div class="col-md-6 pt-3 pr-4">
                                <label for="siteIcon">Site Icon: </label>
                                <input type="file" id="siteIcon" class="form-control" name="siteIcon" onchange="document.getElementById('siteIconPreview').src = window.URL.createObjectURL(this.files[0])">
                                <!-- <span class="text-danger">
                                    <?php
                                        // if(isset($_SESSION['profileImgUpdateEmpty'])){
                                        //     echo $_SESSION['profileImgUpdateEmpty'];
                                        //     echo "<style>#prImageUp{border:1px solid red}</style>";
                                        //     unset($_SESSION['profileImgUpdateEmpty']);
                                        // }
                                    ?>
                                </span> -->
                            </div>
                            <div class="col-md-6 pt-3 pr-4">
                                <label>Preview:</label>
                                <img id="siteIconPreview" src="../assets/img/site-identity/site-icon/<?=$edit_assoc['site_icon']?>" height="50px" width="50px" alt="Site Icon Preview:">
                            </div>
                            <!-- Site Icon End -->
                            <!-- Thumbnail Start -->
                            <div class="col-md-6 pt-3 pr-4">
                                <label for="bannerImage">Banner Image: </label>
                                <input type="file" id="bannerImage" class="form-control" name="bannerImage" onchange="document.getElementById('bannerImagePreview').src = window.URL.createObjectURL(this.files[0])">
                                <!-- <span class="text-danger">
                                    <?php
                                        // if(isset($_SESSION['profileImgUpdateEmpty'])){
                                        //     echo $_SESSION['profileImgUpdateEmpty'];
                                        //     echo "<style>#prImageUp{border:1px solid red}</style>";
                                        //     unset($_SESSION['profileImgUpdateEmpty']);
                                        // }
                                    ?>
                                </span> -->
                            </div>
                            <div class="col-md-6 pt-3 pr-4">
                                <label>Preview:</label>
                                <img id="bannerImagePreview" src="../assets/img/site-identity/banner-image/<?=$edit_assoc['banner_image']?>"  width="300px" alt="Banner Image Preview:">
                            </div><!-- Thumbnail End -->
                            <div class="col-md-12 mt-3 text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        <!-- row -->
                    </div><!-- card -->
                </form>
    <!-- ########## END: MAIN PANEL ########## -->
    
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
