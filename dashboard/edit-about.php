<?php
    ob_start();
    require_once('inc/db.php');
    require_once('inc/header.php');
    $id = $_GET['aboutid'];
    $edit_select = "SELECT * FROM about WHERE id = $id";
    $edit_query = mysqli_query($db,$edit_select);
    $edit_assoc = mysqli_fetch_assoc($edit_query);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <a class="breadcrumb-item" href="settings-about.php">Settings :: About</a>
        <span class="breadcrumb-item active">Settings ::Edit About</span>
      </nav>

        <div class="sl-pagebody">
                <form action="about-post.php" method="POST">        
                    <div class="card pd-20 pd-sm-40">
                        <h2 class="text-primary text-center">Settings :: Edit About</h2>
                        <div class="row">
                            <div class="col-md-6  pt-3">
                                <label for="title">Title:</label>
                                <input value="<?=$edit_assoc['title']?>" type="text" id="title" name="title" class="form-control">
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
                            <div class="col-md-12 pt-3">
                                <label for="summary">Summary:</label>
                                <textarea class="form-control" name="summary" id="summary" rows="3"><?=$edit_assoc['aboutSumm']?></textarea>
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
