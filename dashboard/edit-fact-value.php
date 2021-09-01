<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $id =  $_GET['factid'];
    $select = "SELECT * FROM facts WHERE id = $id";
    $selectQ = mysqli_query($db,$select);
    $factAssoc = mysqli_fetch_assoc($selectQ);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
            <a class="breadcrumb-item" href="facts.php">Facts</i></a>
            <span class="breadcrumb-item active">Edit Fact Value</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row mt-5">
                <div class="col-8 md-auto mx-auto">
                    <?php if(isset($_SESSION['regSuccess'])):?>
                        <div class="alert alert-success text-center">
                            <span><?= $_SESSION['regSuccess']?></span>
                            <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                        </div>
                    <?php
                        unset($_SESSION['regSuccess']);
                        endif 
                    ?>
                </div>
            </div>
        <div class="row row-sm mg-t-20 mb-4">
            <div class="col-xl-8 mx-auto">
            <form action="fact-value-post.php" method="POST" >        
                    <div class="card pd-20 pd-sm-40 pl-5">
                        <h2 class="text-primary text-center">Edit Fact Value</h2>
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <input type="text" hidden name="id" value="<?= $id?>">
                                <input type="text" value="<?=$factAssoc['value']?>" class="form-control" name="value" placeholder="Enter Fact Value Here">
                            </div>
                            <div class="col-md-12 text-center mt-1">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        <!-- row -->
                    </div><!-- card -->
                </form>
            </div><!-- col-6 -->
        </div><!-- row -->  
                            
    <!-- ########## END: MAIN PANEL ########## -->
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
