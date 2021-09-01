<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    if(isset($_GET['user_id2'])){
    $id2 = $_GET['user_id2'];
    $edit_select = "SELECT * FROM user_info WHERE id = $id2";
    $edit_query = mysqli_query($db,$edit_select);
    $edit_fetch = mysqli_fetch_assoc($edit_query);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20" ></i></a>
            <a class="breadcrumb-item" href="users.php">All Users</a>
            <span class="breadcrumb-item active">Edit Users</span>
      </nav>

        <div class="sl-pagebody">
                <form action="edit-query.php" method="POST">        
                    <div class="card pd-20 pd-sm-40">
                        <h2 class="text-primary text-center">Edit User Data</h2>
                        <div class="row">
                            <div class="col-md-6 d-none">
                                <input type="text" hidden  value="<?= $edit_fetch['id']  ?>" name="id2" class="form-control">
                            </div>
                            <!-- col -->
                            <div class="col-md-6">
                                <input type="name" class="form-control" id="name2" value="<?= $edit_fetch['name']?>" name="name2">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="email2" value="<?= $edit_fetch['email']?>" name="email2">
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
