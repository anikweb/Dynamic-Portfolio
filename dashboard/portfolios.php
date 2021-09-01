<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $select = "SELECT * FROM portfolios WHERE trash=1 ";
    $select_query = mysqli_query($db,$select);
?>  
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <span class="breadcrumb-item active">All Portfolios</span>
      </nav>
      <div class="sl-pagebody">
            <div class="row">
                <div class="col-11 md-auto mx-auto mt-5">
                    <?php
                        if(isset($_SESSION['portfolioAddSuccess'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['portfolioAddSuccess']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['portfolioAddSuccess']);
                        endif
                    ?>
                    <?php
                        if(isset($_SESSION['portfolioEditSuccess'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['portfolioEditSuccess']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['portfolioEditSuccess']);
                        endif
                    ?>
                    <?php
                        if(isset($_SESSION['portfolioEditFailed'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['portfolioEditFailed']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['portfolioEditFailed']);
                        endif
                    ?>
                    <?php
                        if(isset($_SESSION['portfolioMoveTrashSuccess'])):?>
                            <div class="alert alert-danger text-center"><span>Your Item Successfully Moved to <a href="portfolio-trash.php">trash</a> </span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                        <?php 
                            unset($_SESSION['portfolioMoveTrashSuccess']);
                        endif
                    ?>
                    <h2 class="text-center text-primary">My Portfolios</h2>
                    <div class="text-right">
                        <a class="btn btn-primary my-1" href="add-portfolio.php"><i class="fa fa-plus"></i> Add POrtfolio</a>
                    </div>
                    <table class="table table-striped text-center bg-light" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Summary</th>
                                <th class="text-center">Thumbnail Image</th>
                                <th class="text-center">Featured Image</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" colspan="3">Action</th>
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
                                        <td>
                                            <?php
                                                if($value['status']==1){
                                                    echo "<span class='text-success'>Active</span>";
                                                }else{
                                                    echo "<span class='text-danger'>Inactive</span>";
                                                }
                                            ?>
                                        </td>
                                        <td> <a href="edit-portfolio.php?user_id=<?=$value['id']?>" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            <?php
                                                if($value['status'] == 1){?>
                                                    <button style="cursor:pointer" data-id="<?=$value['id']?>" class="btn btn-danger inactive-button">Inactive</button>
                                            <?php } else if($value['status'] == 2){ ?>
                                                <button style="cursor:pointer" data-id="<?=$value['id']?>" class="btn btn-success active-button">Active</button>
                                                <?php }
                                            ?>
                                        </td>
                                        <td>
                                            <button data-id="<?=$value['id']?>" class="btn btn-danger moveTrash">Move to Trash</button>
                                        </td>
                                    </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
    <!-- ########## END: MAIN PANEL ########## -->
    <script>
        $('.inactive-button').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To inactive this portfolio",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("This portfolio has been inactivated", {
                    icon: "success",
                    buttons:false,
                });  
                window.setTimeout(function(){
                    window.location.href = "active-inactive-trash-portfolio-post.php?user_id="+id;
                }, 2000);
                
            } else {
                swal("Your data is safe!");
            }
            });
        });

        $('.active-button').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To active this portfolio",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("This portfolio has been activated", {
                    icon: "success",
                    buttons:false,
                });  
                window.setTimeout(function(){
                    window.location.href = "active-inactive-trash-portfolio-post.php?user_id2="+id;
                }, 2000);
                
            } else {
                swal("Your data is safe!");
            }
            });
        });

        $('.moveTrash').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To move into trash this portfolio",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("This portfolio has been moved into trash", {
                    icon: "success",
                    buttons:false,
                });  
                window.setTimeout(function(){
                    window.location.href = "active-inactive-trash-portfolio-post.php?user_id3="+id;
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
