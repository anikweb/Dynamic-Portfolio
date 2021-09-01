<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <a class="breadcrumb-item" href="all-social.php">All Social</a>
        <span class="breadcrumb-item active">Add Social</span>
      </nav>

        <div class="sl-pagebody">
            <div class="row mt-5">
                    <div class="col-10 md-auto mx-auto">
                        <?php if(isset($_SESSION['iconExist'])):?>
                            <div class="alert alert-danger text-center">
                                <span><?= $_SESSION['iconExist']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                        <?php
                            unset($_SESSION['iconExist']);
                            endif 
                        ?>
                    </div>
                </div>
                <form action="social-add-query.php" method="POST">        
                    <div class="card pd-20 pd-sm-40">
                        <h2 class="text-primary text-center">Add Social</h2>
                        <div class="row">
                            <div class="col-md-5 mt-1">
                                <label for="icon">Icon <span class="tx-danger">*</span></label>
                                <select name="icon" id="icon" class="form-control">
                                    <option value="">Select Icon</option>
                                    <option <?php if(isset($_SESSION['icon'])){if($_SESSION['icon'] == "fab fa-facebook-f"){echo "selected";unset($_SESSION['icon']);}} ?> value="fab fa-facebook-f">Facebook</option>
                                    <option <?php if(isset($_SESSION['icon'])){if($_SESSION['icon'] == "fab fa-twitter"){echo "selected";unset($_SESSION['icon']);}} ?> value="fab fa-twitter">Twitter</option>
                                    <option <?php if(isset($_SESSION['icon'])){if($_SESSION['icon'] == "fab fa-instagram"){echo "selected";unset($_SESSION['icon']);}} ?> value="fab fa-instagram">Instagram</option>
                                    <option <?php if(isset($_SESSION['icon'])){if($_SESSION['icon'] == "fab fa-linkedin-in"){echo "selected";unset($_SESSION['icon']);}} ?> value="fab fa-linkedin-in">Linkedin</option>
                                </select>
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['iconEmpty'])){
                                            echo $_SESSION['iconEmpty'];
                                            echo "<style>#icon{border:1px solid red}</style>";
                                            unset($_SESSION['iconEmpty']);
                                        }
                                    
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-1 mt-4 pt-2">
                                <input style="margin-top: 1px;" class="form-control text-right" disabled type="text" value="https://">
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="link">Link <span class="tx-danger">*</span></label>
                                <input value="<?php if(isset($_SESSION['link'])){echo $_SESSION['link'];unset($_SESSION['link']);}?>" class='form-control' type="text" id="link" name="link" placeholder="Enter your link Here">
                                <span class="text-danger">
                                        <?php
                                            if(isset($_SESSION['linkEmpty'])){
                                                echo $_SESSION['linkEmpty'];
                                                echo "<style>#link{border:1px solid red}</style>";
                                                unset($_SESSION['linkEmpty']);
                                            }
                                        ?>
                                </span>
                            </div>
                            <div class="col-md-12 mt-3 text-center">
                                <button type="submit" class="btn btn-primary">Add</button>
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
