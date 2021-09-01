<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $select = "SELECT * FROM about WHERE status=1";
    $select_query = mysqli_query($db,$select);
    $aboutAssoc = mysqli_fetch_assoc($select_query);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <span class="breadcrumb-item active">Settings :: About</span>
      </nav>
      <div class="sl-pagebody">
            <div class="row">
                <div class="col-11 md-auto mx-auto mt-5">
                    <?php
                        if(isset($_SESSION['aboutUpdateSuccess'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['aboutUpdateSuccess']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['aboutUpdateSuccess']);
                        endif
                    ?>
                    <h2 class="text-center text-primary pb-4">Settings :: About</h2>
                    <table class="table table-striped text-center bg-light">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Title</th>
                                <th class="text-center">Summary</th>
                                <th class="text-center">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$aboutAssoc['title']?></td>
                                <td><?=$aboutAssoc['aboutSumm']?></td>
                                <td><a href="edit-about.php?aboutid=<?=$aboutAssoc['id']?>" class="btn btn-primary">Edit</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        
    <!-- ########## END: MAIN PANEL ########## -->
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
