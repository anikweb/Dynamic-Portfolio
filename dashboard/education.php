<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $select = "SELECT * FROM educationskill WHERE status=1 ORDER BY year DESC";
    $select_query = mysqli_query($db,$select);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <span class="breadcrumb-item active">Education and Skill</span>
      </nav>
      <div class="sl-pagebody">
            <div class="row">
                <div class="col-11 md-auto mx-auto mt-5">
                    <?php
                        if(isset($_SESSION['EducationEditSuccess'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['EducationEditSuccess']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['EducationEditSuccess']);
                        endif
                    ?>
                    <?php
                        if(isset($_SESSION['educationAddSuccess'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['educationAddSuccess']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['educationAddSuccess']);
                        endif
                    ?>
                    <?php
                        if(isset($_SESSION['educationAddFailed'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['educationAddFailed']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['educationAddFailed']);
                        endif
                    ?>
                     <?php
                        if(isset($_SESSION['trashSuccess'])):?>
                            <div class="alert alert-danger text-center"><span>Your Item Successfully Moved to <a href="education-skill-trash.php">trash</a> </span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                        <?php 
                            unset($_SESSION['trashSuccess']);
                        endif
                    ?>
                     <?php
                        if(isset($_SESSION['trashFailed'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['trashFailed']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                        <?php 
                            unset($_SESSION['trashFailed']);
                        endif
                    ?>
                    <h2 class="text-center text-primary pb-4">Education and Skill</h2>
                    <div class="col-md-12 text-right">
                        <a href="add-education-skill.php" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New Item</a>
                    </div>
                    <table class="table table-striped text-center bg-light ">
                        <thead class="">
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Name of exam or skill</th>
                                <th class="text-center">Year</th>
                                <th class="text-center">Percentage of perfomance</th>
                                <th class="text-center">Oparation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($select_query as $key => $value) : ?>
                                <tr>
                                    <td><?= ++$key?></td>
                                    <td><?= $value['name']?></td>
                                    <td><?= $value['year']?></td>
                                    <td><?= $value['perfomance'].'%';?></td>
                                    
                                    <td>
                                        <a href="edit-education-skill.php?eduskill=<?=$value['id']?>" class="btn btn-primary">Edit</a>
                                        <button data-id="<?=$value['id']?>" class="eduskillTrash btn btn-danger" >Move to Trash</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        <script>
            $('.eduskillTrash').click(function(){
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
                    window.location.href = "trash-education-skill-post.php?trash_id="+id;
                }, 2000);
                
            } else {
                swal("Your data is safe!");
            }
            });
        });
        </script>
    <!-- ########## END: MAIN PANEL ########## -->
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
