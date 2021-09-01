<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $select = "SELECT * FROM portfolios WHERE trash=2 ";
    $select_query = mysqli_query($db,$select);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
            <span class="breadcrumb-item active">Portfolios Trash</span>
        </nav>
        
        <div class="sl-pagebody">
                <div class="row">
                    <div class="col-8 md-auto mx-auto">
                        <?php if(isset($_SESSION['restoreSuccess'])):?>
                            <div class="alert alert-light text-center">
                                <span>Your Data <a href="portfolios.php">Restore</a> Success</span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                        <?php
                            unset($_SESSION['restoreSuccess']);
                        endif ?>
                    </div>
                    <div class="col-11 md-auto mx-auto mt-5 ">
                        <?php
                            if(isset($_SESSION['trash_item_delted'])):?>
                            <div class="alert alert-danger text-center"><span><?=$_SESSION['trash_item_delted']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            
                            <?php
                                unset($_SESSION['trash_item_delted']);
                                endif 
                            ?> 
                        <h2 class="text-center text-primary">Portfolios Trash</h2>
                        <table class="table table-striped text-center bg-light" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Summary</th>
                                <th class="text-center">Thumbnail Image</th>
                                <th class="text-center">Featured Image</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($select_query as $key => $value): ?>
                                    <tr>
                                        <td><?= ++$key?></td>
                                        <td class="text-capitalize"><?= $value['title'];?></td>
                                        <td class="text-capitalize"><?= $value['category'];?></td>
                                        <td class="text-capitalize text-justify"><?= nl2br($value['summary']);?></td>
                                        <td class="text-capitalize"><img width="100px" src="../assets/img/portfolios/thumbnail/<?= $value['thumbnail_image'];?>" alt="Thumbnail Image"></td>
                                        <td class="text-capitalize"><img width="100px" src="../assets/img/portfolios/featured/<?= $value['featured_image'];?>" alt="Featured Image"></td>
                                        <td class='text-right'>
                                            <button style="cursor:pointer" data-id="<?=$value['id']?>" class="btn btn-primary restoreTrash">Restore</button>
                                        </td>
                                        <td>
                                            <button style="cursor:pointer" data-id="<?=$value['id']?>" class="btn btn-danger deleteTrash">Delete Permanently</button>
                                        </td>
                                    </tr>
                            <?php endforeach ?>
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
            text: "In future, you can not restore this portfolio when you deleted permanently!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Your portfolio has been deleted permanently!", {
                        icon: "success",
                        buttons:false,
                    });  
                window.setTimeout(function(){
                    window.location.href = "portfolio-restore-delete.php?user_id="+id;
                }, 2000);
                
            } else {
                swal("Your portfolio steel now in trash!");
            }
            });
        });

        $('.restoreTrash').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To restore this Portfolio!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Your Portfolio restored!", {
                        icon: "success",
                        buttons:false,
                    });  
                window.setTimeout(function(){
                    window.location.href = "portfolio-restore-delete.php?user_id2="+id;
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
