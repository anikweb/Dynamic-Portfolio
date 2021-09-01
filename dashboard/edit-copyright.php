<?php
    ob_start();
    require_once('inc/db.php');
    require_once('inc/header.php');
    $select = "SELECT * FROM copyright";
    $query = mysqli_query($db,$select);
    $assoc = mysqli_fetch_assoc($query);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
      <a class="breadcrumb-item" href="settings-copyright.php">Settings :: Site Copyright</a>
        <span class="breadcrumb-item active">Settings :: Edit Site Copyright</span>
      </nav>

        <div class="sl-pagebody">
                <form action="copyright-post.php" method="POST">        
                    <div class="card pd-20 pd-sm-40">
                        <h2 class="text-primary text-center">Settings :: Copyright</h2>
                        <div class="row">
                            <div class="col-md-3 copyright-edit">
                                <input class="form-control" disabled type="text" value="<?=$assoc['copyright']?>" name="copyright">
                            </div>
                            <div class="col-md-5">
                                <input class="form-control" type="text" value="<?=$assoc['text']?>" name="text">
                            </div>
                            <div class="col-md-4 right-edit">
                                <input class="form-control" disabled type="text" value="<?=$assoc['rightReserved']?>" name="rightReserved">
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div><!-- card -->
                </form>
    <!-- ########## END: MAIN PANEL ########## -->
    
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
