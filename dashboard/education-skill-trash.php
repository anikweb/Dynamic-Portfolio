<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $select = "SELECT * FROM educationskill WHERE status=2 ";
    $select_query = mysqli_query($db,$select);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
            <span class="breadcrumb-item active">Education or Skill Trash</span>
        </nav>
        
        <div class="sl-pagebody">
                <div class="row">
                    <div class="col-11 md-auto mx-auto">
                        <?php if(isset($_SESSION['restoreSuccess'])):?>
                            <div class="alert alert-light text-center">
                                <span>Your Data <a href="education.php">Restore</a> Success</span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                        <?php
                            unset($_SESSION['restoreSuccess']);
                        endif ?>
                        <?php
                            if(isset($_SESSION['trash_item_delted'])):?>
                            <div class="alert alert-danger text-center"><span><?=$_SESSION['trash_item_delted']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            
                            <?php
                                unset($_SESSION['trash_item_delted']);
                                endif 
                            ?> 
                    </div>
                    <div class="col-11 md-auto mx-auto mt-5 ">
                        
                        <h2 class="text-center text-primary">Education or Skill Trash</h2>
                        <table class="table table-striped bg-light text-center" id="myTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Name of Education or Skill</th>
                                    <th class="text-center">Year</th>
                                    <th class="text-center">Performance</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($select_query as $key => $value): ?>
                                        <tr>
                                            <td><?= ++$key?></td>
                                            <td><?= $value['name'];?></td>
                                            <td><?= $value['year'];?></td>
                                            <td><?= $value['perfomance'];?></td>
                                            
                                            <td>
                                                <button style="cursor:pointer" data-id="<?=$value['id']?>" class="btn btn-primary restoreTrash">Restore</button>
                                                <button style="cursor:pointer" data-id="<?=$value['id']?>" class="btn btn-danger deleteTrash">Delete Permanently</button>
                                            </td>
                                        </tr>
                                <?php endforeach  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        
    <!-- ########## END: MAIN PANEL ########## -->

    <script type="text/javascript">
        $('.deleteTrash').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "In future, you can not restore this data when you deleted permanently!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Your data has been deleted permanently!", {
                        icon: "success",
                        buttons:false,
                    });  
                window.setTimeout(function(){
                    window.location.href = "eduskill-trash-delete.php?eduskill_id="+id;
                }, 2000);
                
            } else {
                swal("Your data is safe!");
            }
            });
        });

        $('.restoreTrash').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To restore this item!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Your data restored!", {
                        icon: "success",
                        buttons:false,
                    });  
                window.setTimeout(function(){
                    window.location.href = "eduskill-trash-restore.php?eduskill_id="+id;
                }, 2000);
                
            } else {
                swal("Your data is still now in trash!");
            }
            });
        });
    </script>


<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
