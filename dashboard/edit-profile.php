<?php
    ob_start();
    require_once('inc/db.php');
    require_once('inc/header.php');
    $id = $_SESSION['id'];
    $edit_select = "SELECT * FROM user_info WHERE id = $id";
    $edit_query = mysqli_query($db,$edit_select);
    $edit_assoc = mysqli_fetch_assoc($edit_query);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit Profile</span>
      </nav>

        <div class="sl-pagebody">
                <form action="profile-update.php" method="POST" enctype="multipart/form-data">        
                    <div class="card pd-20 pd-sm-40">
                        <h2 class="text-primary text-center">Edit Profile</h2>
                        <div class="row">
                            <div class="col-md-6 pt-3">
                                <label for="editPName">Name: <span class="tx-danger">*</span></label>
                                <input type="text" id="editPName" value="<?php if(isset($edit_assoc['name'])){echo $edit_assoc['name'];}?>" name="name" class="form-control">
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['profileNameUpdateEmpty'])){
                                            echo $_SESSION['profileNameUpdateEmpty'];
                                            echo "<style>#editPName{border:1px solid red}</style>";
                                            unset($_SESSION['profileNameUpdateEmpty']);
                                        }
                                    ?>
                                </span>
                            </div>
                            <!-- col -->
                            <div class="col-md-6 pt-3">
                                <label for="editPEmail">Email: <span class="tx-danger">*</span></label>
                                <input type="email" id="editPEmail" class="form-control" value="<?php if(isset($edit_assoc['email'])){echo $edit_assoc['email'];}?>" name="email">
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['profileEmailUpdateEmpty'])){
                                            echo $_SESSION['profileEmailUpdateEmpty'];
                                            echo "<style>#editPEmail{border:1px solid red}</style>";
                                            unset($_SESSION['profileEmailUpdateEmpty']);
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-6 pt-3">
                                <label for="editPEmail">Profile Picture: <span class="tx-danger">*</span></label>
                                <input type="file" id="prImageUp" class="form-control" name="Profile_image" onchange="document.getElementById('editPimage').src = window.URL.createObjectURL(this.files[0])">
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['profileImgUpdateEmpty'])){
                                            echo $_SESSION['profileImgUpdateEmpty'];
                                            echo "<style>#prImageUp{border:1px solid red}</style>";
                                            unset($_SESSION['profileImgUpdateEmpty']);
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-6 pt-3">
                                <label>Preview:</label>
                                <img id="editPimage" src="../profile-img/<?=$edit_assoc['profile_img']?>" height="400px" width="400px" alt="Profile Picture Preview:" style="border-radius:50%;">
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
