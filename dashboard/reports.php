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

    <title>Reports</title>

    <meta name="description" content="" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables CSS and JS -->
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    
      <!-- Datatable -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- END DATA TABLE  -->

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
           
                
                <!-- Total Revenue -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                   
                        <h5 class="card-header m-0 me-2 pb-3">Generate Reports</h5>
                        <hr>
                      <div class="col-md-12 " >
                        <div class="card-body">
                        <div class="tab-container " >
    <div class="nav-tabs">
        <a href="#" class="active" onclick="showTab('tab1',this)">Tenants</a>
        <a href="#" onclick="showTab('tab2',this)">Houses</a>
        <a href="#" onclick="showTab('tab3',this)">Payments</a>

    </div>
    <div id="tab1" class="tab-content active">
      <!-- Tenants Form -->
          <div class="container mt-5">
         
         

<!-- Date Range Filters -->
<label for="min">From:</label>
<input type="text" id="min" name="min" placeholder="YYYY-MM-DD">

<label for="max">To:</label>
<input type="text" id="max" name="max" placeholder="YYYY-MM-DD">

<!-- DataTable -->
<table id="tenantsTable" class="display">
<thead>
                              <tr>
                                  <th>Mobile number</th>
                                  
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
                        require 'dbconnection.php';
                        $selectTenants=mysqli_query($conn,"select * from tenants");
                        foreach($selectTenants as $tenants)
                        {

                        ?>
                              <tr>
                             

                                  <td><?php echo $tenants['mobileNumber']?></td>
                                  <td><?php echo $tenants['firstname'] .' '.$tenants['middlename'].' '.$tenants['lastname']?></td>
                                  
                                  <td><?php echo $tenants['gender']?></td>
                                  <td><?php echo $tenants['kinPhone']?></td>
                                  <td><a href="house-number.php?number=<?php echo $tenants['houseNumber']?>"><?php echo $tenants['houseNumber']?></a></td>
                                  <td><?php echo $tenants['address']?></td>
                                  <td><?php echo $tenants['startDate']?></td>
                                  <td><?php echo $tenants['endDate']?></td>
                                  <td><?php echo $tenants['amount']?></td>
                                  <td><a href='<?php echo $tenants['contract']?>' download>Download</a></td>
                                 
                                  
                                
                                 
                              </tr>
                              <?php 
                        }
                        ?>
                           
                          </tbody>
</table>

