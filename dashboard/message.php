<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    
    $select = "SELECT * FROM messages ORDER BY status ASC";
    $select_query = mysqli_query($db,$select);

    $selectMessageCount = "SELECT * FROM messages WHERE status=1";
    $messageCountQ = mysqli_query($db,$selectMessageCount);
    $messageCount = mysqli_num_rows($messageCountQ);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <span class="breadcrumb-item active">Messages</span>
      </nav>
      <div class="sl-pagebody">
            <div class="row">
                <div class="col-9 md-auto mx-auto mt-5">
                    <?php
                        if(isset($_SESSION['partnersAddSuccess'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['partnersAddSuccess']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['partnersAddSuccess']);
                        endif
                    ?>
                    <?php
                        if(isset($_SESSION['editPartnersSuccess'])):?>
                            <div class="alert alert-success text-center"><span><?=$_SESSION['editPartnersSuccess']?></span>
                                <button type="button" class="btn close" style="cursor:pointer" data-dismiss="alert">&times;</button>
                            </div>
                            <script>
                                swal('Success');
                            </script>
                        <?php 
                            unset($_SESSION['editPartnersSuccess']);
                        endif
                    ?>
                    <?php
                        if(isset($_SESSION['moveTrashSuccess'])):?>
                            <div class="alert alert-danger text-center">Successfully Moved to <a class="text-primary" href="partners-trash.php">trash</a> <button style="cursor:pointer;" class="close" data-dismiss="alert">&times;</button></div>
                        <?php 
                            unset($_SESSION['moveTrashSuccess']);
                        endif
                    ?>
                    <h2 class="text-center text-primary">Messages </h2>
                    
                    <table class="table table-striped text-center bg-light" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Message</th>
                                <th class="text-center">Time</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($select_query as $key => $value): ?>
                                    <tr class="<?= $value['status'] ==1 ? 'font-weight-bold' :'' ?>">
                                        <td><?= ++$key ?></td>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td><?= $value['message'] ?></td>
                                        <td><?= $value['time'] ?></td>
                                        <td>
                                            <?php if($value['status'] ==1):?>
                                                <span class="tx-primary">Unread</span>
                                            <?php else:?>
                                                <span class="tx-primary">Read</span>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <a href="message-redirect.php?message_id=<?=$value['id']?>" class="btn btn-primary" type="button">View</a>
                                            <button type="button" style="cursor:pointer;" class="btn btn-danger deleteMessage" data-id='<?=$value['id']?>'>Delete</button>
                                        </td>
                                    </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
    <!-- ########## END: MAIN PANEL ########## -->
    <script type="text/javascript">
        $('.deleteMessage').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To delete this message",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Deleted", {
                    icon: "success",
                    buttons:false,
                });  
                window.setTimeout(function(){
                    window.location.href = "delete-message.php?message_id="+id;
                }, 2000);
                
            } else {
                swal("Action Denied");
            }
            });
        });
    </script>
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
