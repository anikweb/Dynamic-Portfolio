<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $select = "SELECT * FROM facts";
    $select_query = mysqli_query($db,$select);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <span class="breadcrumb-item active">Facts</span>
      </nav>
      <div class="sl-pagebody">
            <div class="row">
                <div class="col-11 md-auto mx-auto mt-5">
                    <?php
                        if(isset($_SESSION['factValueUpdateSuccess'])):?>
                        <div class="alert alert-success text-center"><span><?=$_SESSION['factValueUpdateSuccess']?></span>
                            <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                        </div>
                        <script>
                            swal('Success');
                        </script>
                    <?php
                        unset($_SESSION['factValueUpdateSuccess']);
                        endif 
                    ?> 
                     <?php
                        if(isset($_SESSION['factValueUpdateFailed'])):?>
                        <div class="alert alert-success text-center"><span><?=$_SESSION['factValueUpdateFailed']?></span>
                            <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                        </div>
                        <script>
                            swal('Success');
                        </script>
                    <?php
                        unset($_SESSION['factValueUpdateFailed']);
                        endif 
                    ?> 
                    <h2 class="text-center text-primary">Facts</h2>
                    
                    <table class="table table-striped text-center bg-light" id="myTable">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Name of Facts</th>
                                <th class="text-center">Icon</th>
                                <th class="text-center">Value</th>
                                <th class="text-center text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($select_query as $key => $value): ?>
                                    <tr>
                                        <td><?= ++$key?></td>
                                        <td><?= $value['name'];?></td>
                                        <td><span class="small text-muted">this icon not supported <br/> backend font awesome version</span></td>
                                        <td><?= $value['value'];?></td>
                                        <td>
                                            <a href="edit-fact-value.php?factid=<?=$value['id']?>" class="btn btn-primary">Edit value</a>
                                        </td>
                                        
                                        
                                    </tr>
                            <?php
                                endforeach
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
                if(isset($_SESSION['socialSession'])){?>
                    <script>
                        swal("<?=$_SESSION['socialSession']?>:");
                    </script>
            <?php
            unset($_SESSION['socialSession']);
                }
            ?>
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
    </script>
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
