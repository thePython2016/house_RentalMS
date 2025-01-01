<?php

if(isset($_SESSION['message']))
{
    ?>
    <style>

        .alert{
            width:600px !important;
            height:50px !important;
            background:rgb(214, 208, 208) !important;
        }
        .alert p{

           padding-bottom:10px !important;
            background:rgb(214, 208, 208) !important;
        }
    </style>
   <div class="container mt-5">
    <!-- Alert -->
    <div id="autoCloseAlert" class="alert alert-success alert-dismissible fade show" role="alert">
 <?php echo $_SESSION['message']?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
<?php
}

unset($_SESSION['message']);
?>

<script>
    // Auto-close the alert after 5 seconds (5000 milliseconds)
    setTimeout(function() {
      var alert = document.getElementById('autoCloseAlert');
      var bsAlert = new bootstrap.Alert(alert);
      bsAlert.close();
    }, 5000); // Adjust time as needed
  </script>