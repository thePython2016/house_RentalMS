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

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

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
          </nav>

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
  <i class="fas fa-plus"></i> House
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
                  <div class="card " >
                    <div class="row row-bordered g-0">
                   
                        <h5 class="card-header m-0 me-2 pb-3">Houses List</h5>
                        <hr>
                      <div class="col-md-12 bgColorbody " >
                        <div class="card-body">
                        <div class="container">
                        <table id="myTable"  style="background:white !important"class="table table-striped"  >
                          <thead>
                              <tr>
                                  <th>House umber</th>
                                  <th>Region</th>
                                  <th>District</th>
                                  <th>Physical address</th>
                                  <th>Annual Rental Fee</th>
                                  <th>Attachments</th>
                                 
                                  
                              </tr>
                          </thead>
                          <tbody>
                         
                           
                        <?php 
                        $housenumber=$_GET['number'];
                        require 'dbconnection.php';
                        $selectHouses=mysqli_query($conn,"select * from houses where houseNumber='$housenumber'");
                        foreach($selectHouses as $houses)
                        {
                                                 
                echo "<tr class='dataRow' data-number='" . $houses['houseNumber'] .
                "' data-region='" . $houses['region'] . "' data-region='" . $houses['region'].
              "' data-district='" . $houses['district'] . "' data-address='" . $houses['physicalAddress'] 
              . "' data-attachment='" . $houses['attachment'] . "'>";
                        ?>
                         
                                  <td><?php echo $houses['houseNumber']?></td>
                                  <td><?php echo $houses['region']?></td>
                                  <td><?php echo $houses['district']?></td>
                                  <td><?php echo $houses['physicalAddress']?></td>
                                  <td><?php echo $houses['rentalFee']?></td>
                                  <td><a href="<?php echo $houses['attachment']?>" download>Download</a></td>
                            
                                
                                 
                              </tr>
                            <?php
                        }
                        ?>
                            
                            
                          </tbody>
                        
                      </table>
<!-- UPDATE FORM -->
                      <div class="row">
          <div class="col-7">
          
<form id="updateForm" method="POST" action="updates.php" style="display:none;">
<h3 style="margin-top:30px">Update Record</h3>

        <div class="row">
          <div class="col-8">
            <div class="block1">
          <div class="mb-3">
          <input type="hidden" id="updateid" name="houseNumber">
          

  </div>
                      </div>
                      <div class="block2">
          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Region</label>
    <input type="text" class="form-control" name="region" id="region">
  </div>

          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">District</label>
    <input type="text" class="form-control" name="district" id="district">
  </div>
                      </div>
                      <div class="block3">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Physical address</label>
    <input type="text" class="form-control" name="address" id="address" >
  </div>


          <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Annual Rental Fee</label>
    <input type="number" class="form-control" name="rentalFee" id="attachment" >
  </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Attachment</label>
    <input type="text" class="form-control" name="attachment" id="attachment" >
  </div>
</div>

 
</div>

        <button type="submit" id="updateButton" style="margin-bottom:20px;margin-left:100px" name="updateHouses" class="btn btn-primary addBtn">Update</button>

</form>
</div>
                     
   
    

        
<?php
           
           ?>
          <div class="col-5">
          <div   style="margin-top:20px !important;margin-bottom:20px !important">
      
  
 
       
      <button id="delete-button" type="submit" name="updateFarmer" class="btn btn-primary addBtn">Delete</button>
     
</div>
</div>
</div>

          
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
            <style>
 
 /* Hide paging buttons */
 
  .pagination .dt-paging-button
   {
      display: none !important;
      background:red !important
  }
  </style> 
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

<!-- DELETE/UPDATE SCRIPTS -->

<!-- Delete scripts -->
<script>
        $(document).ready(function() {
            let selectedId = null; // Variable to hold the selected record ID

            // Row click event
            $("tr").click(function() {
                $("tr").removeClass("selected"); // Deselect previously selected row
                $(this).addClass("selected"); // Highlight the selected row
                selectedId = $(this).data("number"); // Get the ID of the clicked row
            });

            // Delete button click event
            $("#delete-button").click(function() {
                if (selectedId === null) {
                    alert("Please select a record to delete.");
                    return;
                }
                if (confirm("Are you sure you want to delete this record?")) {
                    window.location.href = 'deletehouse.php?number=' + selectedId; // Redirect to delete.php
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
        selectedId = $(this).data("number"); // Get the data-id attribute
        
        // Populate the update form
        $("#updateid").val(selectedId);
        $("#houseNumber").val($(this).data("number"));
        $("#region").val($(this).data("region"));
        $("#district").val($(this).data("district"));
        $("#address").val($(this).data("address"));
        $("#attachment").val($(this).data("attachment"));
    
        

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

<!-- UPDATE DELETE SCRIPTS -->
     <!-- UPDATE SCRIPTS -->
     <script src='alert.js'></script>
</body>
  </body>
</html>
