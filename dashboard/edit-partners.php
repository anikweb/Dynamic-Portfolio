<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $id = $_GET['partner_id'];
    $partnerSelect = "SELECT * FROM partners WHERE id = $id";
    $partnerQ = mysqli_query($db,$partnerSelect);
    $partnerAssoc = mysqli_fetch_assoc($partnerQ);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <a class="breadcrumb-item" href="partners.php">Partners</i></a>
        <span class="breadcrumb-item active">Edit Partner</span>
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
                <form action="edit-partners-post.php" method="POST" enctype="multipart/form-data">        
                    <div class="card pd-20 pd-sm-40">
                        <h2 class="text-primary text-center">Edit Partner</h2>
                        <div class="row">
                            <div class="col-md-5 mr-4 pt-3">
                                <input type="text" name="id" hidden value="<?=$partnerAssoc['id'];?>">
                                <label for="name">Name<span class="tx-danger">*</span></label>
                                <input value="<?=$partnerAssoc['p_name'];?>" type="text" name='name' id='name' class="form-control" placeholder="Enter Name Here">
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['titleEmpty'])){
                                            echo $_SESSION['titleEmpty'];
                                            echo "<style>#title{border:1px solid red}</style>";
                                            unset($_SESSION['titleEmpty']);
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-6 mr-4 pt-3">
                                <label for="alt_name">Alt Name<span class="tx-danger">*</span></label>
                                <input type="text"  value="<?=$partnerAssoc['alt_name'];?>" name="alt_name" id="alt_name" class="form-control" placeholder="Enter Alt Text">
                                <span class="text-danger">
                                <?php
                                    if(isset($_SESSION['summaryEmpty'])){
                                        echo $_SESSION['summaryEmpty'];
                                        echo "<style>#summary{border:1px solid red}</style>";
                                        unset($_SESSION['summaryEmpty']);
                                    }
                                ?>
                                </span>
                            </div>
                            <div class="col-md-5 mr-4 pt-3">
                                <label for="Image">Image:<span class="tx-danger">*</span></label>
                                <input type="file" id="Image" class="form-control" name="Image" onchange="document.getElementById('ImagePre').src = window.URL.createObjectURL(this.files[0])">
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['thumbnailNameEmpty'])){
                                            echo $_SESSION['thumbnailNameEmpty'];
                                            echo "<style>#thumbnail{border:1px solid red}</style>";
                                            unset($_SESSION['thumbnailNameEmpty']);
                                        }else if(isset($_SESSION['extensionErrThumb'])){
                                            echo $_SESSION['extensionErrThumb'];
                                            echo "<style>#thumbnail{border:1px solid red}</style>";
                                            unset($_SESSION['extensionErrThumb']);
                                        }else if(isset($_SESSION['sizeErrThumb'])){
                                            echo $_SESSION['sizeErrThumb'];
                                            echo "<style>#thumbnail{border:1px solid red}</style>";
                                            unset($_SESSION['sizeErrThumb']);
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-5 mr-4 pt-5">
                                <label>Preview:</label>
                                <img id="ImagePre" src="../assets/img/partners/<?=$partnerAssoc['p_image']?>" width="100px" alt="Image Preview:" >
                            </div>
                            <div class="col-md-6 mt-1">
                                
                            </div>
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
