<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $select = "SELECT * FROM user_info WHERE status=1 ORDER BY id DESC ";
    $select_query = mysqli_query($db,$select);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <span class="breadcrumb-item active">All Users</span>
      </nav>

      <div class="sl-pagebody">
            <div class="row">
                <div class="col-11 md-auto mx-auto mt-5">
                    <?php
                        if(isset($_SESSION['item_moved-to_trash'])):?>
                        <div class="alert alert-danger text-center"><span>Your Item Successfully Moved to  <a href="user-trash.php">trash</a></span>
                            <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                        </div>
                    <?php
                        unset($_SESSION['item_moved-to_trash']);
                        endif 
                    ?> 
                    <?php if(isset($_SESSION['updateSuccess'])):?>
                        <div class="alert alert-light text-center">
                            <span><?=$_SESSION['updateSuccess'];?></span>
                            <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                        </div>
                        <script>
                            swal('Success');
                        </script>
                    <?php unset($_SESSION['updateSuccess']); endif ?>
                    <h2 class="text-center text-primary">Registered User List</h2>
                    <div class="text-right">
                        <a class="btn btn-primary" href="insert.php"><i class="fa fa-plus"></i>Add Users</a>
                    </div>
                    <table class="table table-striped text-center" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($select_query as $key => $value): ?>
                                    <tr>
                                        <td><?= ++$key?></td>
                                        <td><?= $value['name'];?></td>
                                        <td><?= $value['email'];?></td>
                                        <td>
                                            <img width="50px" src="../profile-img/<?= $value['profile_img'];?>" alt="">
                                        </td>
                                        <td>
                                            <?php
                                                if($value['role'] == 1){
                                                    echo "<span class='text-muted'>User</span>";
                                                }else if($value['role'] == 2){
                                                    echo "<span class='text-primary'>Employee</span>";
                                                }else{
                                                    echo "<span class='text-success'>Admin</span>";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($value['role'] == 1 || $value['role'] == 2):?>
                                                <a href="edit.php?user_id2=<?=$value['id']?>" class="btn btn-primary">Edit</a>
                                                <button style="cursor:pointer" data-id="<?=$value['id']?>" class="btn btn-danger userTrash">Move to Trash</button>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        
    <!-- ########## END: MAIN PANEL ########## -->
    <script>
       $('.userTrash').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To move data to trash",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Your data has been moved to trash!", {
                        icon: "success",
                        buttons:false,
                    });  
                window.setTimeout(function(){
                    window.location.href = "user-delete.php?user_id="+id;
                }, 2000);
                
            } else {
                swal("Your data is safe!");
            }
            });
        });
    </script>
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>