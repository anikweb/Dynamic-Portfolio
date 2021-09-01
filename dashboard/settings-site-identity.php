<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $select = "SELECT * FROM site_identity";
    $select_query = mysqli_query($db,$select);
    $value = mysqli_fetch_assoc($select_query);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <span class="breadcrumb-item active">Settings :: Site Identity</span>
      </nav>
      <div class="sl-pagebody">
            <div class="row">
                <div class="col-11 md-auto mx-auto mt-5">
                    <?php
                        if(isset($_SESSION['siteIdentityUpdateSuccess'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['siteIdentityUpdateSuccess']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['siteIdentityUpdateSuccess']);
                        endif
                    ?>
                    <h2 class="text-center text-primary pb-4">Settings :: Site Identity</h2>
                    <table class="table table-striped text-center bg-light">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Site Title</th>
                                <th class="text-center">Tagline</th>
                                <th class="text-center">Logo</th>
                                <th class="text-center">Sticky Logo</th>
                                <th class="text-center">Site Icon</th>
                                <th class="text-center">banner Image</th>
                                <th class="text-center">Oparation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $value['site_title'];?></td>
                                <td><?= $value['tagline'];?></td>
                                <td><img width="80px" src="../assets/img/site-identity/site-logo/<?=$value['logo'];?>"></td>
                                <td><img width="80px" src="../assets/img/site-identity/sticky-logo/<?=$value['sticky_logo'];?>"></td>
                                <td><img width="30px" src="../assets/img/site-identity/site-icon/<?=$value['site_icon'];?>"></td>
                                <td><img width="50px" src="../assets/img/site-identity/banner-image/<?=$value['banner_image'];?>"></td>
                                <td><a href="edit-site-identity.php?identity=<?=$value['id']?>" class="btn btn-primary">Edit</a></td>
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
