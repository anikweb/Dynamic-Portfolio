<?php
    ob_start();
    require_once('inc/db.php');
    require_once('inc/header.php');
    $id = $_GET['contact_id'];
    $edit_select = "SELECT * FROM site_contact WHERE id = $id";
    $editQ = mysqli_query($db, $edit_select);
    $editAssoc = mysqli_fetch_assoc($editQ);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
      <a class="breadcrumb-item" href="settings-contact.php">Settings :: Site Contact</a>
        <span class="breadcrumb-item active">Settings :: Edit Site Contact</span>
      </nav>

        <div class="sl-pagebody">
                <form action="site-contact-post.php" method="POST">        
                    <div class="card pd-20 pd-sm-40">
                        <h2 class="text-primary text-center">Settings :: Site Contact</h2>
                        <div class="row">
                            <div class="col-md-6 pt-3 pr-4">
                            <input type="text" value="<?=$id?>" name="id" hidden>

                                <label for="type">Type: <span class="tx-danger">*</span></label>
                                <select name="type" id="type" class="form-control">
                                    <option value="" selected disabled>Select Type</option>
                                    <option <?php if($editAssoc['type']=="primary"){echo 'selected';}?> value="primary">Primary</option>
                                    <option <?php if($editAssoc['type']=="Others"){echo 'selected';}?> value="Others">Others</option>
                                </select>
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
                                <label for="title">Title: <span class="tx-danger">*</span></label>
                                <input value="<?= $editAssoc['title']?>" type="text" id="title" value="" name="title" class="form-control">
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
                                <label for="phone">Phone: <span class="tx-danger">*</span></label>
                                <input type="text" id="phone" value="<?= $editAssoc['phone']?>" name="phone" class="form-control">
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
                                <label for="email">Email: <span class="tx-danger">*</span></label>
                                <input type="text" id="email" value="<?= $editAssoc['email']?>" name="email" class="form-control">
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
                                <label for="socials">Socials: <span class="tx-danger">*</span></label>
                                <select name="socials" id="socials" class="form-control">
                                    <option value="" selected disabled>Select Socials</option>
                                    <option <?php if($editAssoc['socials'] == "fab fa-facebook-f"){echo "selected";} ?> value="fab fa-facebook-f">Facebook</option>
                                    <option <?php if($editAssoc['socials'] == "fab fa-twitter"){echo "selected";} ?> value="fab fa-twitter">Twitter</option>
                                    <option <?php if($editAssoc['socials'] == "fab fa-instagram"){echo "selected";} ?> value="fab fa-instagram">Instagram</option>
                                    <option <?php if($editAssoc['socials'] == "fab fa-linkedin-in"){echo "selected";} ?> value="fab fa-linkedin-in">Linkedin</option>
                                </select>
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
                            <div class="col-md-6  pt-3 pr-4">
                                <label for="link">Social Link <span class="tx-danger">*</span></label>
                                <input value="<?=$editAssoc['link'] ?>" class='form-control' type="text" id="link" name="link" placeholder="Enter social your link Here">
                                <span class="text-danger">
                                        <?php
                                            // if(isset($_SESSION['linkEmpty'])){
                                            //     echo $_SESSION['linkEmpty'];
                                            //     echo "<style>#link{border:1px solid red}</style>";
                                            //     unset($_SESSION['linkEmpty']);
                                            // }
                                        ?>
                                </span>
                            </div>
                            <div class="col-md-12 pt-3 pr-4">
                                <label for="address">Address: <span class="tx-danger">*</span></label>
                                <textarea name="address" id="address" rows="5" class="form-control"><?=$editAssoc['address']?></textarea>
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
