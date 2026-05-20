
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

    <title>Payment</title>

    <meta name="description" content="" />
      <!-- Datatable begin-->
      <link href="https://cdn.datatables.net/v/dt/dt-2.1.6/datatables.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css" rel="stylesheet">
    
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
                  
                    <button type="button" class="btn addBtn" style="float:right">
  <i class="fas fa-plus"></i> Tenant
</button>
                    
<button class="btn  addBtn" onclick="goBack()" style="margin-right:800px !important">
            <i class="fas fa-arrow-left"></i> Back
        </button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
                         
                     
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                   
                        <h5 class="card-header m-0 me-2 pb-3">Tenant</h5>
                        <hr>
                      <div class="col-md-12 formBackground"  >
                        <div class="card-body">
                        <div class="container">
                        <table id="myTable" class="table table-striped"  >
                          <thead>
                              <tr>
                                  <!-- <th>Mobile number</th> -->
                                  <th>Full name</th>
                               
                                  <th>Gender</th>
                                  <th>Next of Kin phone</th>
                                  <th>House number</th>
                                  <th>Address</th>
                                  <th>Start date</th>
                                  <th>End date</th>
                                  <th>Amount</th>
                                  <th>Contract</th>
                                 
                                  
                              </tr>
                          </thead>
                          <tbody>
                         
                           
                        <?php
                        require "dbconnection.php";
                        $paymentnumber=$_GET['paymentnumber'];
                        $selectTenants=mysqli_query($conn,"select * from tenants INNER JOIN rentalPayments
                        ON tenants.mobileNumber=rentalPayments.mobileNumber AND paymentNumber='$paymentnumber'");
                        foreach($selectTenants as $tenants)
                        {



                          echo "<tr class='dataRow' data-phone='" . $tenants['mobileNumber'] .
                          "' data-firstname='" . $tenants['firstname'] . 
                        "' data-middlename='" . $tenants['middlename'] . "' data-address='" . $tenants['address'] 
                        . "' data-gender='" . $tenants['gender'] ."'data-lastname='" . $tenants['lastname'] ."' data-kinphone='" 
                        . $tenants['kinPhone'] ."' data-housenumber='" . $tenants['houseNumber']."'
                        data-startdate='" . $tenants['startDate']."' data-enddate='" . $tenants['endDate']."'
                         data-amount='" . rentalTenantAmount($tenants) . "'data-contract='" . $tenants['contract']."' >";
                                  ?>


                    
                        
                              
                             

                       
                                  <td><?php echo $tenants['firstname'] .' '.$tenants['middlename'].' '.$tenants['lastname']?></td>
                                  
                                  <td><?php echo $tenants['gender']?></td>
                                  <td><?php echo $tenants['kinPhone']?></td>
                                  <td><a href="house-number.php?number=<?php echo $tenants['houseNumber']?>"><?php echo $tenants['houseNumber']?></a></td>
                                  <td><?php echo $tenants['address']?></td>
                                  <td><?php echo $tenants['startDate']?></td>
                                  <td><?php echo $tenants['endDate']?></td>
                                  <td><?php echo htmlspecialchars(rentalTenantAmount($tenants), ENT_QUOTES, 'UTF-8'); ?></td>
                                  <td><a href="<?php echo $tenants['contract']?>" download>Download</a></td>
                                 
                                  
                                
                                 
                              </tr>
                              <?php 
                        }
                        ?>
                           
                          </tbody>
                        
                      </table>
                    
                      
<!-- PDATE FORM -->
<div class="row">
          <div class="col-7">
          
<form id="updateForm" method="POST" action="updates.php" style="display:none;" enctype="multipart/form-data">
<h3 style="margin-top:30px">Update Record</h3>

        <div class="row">
          <div class="col-8">
            <div class="block1">
          <div class="mb-3">
          <input type="text" id="updateid" name="mobileNumber">
          

  </div>
                      </div>
                      
                      <div class="block2">
          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">First name</label>
    <input type="text" class="form-control" name="fname" id="firstname">
  </div>

          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Middle name</label>
    <input type="text" class="form-control" name="mname" id="middlename">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Last name</label>
    <input type="text" class="form-control" name="lname" id="lastname" >
  </div>
                      </div>
                      <div class="block3">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Gender</label>
    <input type="text" class="form-control" name="gender" id="gender" >
  </div>


          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Next of Kin phone</label>
    <input type="text" class="form-control" name="kinphone" id="kinphone" >
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">House number</label>
    <input type="text" class="form-control" name="housenumber" id="housenumber" >
  </div>
  
  </div>
  <div class="block3">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" id="physicaladdress" >
  </div>


          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Start date</label>
    <input type="date" class="form-control" name="startdate" id="startdate" >
  </div>
      <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">End date</label>
    <input type="date" class="form-control" name="enddate" id="enddate" >
  </div>

  
  </div>
  <div class="block3">
 
 


          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Amount</label>
    <input type="number" class="form-control" name="amount" id="amount" >
  </div>
      <!-- <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contract</label>
    <input type="file" class="form-control" name="contract" id="contract" >
  </div> -->

  
  </div>
</div>

 
</div>

        <button type="submit" id="updateButton" style="margin-bottom:20px;margin-left:100px" name="updateTenant" class="btn btn-primary addBtn">Update</button>

</form>
</div>
                     
   
    

        
<?php
           
           ?>
          <div class="col-5">
          <div   style="margin-top:20px !important;margin-bottom:20px !important">
      
  
 
       
      <button id="delete-button" type="submit" name="deleteTenant" class="btn btn-primary addBtn">Delete</button>
     
</div>
</div>
</div>
                      <style>

                         /* Hide paging buttons */
 
  .pagination .dt-paging-button
   {
      display: none !important;
      background:red !important
  }
                      </style>
                      </div>

                   


                       
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

 <!-- Datatables bottom -->
 <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
 <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
 <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script>
 <!-- Datatable end -->
    <script>
      $('#myTable').dataTable( {
        info:false,
      // paging:false,
      pagingType:"simple",
      "language": {
        "decimal":        "",
        "emptyTable":     "No data available in table",
        "info":         "",
        // "infoEmpty":      "Showing 0 to 0 of 0 entries",
        "infoFiltered":   "",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Show _MENU_ entries",
        // "loadingRecords": "Loading...",
        "processing":     "",
        "search":         "Search:",
        
        "zeroRecords":    "No matching records found",
        
      
           "bProcessing": true,
        "sAutoWidth": false,
        "bDestroy":true,
        "sPaginationType": "bootstrap", // full_numbers
        "iDisplayStart ": 10,
        "iDisplayLength": 10,
        "bPaginate": false, //hide pagination
        "bFilter": false, //hide Search bar
        "bInfo": false, // hide showing entries
        "paginate": {
            // "first":      "First",
            // "last":       "Last",
            "next":       "<button style='border:1px solid grey !important;color:grey;column-gap:0px'>Next</button>",
            "previous":   "<button style='border:1px solid grey !important;color:grey;column-gap:0px'>Previous</button>",
            
        }
      }
      } );
      </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <!-- <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script> -->
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.bootstrap5.js"></script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
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

<!-- DELETE/UPDATE SCRIPTS -->

<!-- Delete scripts -->
<script>
        $(document).ready(function() {
            let selectedId = null; // Variable to hold the selected record ID

            // Row click event
            $("tr").click(function() {
                $("tr").removeClass("selected"); // Deselect previously selected row
                $(this).addClass("selected"); // Highlight the selected row
                selectedId = $(this).data("phone"); // Get the ID of the clicked row
            });

            // Delete button click event
            $("#delete-button").click(function() {
                if (selectedId === null) {
                    alert("Please select a record to delete.");
                    return;
                }
                if (confirm("Are you sure you want to delete this record?")) {
                    window.location.href = 'deletetenant.php?phone=' + selectedId; // Redirect to delete.php
                }
            });
        });
    </script>



<!-- UPDATE RECORDS -->
    <script>
$(document).ready(function() {
    let selectedId = null; // Variable to hold the selected record ID

    // Row click event
    $("tbody tr").click(function() {
        // Remove highlight from previously selected row
        $("tbody tr").removeClass("selected");
        
        // Highlight the clicked row and get its ID
        $(this).addClass("selected");
        selectedId = $(this).data("phone"); // Get the data-id attribute
        
        // Populate the update form
        $("#updateid").val(selectedId);
        $("#phone").val($(this).data("phone"));
        $("#firstname").val($(this).data("firstname"));
        $("#middlename").val($(this).data("middlename"));
        $("#lastname").val($(this).data("lastname"));
        $("#gender").val($(this).data("gender"));
        $("#kinphone").val($(this).data("kinphone"));
        $("#housenumber").val($(this).data("housenumber"));
        $("#physicaladdress").val($(this).data("address"));
        $("#startdate").val($(this).data("startdate"));
        $("#enddate").val($(this).data("enddate"));
        $("#amount").val($(this).data("amount"));
        $("#contract").val($(this).data("contract"));
    
        

        $("#updateForm").show(); // Show the update form
    });

 

    // Update form submission
    // $("#updateForm").submit(function(event) {
    //     event.preventDefault(); // Prevent the default form submission
    //     const formData = $(this).serialize(); // Serialize form data
        
    //     $.ajax({
    //         type: "POST",
    //         url: "updateScripts.php",
    //         data: formData,
    //         success: function(response) {
    //             alert(response);
    //             location.reload(); // Reload the page to see changes
    //         },
    //         error: function() {
    //             alert("Error updating record.");
    //         }
    //     });
    // });
});
</script>
<script>

function showNotifications() {
        alert("to be coded later"); // Placeholder action for the notification
    }

 </script>
</body>

</html>
