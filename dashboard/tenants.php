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

    <title>Tenants</title>

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

          <?php require 'user-profile.php'?>
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
                    <div class="row row-bordered g-0">
                   
                        <h5 class="card-header m-0 me-2 pb-3">Tenants Form</h5>
                        <hr>
                      <div class="col-md-12 formBackground" >
                        <div class="card-body">
                 

                   
  <!-- Accordion Buttons (Horizontal) -->

    <style>
        /* body {
            font-family: Arial, sans-serif;
        } */
        /* .tab-container {
            width: 80%;
            margin: auto;
        }
        .nav-tabs {
            display: flex;
            border-bottom: 2px solid #ddd;
        }
        .nav-tabs a {
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            border: 1px solid transparent;
            border-bottom: 2px solid transparent;
            cursor: pointer;
        }
        .nav-tabs a.active {
            border-bottom: 2px solid #007bff;
            color: #007bff;
        }
        .nav-tabs a:hover {
            color: #0056b3;
        }
        .tab-content {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: none; /* Hide all content by default */
        /* }
        .tab-content.active {
            display: block; 
        } */ */
    </style>


<div class="tab-container " >
    <div class="nav-tabs">
        <a href="#" class="active" onclick="showTab('tab1',this)">Tenant</a>
        <a href="#" onclick="showTab('tab2',this)">Tenants List</a>
        <!-- <a href="#" onclick="showTab('tab3',this)">Upload (Tenants)</a>
        <a href="#" onclick="showTab('tab4',this)">Upload (Sample)</a> -->
    </div>

 

    <div id="tab1" class="tab-content active">
      <!-- Tenants Form -->
          <div class="container mt-5">
         
         <form name="" method="POST" action="addScripts.php"  enctype="multipart/form-data">
         <div class="mb-3">
       <label for="exampleInputEmail1" class="form-label" >Entry Date</label>
       <input type="date" class="form-control" name="startDate" id="Inputdate" aria-describedby="emailHelp" placeholder="Phone number" required>
       
     </div>
         <div class="first-row-form">
         <div class="mb-3 mobile">
       <label for="exampleInputEmail1" class="form-label" >Mobile number</label>
       <input type="text" id="phoneTenant"  name="phone" class="form-control" maxlength="10" placeholder="0761000005" required>
       
       
     </div>
     <div class="mb-3 mobile">
       <label for="exampleInputEmail1" class="form-label" >Email</label>
       <input type="email" id="Inputemail"  name="email" class="form-control" placeholder="Email" required>
       
       
     </div>
   
     <div class="mb-3">
       <label for="exampleInputEmail1" class="form-label" >House number</label>
      
       <select class="form-select" name="houseNumber" id="InputNumber" aria-label="Default select example" >
             <option selected disabled>Select house number</option>
              <?php
              require "dbconnection.php";
   $selectHousenumber=mysqli_query($conn,"select houseNumber from houses");
   foreach($selectHousenumber as $number)
   {
     $houseno=$number['houseNumber'];
   
              ?>
                  
                       <option value="<?php echo $houseno ?>"><?php echo $houseno ?></option>
                      
                 
                   <?php
   
   }
   
   ?>
   </select>
     </div>
   </div>
     <div class="first-row-form">
     <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">First name</label>
       <input type="text" class="form-control" name="fname" id="InputFirstname" placeholder="First name">
     </div>
   
     <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">Middle name</label>
       <input type="text" class="form-control" name="mname" id="InputMiddlename" placeholder="Middle name">
     </div>
     <div class="mb-3">
       <label for="exampleInputPassword1" class="form-label">Last name</label>
       <input type="text" class="form-control" name="lname" id="InputLastname" placeholder="Last name">
     </div>
   </div>
   
   <div class="second-row-form">
     <div class="mb-3">
     <label for="genderSelect" class="form-label">Gender</label>
     <select class="form-select"  id="gender" aria-label="Select Gender" name="gend">
       <option selected disabled>Select Gender</option>
       <option value="Male">Male</option>
       <option value="Female">Female</option>

     </select>
     </div>
   
     <div class="mb-3 mobile">
       <label for="exampleInputEmail1" class="form-label" >Next of Kin phone</label>
       <input type="text" id="kinPhone"  name="kinPhone" class="form-control" maxlength="10" placeholder="0761000005" required>
       
       
     </div>
     <div class="mb-3">
       <label for="exampleInputPassword1"  id="Inputaddress"  class="form-label">Physical address</label>
       <input type="text" class="form-control" id="Inputaddress" name="address" placeholder="Physical address">
     </div>
   </div>
   <div class="third-row-form">
    
   <div class="mb-3">
       <label for="exampleInputPassword1"  id="Inputaddress"  class="form-label">End date</label>
       <input type="date" class="form-control" id="Inputcontract" name="endDate" placeholder="Contract">
     </div>
     <div class="mb-3">
       <label for="exampleInputPassword1"  id="Inputaddress"  class="form-label">Amount</label>
       <input type="number" class="form-control" id="Inputcontract" name="amount" placeholder="Amount">
     </div>
     <div class="mb-3">
       <label for="exampleInputPassword1"  id="Inputaddress"  class="form-label">Contract</label>
       <input type="file" class="form-control" id="Inputcontract" name="contract" placeholder="Contract" required>
     </div>
   </div>
    
     <button type="submit" name="submitTenant" class="btn btn-primary addBtn">Submit</button>
   </form>
            
   
                
       </div>
    </div>
    <div id="tab2" class="tab-content">
      <!-- Tenants list table -->
    <div>
                        <table id="myTable" class="table table-striped"  >
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
                        $selectTenants=mysqli_query($conn,"select * from tenants");
                        foreach($selectTenants as $tenants)
                        {

                        ?>
                              <tr>
                             

                                  <td><?php echo $tenants['mobileNumber']?></td>
                                  <td><?php echo $tenants['firstname'] .' '.$tenants['middlename'].' '.$tenants['lastname']?></td>
                                  
                                  <td><?php echo $tenants['gender']?></td>
                                  <td><?php echo $tenants['kinPhone']?></td>
                                  <td><a class="new-page" href="house-number.php?number=<?php echo $tenants['houseNumber']?>"><?php echo $tenants['houseNumber']?></a></td>
                                  <td><?php echo $tenants['address']?></td>
                                  <td><?php echo $tenants['startDate']?></td>
                                  <td><?php echo $tenants['endDate']?></td>
                                  <td><?php echo htmlspecialchars(rentalTenantAmount($tenants), ENT_QUOTES, 'UTF-8'); ?></td>
                                  <td><a href='<?php echo $tenants['contract']?>' download>Download</a></td>
                                 
                                  
                                
                                 
                              </tr>
                              <?php 
                        }
                        ?>
                           
                          </tbody>
                        
                      </table>
                      </div>
    </div>
    <div id="tab3" class="tab-content">
      <!-- Upload Form -->
    <div class="col-md-6">
        <div class="mb-3">
          <form name="" method="POST" action="importTenants.php" enctype="multipart/form-data">
           <label for="fileUpload" class="form-label">Upload File</label>
          <input class="form-control" type="file" name="importFile" id="fileUpload">
        </div>
        <button type="submit" name="importTenants" class="btn addBtn">Upload</button>
                      </form>
      </div>
    </div>
    <div id="tab4" class="tab-content">
      <!-- Download link -->
    <a href="downloads/tenants.csv"  download="tenants.csv">Tenants</a> <br>
     
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
