<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <a class="breadcrumb-item" href="partners.php">Partners</i></a>
        <span class="breadcrumb-item active">Add Partners</span>
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
                <form action="add-partners-post.php" method="POST" enctype="multipart/form-data">        
                    <div class="card pd-20 pd-sm-40">
                        <h2 class="text-primary text-center">Add Partners</h2>
                        <div class="row">
                            <div class="col-md-5 mr-4 pt-3">
                                <label for="name">Name<span class="tx-danger">*</span></label>
                                <input value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];unset($_SESSION['name']);}?>" type="text" name='name' id='name' class="form-control" placeholder="Enter Name Here">
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['nameEmpty'])){
                                            echo $_SESSION['nameEmpty'];
                                            echo "<style>#name{border:1px solid red}</style>";
                                            unset($_SESSION['nameEmpty']);
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-6 mr-4 pt-3">
                                <label for="alt_name">Alt Name<span class="tx-danger">*</span></label>
                                <input value="<?php if(isset($_SESSION['alt_name'])){echo $_SESSION['alt_name'];unset($_SESSION['alt_name']);}?>" type="text" name="alt_name" id="alt_name" class="form-control" placeholder="Enter Alt Text">
                                <span class="text-danger">
                                <?php
                                    if(isset($_SESSION['altNameEmpty'])){
                                        echo $_SESSION['altNameEmpty'];
                                        echo "<style>#alt_name{border:1px solid red}</style>";
                                        unset($_SESSION['altNameEmpty']);
                                    }
                                ?>
                                </span>
                            </div>
                            <div class="col-md-5 mr-4 pt-3">
                                <label for="Image">Image:<span class="tx-danger">*</span></label>
                                <input type="file" id="Image" class="form-control" name="Image" onchange="document.getElementById('ImagePre').src = window.URL.createObjectURL(this.files[0])">
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['ImageEmpty'])){
                                            echo $_SESSION['ImageEmpty'];
                                            echo "<style>#Image{border:1px solid red}</style>";
                                            unset($_SESSION['ImageEmpty']);
                                        }else if(isset($_SESSION['extensionErrImage'])){
                                            echo $_SESSION['extensionErrImage'];
                                            echo "<style>#Image{border:1px solid red}</style>";
                                            unset($_SESSION['extensionErrImage']);
                                        }else if(isset($_SESSION['sizeErrimage'])){
                                            echo $_SESSION['sizeErrimage'];
                                            echo "<style>#Image{border:1px solid red}</style>";
                                            unset($_SESSION['sizeErrimage']);
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-5 mr-4 pt-3">
                                <label>Preview:</label>
                                <img id="ImagePre" src="" width="100px" alt="Image Preview:" >
                            </div>
                            <div class="col-md-6 mt-1">
                                
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
