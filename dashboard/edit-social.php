<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $id = $_GET['social_id'];
    $socialSelect = "SELECT * FROM social_icon WHERE id=$id";
    $socialQ = mysqli_query($db,$socialSelect);
    $socialAssoc = mysqli_fetch_assoc($socialQ);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <a class="breadcrumb-item" href="all-social.php">All Social</a>
        <span class="breadcrumb-item active">Edit Social</span>
      </nav>

        <div class="sl-pagebody">
        <div class="row">
            <div class="col-md-8 mx-auto">
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
                <form action="edit-social-query.php" method="POST">        
                    <div class="card pd-20 pd-sm-40">
                        <h2 class="text-primary text-center">Edit Social</h2>
                        <div class="row">
                            <div class="col-md-1 mt-4 pt-2">
                                <input style="margin-top: 1px;" class="form-control text-right" disabled type="text" value="https://">
                            </div>
                            <div class="col-md-10 mt-1">
                                <input hidden type="text" name="id" value="<?=$id?>" id="id">
                                <label for="link">Link <span class="tx-danger">*</span></label>
                                <input class='form-control' type="text" id="link" name="link" value="<?=$socialAssoc['link']?>" placeholder="Enter your link Here">
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
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        <!-- row -->
                    </div><!-- card -->
                </form>
            </div>
        </div>
    <!-- ########## END: MAIN PANEL ########## -->
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
