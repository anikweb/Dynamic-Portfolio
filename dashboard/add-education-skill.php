<?php
ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <a class="breadcrumb-item" href="education.php">Education and Skill</i></a>
            <span class="breadcrumb-item active">Add Education or Skill</span>
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
            <form action="add-education-post.php" method="POST" >        
                    <div class="card pd-20 pd-sm-40 pl-5">
                        <h2 class="text-primary text-center">Add Education or Skill</h2>
                        <div class="row">
                            <div class="col-md-5 pt-3 mr-2">
                                <label for="name">Name of Education or Skill:<span class="tx-danger">*</span></label>
                                <input type="text" id="name" value="" name="name" class="form-control">
                                <span class="text-danger">
                                    <?php
                                        // if(isset($_SESSION['profileNameUpdateEmpty'])){
                                        //     echo $_SESSION['profileNameUpdateEmpty'];
                                        //     echo "<style>#editPName{border:1px solid red}</style>";
                                        //     unset($_SESSION['profileNameUpdateEmpty']);
                                        // }
                                    ?>
                                </span>
                            </div>
                            <!-- col -->
                            <div class="col-md-3 pt-3">
                                <label for="year">Year: <span class="tx-danger">*</span></label>
                                <input type="year" id="year" class="form-control" value="" name="year">
                                <span class="text-danger">
                                    <?php
                                        // if(isset($_SESSION['profileEmailUpdateEmpty'])){
                                        //     echo $_SESSION['profileEmailUpdateEmpty'];
                                        //     echo "<style>#editPEmail{border:1px solid red}</style>";
                                        //     unset($_SESSION['profileEmailUpdateEmpty']);
                                        // }
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-2 pt-4 ml-4">
                                <label for="range">Performance <span class="tx-danger">*</span></label>
                                <input  type="range" min="0" max="100" value="0" class="slider" name="performance" id="myRange">
                                <p>Value: <span class="tx-danger" id="demo"></span><span class="tx-danger">%</span> </p>
                            </div>
                            <div class="col-md-12 mt-3 text-center">
                                <button type="submit" class="btn btn-primary">Add</button>
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

