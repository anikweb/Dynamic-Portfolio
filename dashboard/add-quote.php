<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <a class="breadcrumb-item" href="customer-quotes.php"></i>Customer Quotes</a>
        <span class="breadcrumb-item active">Add Quote</span>
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
                <form action="add-customer-quote-post.php" method="POST" enctype="multipart/form-data">        
                    <div class="card pd-20 pd-sm-40">
                        <h2 class="text-primary text-center">Add Quote</h2>
                        <div class="row">
                        <div class="col-md-5 mr-4 pt-3">
                            <label for="nameOfCustomer">NAME OF A CUSTOMER<span class="tx-danger">*</span></label>
                            <input value="<?php if(isset($_SESSION['nameOfCustomer'])){echo $_SESSION['nameOfCustomer'];unset($_SESSION['nameOfCustomer']);} ?>" type="text" name='nameOfCustomer' id='nameOfCustomer' class="form-control" placeholder="Enter Customer Name Here">
                             <span class="text-danger">
                                <?php
                                    if(isset($_SESSION['customerNameEmpty'])){
                                        echo $_SESSION['customerNameEmpty'];
                                        echo "<style>#nameOfCustomer{border:1px solid red}</style>";
                                        unset($_SESSION['customerNameEmpty']);
                                    }
                                ?>
                            </span>
                        </div>
                        <div class="col-md-6 mr-4 pt-3">
                                <label for="designation">Designation <span class="tx-danger">*</span></label>
                                <input value="<?php if(isset($_SESSION['designation'])){echo $_SESSION['designation'];unset($_SESSION['designation']);} ?>" type="text" name="designation" id="designation" class="form-control" placeholder="Enter Designation">
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['designationEmpty'])){
                                            echo $_SESSION['designationEmpty'];
                                            echo "<style>#designation{border:1px solid red}</style>";
                                            unset($_SESSION['designationEmpty']);
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
                            <div class="col-md-12 mt-1">
                                <label for="quote">Quote <span class="tx-danger">*</span></label>
                                <textarea name="quote" id="quote" cols="30" rows="10" class="form-control"><?php if(isset($_SESSION['PortSummary'])){ echo $_SESSION['PortSummary'];unset($_SESSION['PortSummary']);} ?></textarea>
                                 <span class="text-danger">
                                 <?php
                                        if(isset($_SESSION['quoteEmpty'])){
                                            echo $_SESSION['quoteEmpty'];
                                            echo "<style>#quote{border:1px solid red}</style>";
                                            unset($_SESSION['quoteEmpty']);
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
