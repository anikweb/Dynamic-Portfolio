<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $select = "SELECT * FROM social_icon WHERE trash=1";
    $select_query = mysqli_query($db,$select);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <span class="breadcrumb-item active">All Social</span>
      </nav>
      <div class="sl-pagebody">
            <div class="row">
                <div class="col-11 md-auto mx-auto mt-5">
                    <?php
                        if(isset($_SESSION['socialMoveTrashSuccess'])):?>
                            <div class="alert alert-danger text-center"><span>Your Item Successfully Moved to <a href="social-trash.php">trash</a></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                        <?php 
                            unset($_SESSION['socialMoveTrashSuccess']);
                        endif
                    ?>
                    <?php
                        if(isset($_SESSION['socialAddSuccess'])):?>
                        <div class="alert alert-success text-center"><span><?=$_SESSION['socialAddSuccess']?></span>
                            <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                        </div>
                        <script>
                            swal('Success');
                        </script>
                    <?php
                        unset($_SESSION['socialAddSuccess']);
                        endif 
                    ?> 
                    <?php
                        if(isset($_SESSION['socialUpdateSuccess'])):?>
                        <div class="alert alert-success text-center"><span><?=$_SESSION['socialUpdateSuccess']?></span>
                            <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                        </div>
                        <script>
                            swal('Success');
                        </script>
                    <?php
                        unset($_SESSION['socialUpdateSuccess']);
                        endif 
                    ?> 
                    
                    <h2 class="text-center text-primary">All Socials</h2>
                    <div class="text-right">
                        <a class="btn btn-primary my-1" href="add-social.php"><i class="fa fa-plus"></i> Add Social</a>
                    </div>
                    <table class="table table-striped text-center" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Name of Social</th>
                                <th class="text-center">link</th>
                                <th class="text-center">Icon</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($select_query as $key => $value): ?>
                                    <tr>
                                        <td><?= ++$key?></td>
                                        <td>
                                            <?php
                                                if($value['icon']=="fab fa-facebook-f"){
                                                    echo "Facebook";
                                                }else if($value['icon']=="fab fa-twitter"){
                                                    echo "Twitter";
                                                }else if($value['icon']=="fab fa-instagram"){
                                                    echo "Instagram";
                                                }else if($value['icon']=="fab fa-linkedin-in"){
                                                    echo "Linkedin";
                                                }
                                            ?>
                                        </td>
                                        <td><?= $value['link'];?></td>
                                        <td><i class="<?= str_replace('fab','fa',$value['icon'])?> bg-dark p-1 text-light"></i></td>
                                        <td class="text-capitalize"><?= $value['status'];?></td>
                                        <td>
                                            <a href="edit-social.php?social_id=<?=$value['id'];?>" class="btn btn-primary editSocial">Edit Link</a>
                                            <?php
                                                if($value['status']=="active"){?>
                                                    <button style="cursor:pointer" data-id="<?=$value['id'];?>" class="btn btn-danger socialInactive">Dectivated</button>
                                               <?php }else{ ?>
                                                <button style="cursor:pointer" data-id="<?=$value['id'];?>" class="btn btn-success socialactive">Active</button>
                                                <?php }?>
                                                <button type="button" data-id="<?=$value['id']?>"  class="btn btn-danger moveToTrash" style="cursor: pointer;">Move to trash</button>
                                                
                                        </td>
                                    </tr>
                            <?php
                                endforeach
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
    <!-- ########## END: MAIN PANEL ########## -->
    <script>
        $('.socialInactive').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To Inactive This social icon",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Your Icon has been Inactive!", {
                        icon: "success",
                        buttons:false,
                    });  
                window.setTimeout(function(){
                    window.location.href = "active-inactive-social.php?user_id="+id;
                }, 2000);
                
            } else {
                swal("Your data is safe!");
            }
            });
        });
        $('.socialactive').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To active This social icon",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Your Icon has been activated!", {
                        icon: "success",
                        buttons:false,
                    });  
                window.setTimeout(function(){
                    window.location.href = "active-inactive-social.php?user_id2="+id;
                }, 2000);
                
            } else {
                swal("Your data is safe!");
            }
            });
        });
        $('.moveToTrash').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To active This social icon",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Successs", {
                        icon: "success",
                        buttons:false,
                    });  
                window.setTimeout(function(){
                    window.location.href = "social-move-to-trash.php?social_id3="+id;
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
