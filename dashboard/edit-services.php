<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $id = $_GET['service_id'];
    $serviceSelect = "SELECT * FROM services WHERE id = $id";
    $serviceQ  = mysqli_query($db,$serviceSelect);
    $serviceAssoc = mysqli_fetch_assoc($serviceQ);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <a class="breadcrumb-item" href="all-services.php">All Services</a>
        <span class="breadcrumb-item active">Edit Services</span>
      </nav>

        <div class="sl-pagebody">
            <div class="row mt-5">
                    <div class="col-10 md-auto mx-auto">
                        <?php if(isset($_SESSION['iconExist'])):?>
                            <div class="alert alert-danger text-center">
                                <span><?= $_SESSION['iconExist']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                        <?php
                            unset($_SESSION['iconExist']);
                            endif 
                        ?>
                    </div>
                </div>
                <form action="edit-service-query.php" method="POST">        
                    <div class="card pd-20 pd-sm-40">
                        <h2 class="text-primary text-center">Edit Services</h2>
                        <div class="row">
                        <div class="col-md-6 mt-1">
                            <label for="">Name of Services</label>
                            <input hidden type="text" name="id" value="<?=$id?>">
                            <input value="<?=$serviceAssoc['name'];?>" type="text" name='name' id='name' class="form-control" placeholder="Enter Name of Services">
                            <span class="text-danger">
                                <?php
                                    if(isset($_SESSION['nameEmpty'])){
                                        echo $_SESSION['nameEmpty'];
                                        echo "<style>#name{border:1px solid red}</style>";
                                        unset($_SESSION['nameEmpty']);
                                    }
                                ?>
                            </span>
                        </div>
                            <div class="col-md-6 mt-1">
                                <label for="icon">Icon</label>
                                <select name="icon" id="icon" class="form-control">
                                    <option value="" selected>Select Icon</option>
                                    <option <?php  if($serviceAssoc['icon'] == 'fab fa-react' ){echo 'selected';} ?> value="fab fa-react">CREATIVE DESIGN</option>

                                    <option <?php if($serviceAssoc['icon'] == 'fab fa-free-code-camp' ){echo 'selected';} ?> value="fab fa-free-code-camp">UNLIMITED FEATURES</option>

                                    <option <?php if($serviceAssoc['icon'] == 'fal fa-desktop' ){echo 'selected';} ?> value="fal fa-desktop">ULTRA RESPONSIVE</option>

                                    <option <?php if($serviceAssoc['icon'] == 'fal fa-lightbulb-on' ){echo 'selected';} ?> value="fal fa-lightbulb-on">CREATIVE IDEAS</option>

                                    <option <?php if($serviceAssoc['icon'] == 'fal fa-edit' ){echo 'selected';} ?> value="fal fa-edit">EASY CUSTOMIZATION</option>

                                    <option <?php if($serviceAssoc['icon'] == 'fal fa-headset' ){echo 'selected';} ?> value="fal fa-headset">SUPPER SUPPORT</option>
                                </select>
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['iconEmpty'])){
                                            echo $_SESSION['iconEmpty'];
                                            echo "<style>#icon{border:1px solid red}</style>";
                                            unset($_SESSION['iconEmpty']);
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-12 mt-1">
                                <label for="link">Summary</label>
                                <textarea name="summary" id="summary" cols="30" rows="10" class="form-control"><?=$serviceAssoc['summary']?></textarea>
                                <span class="text-danger">
                                    <?php
                                        if(isset($_SESSION['summaryEmpty'])){
                                            echo $_SESSION['summaryEmpty'];
                                            echo "<style>#summary{border:1px solid red}</style>";
                                            unset($_SESSION['summaryEmpty']);
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="col-md-6 mt-1">
                                
                            </div>
                            <div class="col-md-12 mt-3 text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        <!-- row -->
                    </div><!-- card -->
                </form>
    <!-- ########## END: MAIN PANEL ########## -->
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
