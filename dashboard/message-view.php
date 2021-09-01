<?php
    ob_start();
    require_once('inc/header.php');
    require_once('inc/db.php');
    $id = $_SESSION['message_id'];
    $select = "SELECT * FROM messages WHERE id = $id";
    $select_query = mysqli_query($db,$select);
    $messageAssoc = mysqli_fetch_assoc($select_query);

?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.php"><i class="fa fa-home tx-20"></i></a>
        <a class="breadcrumb-item" href="message.php">Messages</a>
        <span class="breadcrumb-item active">Message of <span class="text-primary"><?=$messageAssoc['name']?></span> </span>
      </nav>
      <div class="sl-pagebody">
            <div class="row">
                <div class="col-9 md-auto mx-auto mt-5">
                    <h2 class="text-center text-primary">Messages </h2>
                    <div class="row">
                        <div class="col-md-8 p-3 mx-auto">
                            <span class="pl-2 tx-info"><?=$messageAssoc['time']?></span>
                           <table class="table table-striped p-2">
                            <tr>
                                <td class="text-primary">Name</td>
                                <td><?=$messageAssoc['name']?></td>
                            </tr>
                            <tr>
                                <td class="text-primary">Email</td>
                                <td><?=$messageAssoc['email']?></td>
                            </tr>
                            <tr>
                                <td class="text-primary">Message</td>
                                <td><?=$messageAssoc['message']?></td>
                            </tr>
                           </table>
                           <button type="button" class="btn btn-primary">Reply</button>
                           <button type="button" class="btn btn-primary">Forward</button>
                        </div>
                        
                    </div>
                </div>
            </div>
    <!-- ########## END: MAIN PANEL ########## -->
    <script type="text/javascript">
        $('.deactivate-button').click(function(){
            var id = $(this).attr("data-id");
            swal({
            title: "Are you sure?",
            text: "To Deactivate this partner",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("This partner Currently Inactive", {
                    icon: "success",
                    buttons:false,
                });  
                window.setTimeout(function(){
                    window.location.href = "active-inactive-partner.php?partner_id="+id;
                }, 2000);
                
            } else {
                swal("This partner Currently active!");
            }
            });
        });
       
<?php
    require_once('inc/footer.php');
    ob_end_flush();
?>
