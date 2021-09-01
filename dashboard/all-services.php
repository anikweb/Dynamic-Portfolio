<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $select = "SELECT * FROM services WHERE trash=1 ";
    $select_query = mysqli_query($db,$select);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <span class="breadcrumb-item active">All Services</span>
      </nav>
      <div class="sl-pagebody">
            <div class="row">
                <div class="col-11 md-auto mx-auto mt-5">
                
                    <?php
                        if(isset($_SESSION['serviceaddSuccess'])):?>
                            <div class="alert alert-danger text-center"><span><?=$_SESSION['serviceaddSuccess']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['serviceaddSuccess']);
                        endif
                    ?>
                    <?php
                        if(isset($_SESSION['editServiceSuccess'])):?>
                            <div class="alert alert-danger text-center"><span><?=$_SESSION['editServiceSuccess']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['editServiceSuccess']);
                        endif
                    ?>
                    <?php
                        if(isset($_SESSION['moveTrashSuccess'])):?>
                            <div class="alert alert-danger text-center">Successfully Moved to <a class="text-primary" href="services-trash.php">trash</a> <button style="cursor:pointer;" class="close" data-dismiss="alert">&times;</button></div>
                        <?php 
                            unset($_SESSION['moveTrashSuccess']);
                        endif
                    ?>
                    <h2 class="text-center text-primary">All Services</h2>
                    <div class="text-right">
                        <a class="btn btn-primary my-1" href="add-services.php"><i class="fa fa-plus"></i> Add Services</a>
                    </div>
                    <table class="table table-striped text-center bg-light" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Name of Services</th>
                                <th class="text-center">icon</th>
                                <th class="text-center">summary</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($select_query as $key => $value): ?>
                                    <?php 
                                        $iconExplode = explode(' ',$value['icon']);
                                    ?>
                                    <tr>
                                        <td><?= ++$key?></td>
                                        <td class="text-capitalize"><?= $value['name'];?></td>
                                        <td><i class="<?php if($iconExplode[0] =="fab"){echo str_replace('fab','fa',$value['icon']);}else if($iconExplode[0] =="fal"){echo str_replace('fal','fa',$value['icon']);} ?> p-2 bg-dark text-light tx-15"></i></td>
                                        <td><?= $value['summary'];?></td>
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
                                            <a href="edit-services.php?service_id=<?=$value['id']?>" class="btn btn-primary">Edit</a>
                                            <?php
                                                if($value['status']==1):?>
                                                    <button style="cursor:pointer" data-id="<?=$value['id']?>" class="btn btn-danger inactive-button">Inactive</button>
                                                <?php else: ?>
                                                    <button style="cursor:pointer" data-id="<?=$value['id']?>" class="btn btn-success active-button">Active</button>
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
    <script>
        $('.inactive-button').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To inactive this services",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("This Services Currently Inactive", {
                    icon: "success",
                    buttons:false,
                });  
                window.setTimeout(function(){
                    window.location.href = "active-inactive-service.php?user_id="+id;
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
            text: "To active this services",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("This Services Currently active", {
                    icon: "success",
                    buttons:false,
                });  
                window.setTimeout(function(){
                    window.location.href = "active-inactive-service.php?user_id2="+id;
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
            text: "To move this services to trash",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("This Services Moved to Trash", {
                    icon: "success",
                    buttons:false,
                });  
                window.setTimeout(function(){
                    window.location.href = "service-move-to-trash.php?user_id="+id;
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
