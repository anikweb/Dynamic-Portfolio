<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $select = "SELECT * FROM partners WHERE trash=1 ";
    $select_query = mysqli_query($db,$select);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <span class="breadcrumb-item active">Partners</span>
      </nav>
      <div class="sl-pagebody">
            <div class="row">
                <div class="col-9 md-auto mx-auto mt-5">
                    <?php
                        if(isset($_SESSION['partnersAddSuccess'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['partnersAddSuccess']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['partnersAddSuccess']);
                        endif
                    ?>
                    <?php
                        if(isset($_SESSION['editPartnersSuccess'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['editPartnersSuccess']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['editPartnersSuccess']);
                        endif
                    ?>
                    <?php
                        if(isset($_SESSION['moveTrashSuccess'])):?>
                            <div class="alert alert-danger text-center">Successfully Moved to <a class="text-primary" href="partners-trash.php">trash</a> <button style="cursor:pointer;" class="close" data-dismiss="alert">&times;</button></div>
                        <?php 
                            unset($_SESSION['moveTrashSuccess']);
                        endif
                    ?>
                    <h2 class="text-center text-primary">Partners</h2>
                    <div class="text-right">
                        <a class="btn btn-primary my-1" href="add-partners.php"><i class="fa fa-plus"></i> Add Partners</a>
                    </div>
                    <table class="table table-striped text-center bg-light" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Alt Name</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($select_query as $key => $value): ?>
                                    <tr>
                                        <td><?= ++$key?></td>
                                        <td class="text-capitalize"><?= $value['p_name'];?></td>
                                        <td><img width="80px" src="../assets/img/partners/<?= $value['p_image'];?>" alt="<?= $value['alt_name'];?>"> </td>
                                        <td><?= $value['alt_name'];?></td>
                                        <td>
                                            <?php
                                                if($value['status']==1){
                                                    echo "<span class='text-success'>Active</span>";
                                                }else{
                                                    echo "<span class='text-danger'>Inactive</span>";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="edit-partners.php?partner_id=<?=$value['id']?>" class="btn btn-primary">Edit</a>
                                            <?php
                                                if($value['status']==1):?>
                                                    <button style="cursor:pointer" data-id="<?=$value['id']?>" class="btn btn-danger deactivate-button">Deactivate</button>
                                                <?php else: ?>
                                                    <button style="cursor:pointer" data-id="<?=$value['id']?>" class="btn btn-success activate-button">Active</button>
                                            <?php endif ?>
                                                <button data-id="<?=$value['id']?>" class="btn btn-danger moveTrash">Move to Trash</button>
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
    <script type="text/javascript">
        $('.deactivate-button').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To Deactivate this partner",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("This partner Currently Inactive", {
                    icon: "success",
                    buttons:false,
                });  
                window.setTimeout(function(){
                    window.location.href = "active-inactive-partner.php?partner_id="+id;
                }, 2000);
                
            } else {
                swal("This partner Currently active!");
            }
            });
        });
        $('.activate-button').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To active this quote",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("This partner Currently active", {
                    icon: "success",
                    buttons:false,
                });  
                window.setTimeout(function(){
                    window.location.href = "active-inactive-partner.php?partner_id2="+id;
                }, 2000);
                
            } else {
                swal("This partner Currently inactive!");
            }
            });
        });

        $('.moveTrash').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To move this partner to trash",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("This partner Moved to Trash", {
                    icon: "success",
                    buttons:false,
                });  
                window.setTimeout(function(){
                    window.location.href = "partner-move-to-trash.php?partner_id3="+id;
                }, 2000);
                
            } else {
                swal("Your data is safe!");
            }
            });
        });
        
        <?php
            if(isset($_SESSION['editServiceSuccess'])){?>
            swal("<?=$_SESSION['editServiceSuccess']?>");
        <?php
        unset($_SESSION['editServiceSuccess']);
            }
        
        ?>
    </script>
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
