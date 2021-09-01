<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <a class="breadcrumb-item" href="portfolios.php">All Portfolios</i></a>
        <span class="breadcrumb-item active">Add Portfolio</span>
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
                <form action="add-portfolio-post.php" method="POST" enctype="multipart/form-data">        
                    <div class="card pd-20 pd-sm-40">
                        <h2 class="text-primary text-center">Add Portfolio</h2>
                        <div class="row">
                        <div class="col-md-5  mt-1 mr-2">
                            <label for="title">Portfolio Title<span class="tx-danger">*</span></label>
                            <input value="<?php if(isset($_SESSION['PortTitle'])){ echo $_SESSION['PortTitle'];unset($_SESSION['PortTitle']);} ?>" type="text" name='title' id='title' class="form-control" placeholder="Enter portfolio title">
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
                            <div class="col-md-6 ml-2 mt-1">
                                <label for="category">Category <span class="tx-danger">*</span></label>
                                <select name="category" id="category" class="form-control">
                                    <option value="" selected>Select Category</option>
                                    <option <?php if(isset($_SESSION['PortCategory'])){if($_SESSION['PortCategory'] == 'audio'){ echo 'selected'; unset($_SESSION['PortCategory']);}} ?> value="audio">Audio</option>
                                    <option <?php if(isset($_SESSION['PortCategory'])){if($_SESSION['PortCategory'] == 'creative'){ echo 'selected'; unset($_SESSION['PortCategory']);}} ?> value="creative">Creative</option>
                                    <option <?php if(isset($_SESSION['PortCategory'])){if($_SESSION['PortCategory'] == 'design'){ echo 'selected'; unset($_SESSION['PortCategory']);}} ?> value="design">Design</option>
                                    <option <?php if(isset($_SESSION['PortCategory'])){if($_SESSION['PortCategory'] == 'development'){ echo 'selected'; unset($_SESSION['PortCategory']);}} ?> value="development">Development</option>
                                    <option <?php if(isset($_SESSION['PortCategory'])){if($_SESSION['PortCategory'] == 'ui/ux'){ echo 'selected'; unset($_SESSION['PortCategory']);}} ?> value="ui/ux">UI/UX</option>
                                    <option <?php if(isset($_SESSION['PortCategory'])){if($_SESSION['PortCategory'] == 'video'){ echo 'selected'; unset($_SESSION['PortCategory']);}} ?> value="video">Video</option>
                                </select>
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['categoryEmpty'])){
                                            echo $_SESSION['categoryEmpty'];
                                            echo "<style>#category{border:1px solid red}</style>";
                                            unset($_SESSION['categoryEmpty']);
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-5 mr-4 pt-3">
                                <label for="thumbnail">Thumbnail Image: <span class="tx-danger">*</span></label>
                                <input type="file" id="thumbnail" class="form-control" name="thumbnail" onchange="document.getElementById('thumbnailPre').src = window.URL.createObjectURL(this.files[0])">
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
                            <div class="col-md-6 pt-3">
                                <label>Preview:</label>
                                <img id="thumbnailPre" src="" height="300px" width="300px" alt="Thumbnail Image Preview:" >
                            </div>
                            <div class="col-md-5 mr-4 pt-3">
                                <label for="featured">Featured Image: <span class="tx-danger">*</span></label>
                                <input type="file" id="featured" class="form-control" name="featured" onchange="document.getElementById('featuredPre').src = window.URL.createObjectURL(this.files[0])">
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['featuredNameEmpty'])){
                                            echo $_SESSION['featuredNameEmpty'];
                                            echo "<style>#featured{border:1px solid red}</style>";
                                            unset($_SESSION['featuredNameEmpty']);
                                        }else if(isset($_SESSION['extensionErrFeat'])){
                                            echo $_SESSION['extensionErrFeat'];
                                            echo "<style>#featured{border:1px solid red}</style>";
                                            unset($_SESSION['extensionErrFeat']);
                                        }else if(isset($_SESSION['sizeErrFeat'])){
                                            echo $_SESSION['sizeErrFeat'];
                                            echo "<style>#featured{border:1px solid red}</style>";
                                            unset($_SESSION['sizeErrFeat']);
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-6 pt-3">
                                <label>Preview:</label>
                                <img id="featuredPre" src="" height="300px" width="300px" alt="Featured Image Preview:" >
                            </div>
                            <div class="col-md-12 mt-1">
                                <label for="link">Summary <span class="tx-danger">*</span></label>
                                <textarea name="summary" id="summary" cols="30" rows="10" class="form-control"><?php if(isset($_SESSION['PortSummary'])){ echo $_SESSION['PortSummary'];unset($_SESSION['PortSummary']);} ?></textarea>
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
