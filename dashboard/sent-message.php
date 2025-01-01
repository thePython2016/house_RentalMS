<?php

session_start();
if(!isset($_SESSION['id']))
{
  echo "
  <script>
  window.location.href='../index.php';
  </script>
  ";
}

?>
<!DOCTYPE html>


<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Message</title>

    <meta name="description" content="" />
      <!-- Datatable begin-->
      <link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
<!-- Datatable end -->
      
      
      <!-- Datatables End -->
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="https://kit.fontawesome.com/e5a3a8dd00.js" crossorigin="anonymous"></script>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
     <!-- Charts -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
     
     <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
     <!-- charts end -->


     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<script>

$(document).ready(function() {
  $('.accordion-header').click(function() {
    // Toggle the clicked section's content
    $(this).next('.accordion-content').slideToggle();
    
    // Hide other sections' content
    $('.accordion-content').not($(this).next()).slideUp();
  });
});
</script>
<style>

.accordion {
  width: 100%;
  max-width: 600px;
  margin: auto;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.accordion-item {
  border-top: 1px solid #ddd;
}

.accordion-header {
  padding: 15px;
  cursor: pointer;
  font-weight: bold;
  background-color: #f2f2f2;
}

.accordion-content {
  display: none;
  padding: 15px;
  background-color: #fff;
}

</style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

<?php include 'main-menu.php'?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php 

require 'user-profile.php';
?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
           
                <div class="col-lg-12 col-md-12 order-1">
                  <div class="row">
              
                    <div class="col-lg-12 col-md-12 col-12 mb-4">
                  
                    <a class="btn addBtn" href="tenants.php" style="float:right">
  <i class="fas fa-plus"></i> Tenant
</a>
                         
                     
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0" style="margin-bottom:700px">
                   
                        <h5 class="card-header m-0 me-2 pb-3">Sent Messages</h5>
                        <hr>
                        <?php

require 'notification.php';

         ?>
                      <div class="col-md-12 " >
                    
                      
      
 <!-- FORM -->

       
  

    <div class="accordion" style="width:400px !important;margin:0 auto;border-color:#1E2761" >
    <?php
    require "dbConnection.php";
    $selectMessage=mysqli_query($conn,"select * from sent");
    foreach($selectMessage as $messages)
    {
      $phone=$messages['receiver'];
      $phone2=str_replace(["[","]"],"",$phone)
        ?>
        <div class="accordion-item">
 
        <div class="accordion-header" style="border-bottom:1px solid;background:#4acbd6"><?php echo $messages['receiver'].' '.$messages['date']?></div>
    
        <div class="accordion-content">
      
            <p>From :<?php echo $messages['sender'] ?></p>
            <p>To :<?php echo $phone2?></p>
            <p>Subject :<?php echo $messages['subject']?></p>
            <p>Message :<?php echo $messages['message'] ?></p>
            <hr>
    
        
        </div>
      </div>
      <?php
    }
    ?>

 
 
</div>
  
  
 

    

  
     

                   


                
      
                   

                    
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
       
                </div>
              </div>
         
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
             
                <div>
                  <div class="mb-2 mb-md-0">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    .All Rights Reserved
                    
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


 <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
 <!-- <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script> -->
 <!-- <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script> -->


    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <!-- <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script> -->
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <!-- <script src="assets/vendor/js/bootstrap.js"></script> -->
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Datatable settings -->

<script>

function showNotifications() {
        alert("to be coded later"); // Placeholder action for the notification
    }

 </script>
  </body>
</html>