<script>
    $(document).ready(function() {
        // Initialize the datepickers
        $("#min, #max").datepicker({
            dateFormat: "yy-mm-dd"
        });

        // DataTable initialization with "Show Entries" feature
        var table = $('#tenantsTable').DataTable({
            dom: 'lBfrtip', // "l" enables the "Show Entries" dropdown
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ], // Options for "Show Entries"
            buttons: [
                'print', 
                {
                    extend: 'pdfHtml5',
                    title: 'Data export'
                }
            ]
        });

        // Custom filtering function for date range
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#min').val();
                var max = $('#max').val();
                var startDate = data[4]; // use the 5th column for date (index 4)

                if (
                    (min === "" && max === "") ||
                    (min === "" && startDate <= max) ||
                    (min <= startDate && max === "") ||
                    (min <= startDate && startDate <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        // Event listener to the two range filtering inputs
        $('#min, #max').keyup(function() {
            table.draw();
        });

        $('#min, #max').change(function() {
            table.draw();
        });
    });
</script>
</div>
</div>


<!-- TAB 2 CONTENTS -->
<div id="tab2" class="tab-content ">
      <!-- House table -->
          <div class="container mt-5">
         
             <div class="container mt-5">
         
         

<!-- Date Range Filters -->
<label for="min">From:</label>
<input type="text" id="min" name="min" placeholder="YYYY-MM-DD">

<label for="max">To:</label>
<input type="text" id="max" name="max" placeholder="YYYY-MM-DD">

<!-- DataTable -->
<table id="housesTable" class="display">
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
                        
                        require 'dbconnection.php';
                        $selectHouses=mysqli_query($conn,"select * from houses");
                        foreach($selectHouses as $houses)
                        {
                                                 
                echo "<tr class='dataRow' data-number='" . $houses['houseNumber'] .
                "' data-region='" . $houses['region'] . 
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

<script>
    $(document).ready(function() {
        // Initialize the datepickers
        $("#min, #max").datepicker({
            dateFormat: "yy-mm-dd"
        });

        // DataTable initialization with "Show Entries" feature
        var table = $('#housesTable').DataTable({
            dom: 'lBfrtip', // "l" enables the "Show Entries" dropdown
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ], // Options for "Show Entries"
            buttons: [
                'print', 
                {
                    extend: 'pdfHtml5',
                    title: 'Data export'
                }
            ]
        });

        // Custom filtering function for date range
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#min').val();
                var max = $('#max').val();
                var startDate = data[4]; // use the 5th column for date (index 4)

                if (
                    (min === "" && max === "") ||
                    (min === "" && startDate <= max) ||
                    (min <= startDate && max === "") ||
                    (min <= startDate && startDate <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        // Event listener to the two range filtering inputs
        $('#min, #max').keyup(function() {
            table.draw();
        });

        $('#min, #max').change(function() {
            table.draw();
        });
    });
</script>

</div>
</div>
</div>

<!-- TAB 2 CONTENTS -->
<div id="tab3" class="tab-content ">
      <!-- Tenants Form -->
      <div class="container mt-5">
         
         <div class="container mt-5">
     
      
<!-- Date Range Filters -->
<label for="min">From:</label>
<input type="text" id="min" name="min" placeholder="YYYY-MM-DD">

<label for="max">To:</label>
<input type="text" id="max" name="max" placeholder="YYYY-MM-DD">

<!-- DataTable -->
<table id="paymentsTable" class="display">
<thead>
                              <tr>
                                  <th>Payment Number</th>
                                  <th>Amount</th>
                            
                                  
                              </tr>
                          </thead>
                          <tbody>
                         
                           
                                                         
<?php
require 'dbconnection.php';
$selectPayment=mysqli_query($conn,"select paymentNumber,amount from rentalPayments");
foreach($selectPayment as $payment)
{


?>
     
                              <tr>
                              <td><a href="payment-number.php?paymentnumber=<?php echo $payment['paymentNumber']?>"><?php echo $payment['paymentNumber']?></a></td>
                                  <td><?php echo $payment['amount']?></td>
                                  
                                
                                 
                              </tr>
                       <?php
}?>      
                            
                          </tbody>
                        
                     
                 
</table>

<script>
$(document).ready(function() {
    // Initialize the datepickers
    $("#min, #max").datepicker({
        dateFormat: "yy-mm-dd"
    });

    // DataTable initialization with "Show Entries" feature
    var table = $('#paymentsTable').DataTable({
        dom: 'lBfrtip', // "l" enables the "Show Entries" dropdown
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ], // Options for "Show Entries"
        buttons: [
            'print', 
            {
                extend: 'pdfHtml5',
                title: 'Data export'
            }
        ]
    });

    // Custom filtering function for date range
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = $('#min').val();
            var max = $('#max').val();
            var startDate = data[4]; // use the 5th column for date (index 4)

            if (
                (min === "" && max === "") ||
                (min === "" && startDate <= max) ||
                (min <= startDate && max === "") ||
                (min <= startDate && startDate <= max)
            ) {
                return true;
            }
            return false;
        }
    );

    // Event listener to the two range filtering inputs
    $('#min, #max').keyup(function() {
        table.draw();
    });

    $('#min, #max').change(function() {
        table.draw();
    });
});
</script>
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


    


    
 
    <!-- <script src="assets/vendor/libs/jquery/jquery.js"></script> -->
    <!-- <script src="assets/vendor/libs/popper/popper.js"></script> -->
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <<script src="assets/vendor/js/menu.js"></script> 
   
  


    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>


    <script src="assets/js/main.js"></script>


    <script src="assets/js/dashboards-analytics.js"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>



 <!-- Table buttons SCRIPTS  -->


<!-- Agro officers table data -->

   



<!-- Houses TABLE BUTTONS -->


<!-- Payments table BUTTONS -->



<!-- Houses TABLE BUTTONS -->
    <!-- NAV TABS -->
    <script>
    function showTab(tabId, element) {
        // Hide all tab content
        const contents = document.querySelectorAll('.tab-content');
        contents.forEach(content => content.classList.remove('active'));
        
        // Remove active class from all tabs
        const tabs = document.querySelectorAll('.nav-tabs a');
        tabs.forEach(tab => {
            tab.classList.remove('active');
        });

        // Show the clicked tab content and add active class to the clicked tab
        document.getElementById(tabId).classList.add('active');
        element.classList.add('active'); // Set the clicked tab as active
    }

    // Optional: Keep the last active tab in local storage
    window.onload = function() {
        const activeTabId = localStorage.getItem('activeTabId');
        if (activeTabId) {
            showTab(activeTabId, document.querySelector(`.nav-tabs a[onclick*="${activeTabId}"]`));
        }
    };
    

    // Save the active tab in local storage
    function saveActiveTab(tabId) {
        localStorage.setItem('activeTabId', tabId);
    }
</script>

<script src='alert.js'></script>

</body>
  </body>
</html>
