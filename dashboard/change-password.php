<?php
    ob_start();
    require_once('inc/db.php');
    require_once('inc/header.php');
    $id = $_SESSION['id'];
    $edit_select = "SELECT * FROM user_info WHERE id = $id";
    $edit_query = mysqli_query($db,$edit_select);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <span class="breadcrumb-item active">Change Password</span>
      </nav>
        <div class="sl-pagebody">
            <div class="row">
                <div class="col-8 mx-auto">
                <div class="<?php if(isset($_SESSION['changePassSucc'])){echo 'alert alert-success text-center';}?>">
                    <?php 
                        if(isset($_SESSION['changePassSucc'])){
                            echo $_SESSION['changePassSucc'];
                            unset($_SESSION['changePassSucc']);
                        }
                    ?>
                </div>
                    
                </div>
            </div>
            <div class="row row-sm mg-t-20 mb-4">
                <div class="col-xl-8 mx-auto">
                    <form action="password-update.php" method="POST">
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                            <h1 class="text-center text-primary pb-3">Change Password</h1>
                            <div class="row">
                                <label class="col-sm-4 form-control-label" for="currPass">Current Password: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="password" class="form-control" id="currPass" placeholder="Enter Current Password" name="CurPswd" value="<?php if(isset($_SESSION['chCurrPswd'])){echo $_SESSION['chCurrPswd'];unset($_SESSION['chCurrPswd']); }?>">
                                    <span class="text-danger">
                                        <?php
                                            if(isset($_SESSION['currPassEmpty'])){
                                                echo $_SESSION['currPassEmpty'];
                                                echo "<style>#currPass{border:1px solid red}</style>";
                                                unset($_SESSION['currPassEmpty']); 
                                            }else if(isset($_SESSION['currPassErr'])){
                                                echo $_SESSION['currPassErr'];
                                                echo "<style>#currPass{border:1px solid red}</style>";
                                                unset($_SESSION['currPassErr']); 
                                            }
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label" for="pswd">New Password: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="password" class="form-control" id="pswd" placeholder="Enter New Password" name="pswd" value="<?php if(isset($_SESSION['chNewPswd'])){echo $_SESSION['chNewPswd'];unset($_SESSION['chNewPswd']);}?>">
                                    <span class="text-danger">
                                        <?php
                                            if(isset($_SESSION['newPassEmpty'])){
                                                echo $_SESSION['newPassEmpty'];
                                                echo "<style>#pswd{border:1px solid red}</style>";
                                                unset($_SESSION['newPassEmpty']); 
                                            }
                                        
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label" for="conPswd">Confirm Password:<span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="password" class="form-control" id="conPswd" placeholder="Enter confirm password" name="conPswd" value="<?php if(isset($_SESSION['chConPswd'])){echo $_SESSION['chConPswd'];unset($_SESSION['chConPswd']);}?>">
                                    <span class="text-danger">
                                        <?php
                                            if(isset($_SESSION['conPassEmpty'])){
                                                echo $_SESSION['conPassEmpty'];
                                                echo "<style>#conPswd{border:1px solid red}</style>";
                                                unset($_SESSION['conPassEmpty']); 
                                            }else if(isset($_SESSION['passMatchErr'])){
                                                echo $_SESSION['passMatchErr'];
                                                echo "<style>#conPswd{border:1px solid red}</style>";
                                                unset($_SESSION['passMatchErr']); 
                                            }else if(isset($_SESSION['passwordValidationErr'])){
                                                echo $_SESSION['passwordValidationErr'];
                                                echo "<style>#conPswd{border:1px solid red}</style>";
                                                unset($_SESSION['passwordValidationErr']); 
                                            }
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="form-layout-footer mg-t-30">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div><!-- form-layout-footer -->
                        </div><!-- card -->
                    </form>
                </div><!-- col-6 -->
        </div><!-- row -->  
    <!-- ########## END: MAIN PANEL ########## -->
    
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
