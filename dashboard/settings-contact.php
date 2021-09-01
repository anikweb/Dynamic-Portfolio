<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $select = "SELECT * FROM site_contact";
    $select_query = mysqli_query($db,$select);
    $value = mysqli_fetch_assoc($select_query);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <span class="breadcrumb-item active">Settings :: Site Contact</span>
      </nav>
      <div class="sl-pagebody">
            <div class="row">
                <div class="col-11 md-auto mx-auto mt-5">
                    <?php
                        if(isset($_SESSION['siteContactUpdated'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['siteContactUpdated']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['siteContactUpdated']);
                        endif
                    ?>
                    <h2 class="text-center text-primary pb-4">Settings :: Site Contact</h2>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a class="btn btn-primary mr-3 mb-2" href="#"> <i class="fa fa-plus"></i> Add New</a>
                        </div>
                    </div>
                    <table class="table table-striped text-center bg-light">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Type</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Socials</th>
                                <th class="text-center">Social Link</th>
                                <th class="text-center">Oparation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$value['type']?></td>
                                <td><?=$value['title']?></td>
                                <td><?=$value['address']?></td>
                                <td><?=$value['phone']?></td>
                                <td><?=$value['email']?></td>
                                <td><?=$value['socials']?></td>
                                <td><?=$value['link']?></td>
                                <td>
                                    <a class="btn btn-primary" href="edit-site-contact.php?contact_id=<?=$value['id']?>">Edit</a>
                                </td>
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
