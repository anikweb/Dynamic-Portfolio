<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20" ></i></a>
            <a class="breadcrumb-item" href="users.php">All Users</a>
            <span class="breadcrumb-item active">Add Users</span>
        </nav>

        <div class="sl-pagebody">
        <div class="row row-sm mg-t-20 mb-4">
            <div class="col-xl-8 mx-auto">
                <form action="reg.php" method="POST">
                    <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                        <h1 class="text-center text-primary pb-3">Add User</h1>
                        <div class="row">
                            <label class="col-sm-4 form-control-label" for="name">Full Name: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" id="name" placeholder="Enter Your Full Name" name="name" 
                                    value="<?php 
                                                if(isset($_SESSION['rname'])){
                                                    echo $_SESSION['rname'];
                                                    unset($_SESSION['rname']);
                                                } 
                                            ?>">
                                <span class="nameSpan">
                                    <?php
                                        if(isset($_SESSION['nameErr'])){
                                            echo $_SESSION['nameErr'];
                                            echo "<style>.nameSpan{color:red}#name{border:1px solid red}</style>";
                                            unset($_SESSION['nameErr']);
                                        }else if(isset($_SESSION['nameTypeErr'])){
                                            echo $_SESSION['nameTypeErr'];
                                            echo "<style>.nameSpan{color:red}#name{border:1px solid red}</style>";
                                            unset($_SESSION['nameTypeErr']);
                                        }
                                    
                                    ?>
                                </span>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label" for="email">Email: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" 
                                    value="<?php 
                                                if(isset($_SESSION['remail'])){
                                                    echo $_SESSION['remail'];
                                                    unset($_SESSION['remail']);
                                                } 
                                            ?>">
                                <span class="emailSpan">
                                    <?php
                                        if(isset($_SESSION['emailErr'])){
                                            echo $_SESSION['emailErr'];
                                            echo "<style>.emailSpan{color:red}#email{border:1px solid red}</style>";
                                            unset($_SESSION['emailErr']);
                                        }else if(isset($_SESSION['emailValidationErr'])){
                                            echo $_SESSION['emailValidationErr'];
                                            echo "<style>.emailSpan{color:red}#email{border:1px solid red}</style>";
                                            unset($_SESSION['emailValidationErr']);
                                        }
                                        else if(isset($_SESSION['emailFetchErr'])){
                                            echo $_SESSION['emailFetchErr'];
                                            echo "<style>.emailSpan{color:red}#email{border:1px solid red}</style>";
                                            unset($_SESSION['emailFetchErr']);
                                        }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label" for="pwd">Create Password:<span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" 
                                    value="<?php 
                                                if(isset($_SESSION['rpswd'])){
                                                    echo $_SESSION['rpswd'];
                                                    unset($_SESSION['rpswd']);
                                                } 
                                            ?>">
                                <span class="passwordSpan">
                                    <?php
                                        if(isset($_SESSION['passwordErr'])){
                                            echo $_SESSION['passwordErr'];
                                            echo "<style>.passwordSpan{color:red}#pwd{border:1px solid red}</style>";
                                            unset($_SESSION['passwordErr']);
                                        }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label" for="conpswd">Confirm Password:<span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="password" class="form-control" id="conpswd" placeholder="Confirm Your password" name="conpswd" 
                                    value="<?php 
                                                if(isset($_SESSION['rconpswd'])){
                                                    echo $_SESSION['rconpswd'];
                                                    unset($_SESSION['rconpswd']);
                                                } 
                                            ?>">
                                <span class="conPasswordSpan">
                                    <?php
                                        if(isset($_SESSION['conPasswordErr'])){
                                            echo $_SESSION['conPasswordErr'];
                                            echo "<style>.conPasswordSpan{color:red}#conpswd{border:1px solid red}</style>";
                                            unset($_SESSION['conPasswordErr']);
                                        }else if(isset($_SESSION['PassworMatchdErr'])){
                                            echo $_SESSION['PassworMatchdErr'];
                                            echo "<style>.conPasswordSpan{color:red}#conpswd{border:1px solid red}</style>";
                                            unset($_SESSION['PassworMatchdErr']);
                                        }
                                        else if(isset($_SESSION['passwordValidationErr'])){
                                            echo $_SESSION['passwordValidationErr'];
                                            echo "<style>.conPasswordSpan{color:red}#conpswd{border:1px solid red}</style>";
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

