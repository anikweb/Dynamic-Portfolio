<?php
  require_once('inc/db.php');
  $select = "SELECT * FROM copyright";
  $q = mysqli_query($db,$select);
  $assoc = mysqli_fetch_assoc($q);


?>
    <footer>
    <div class="row">
        <div class="col-md-12">
            <p><?php echo $assoc['copyright'].$assoc['text'].$assoc['rightReserved'];?></p>
        </div>
      </div>
      </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
    </footer>
    
    <script src="../assets/lib/popper.js/popper.js"></script>
    <script src="../assets/lib/bootstrap/bootstrap.js"></script>
    <script src="../assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../assets/js/starlight.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    
    <script>
        CKEDITOR.replace( 'summary' );
        CKEDITOR.replace( 'quote' );
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );
        
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
        output.innerHTML = this.value;
        }
    </script>
  </body>
</html>
