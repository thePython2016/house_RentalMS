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

    <title>Houses</title>

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
                  
                    <a class="btn addBtn" href="houses.php" style="float:right">
  <i class="fas fa-plus"></i> House
</a>
           
                         
                     
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                   
                        <h5 class="card-header m-0 me-2 pb-3">Houses Form</h5>
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
        <a href="#" class="active" onclick="showTab('tab1',this)">Houses</a>
        <a href="#" onclick="showTab('tab2',this)">Houses List</a>
        <a href="#" onclick="showTab('tab3',this)">Upload (Houses)</a>
        <a href="#" onclick="showTab('tab4',this)">Upload (Sample)</a>
    </div>

 

    <div id="tab1" class="tab-content active">
      <!-- Tenants Form -->
      <div class="container mt-5">
  <form name="" method="POST" action="addScripts.php" enctype="multipart/form-data">
    <div class="row">
      <!-- House number -->
      <div class="col-md-4">
        <div class="mb-3">
          <label for="housenumber" class="form-label">House number</label>
          <input type="text" class="form-control" name="houseNumber" id="housenumber" required placeholder="Enter House number">
        </div>
       </div>  
    </div>

    <div class="row">
      <!-- Password -->
      <div class="col-md-4">
        <div class="mb-3">
          <label for="password" class="form-label">Region</label>
          <?php
          require 'dbConnection.php';
          $defaultRegions = ['Mwanza', 'Arusha', 'Dar es Salaam', 'Dodoma', 'Kilimanjaro', 'Mbeya', 'Tabora', 'Geita', 'Kagera'];
          $selectRegions = false;
          try {
            $selectRegions = mysqli_query($conn, "SELECT name FROM regions ORDER BY name");
          } catch (mysqli_sql_exception $e) {
            $selectRegions = false;
          }
          ?>
          <select id="region" class="form-select" onchange="updateDistricts()" name="region" required>
                <option selected disabled>Select a Region</option>
                <?php
                if ($selectRegions && mysqli_num_rows($selectRegions) > 0) {
                  foreach ($selectRegions as $regions) {
                    $name = htmlspecialchars($regions['name'], ENT_QUOTES, 'UTF-8');
                    echo "<option value=\"$name\">$name</option>";
                  }
                } else {
                  foreach ($defaultRegions as $name) {
                    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                    echo "<option value=\"$name\">$name</option>";
                  }
                }
                ?>
                <!-- Add other regions as needed -->
            </select>
          
        </div>
      </div>
      <div class="col-md-4">
        <div class="mb-3">
          <label for="district" class="form-label">District</label>
          <select id="district" class="form-select" name="district" required>
                <option selected disabled>Select a District</option>
            </select>
        </div>
      </div>
      
      <!-- Address -->
      <div class="col-md-4">
        <div class="mb-3">
          <label for="attachment" class="form-label">Physical address</label>
          <input type="text" class="form-control"  name="address" id="attachment" required placeholder="House address">
        </div>
      </div>
    </div>
    <div class="col-md-4" style="display:flex;flex-direction:!important;">
    <div class="mb-3">
          <label for="attachment" class="form-label">Annual Rental fee</label>
          <input type="number" style="margin-right:10px" class="form-control" required name="rentalFee" id="attachment" placeholder="Rental fee">
        </div>
        <div class="mb-3">
          <label for="attachment" class="form-label">Attachment</label>
          <input type="file" class="form-control" name="attachment" id="attachment" required placeholder="Attach Property documents">
        </div>
      </div>
    <!-- Submit Button -->
    <button type="submit" name="addHouses" class="btn addBtn">Submit</button>
  </form>
  
</div>
   
    </div>
    <div id="tab2" class="tab-content">
      <!-- Tenants list table -->
   
    <div class="container">
                        <table id="myTable" class="table table-striped"  >
                          <thead>
                              <tr>
                                  <th>House number</th>
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
                        foreach($selectHouses as $house)
                        {
                        ?>
                              <tr>
                                  <td><?php echo $house['houseNumber']?></td>
                                  <td><?php echo $house['region']?></td>
                                  <td><?php echo $house['district']?></td>
                                  <td><?php echo $house['physicalAddress']?></td>
                                  <td><?php echo $house['rentalFee']?></td>
                                  <td><a href='<?php echo $house['attachment']?>' download>Download</a></td>
                            
                                
                                 
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
          <form name="" method="POST" action="importHouses.php" enctype="multipart/form-data">
          <label for="fileUpload" class="form-label">Upload File</label>
          <input class="form-control" name="import" type="file" id="fileUpload">
        </div>
        <button type="submit" name="uploadHouses" class="btn addBtn">Upload</button>
                      </form>
      </div>
    </div>
    <div id="tab4" class="tab-content">
      <!-- Download link -->
      <a href="downloads/houses.csv"  class="payment-sample" download="houses.csv">Houses Sample file</a> <br>
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

<script>
        $(document).ready(function() {
            $('#mobile-number').on('input', function() {
                var input = $(this).val().replace(/-/g, ''); // Remove existing dashes
                var formatted = '';

                // Format the string to follow the pattern: XXX-XXX-XXXX
                for (var i = 0; i < input.length; i++) {
                    if (i === 3 || i === 6) {
                        formatted += '-'; // Add dash after 3rd and 6th characters
                    }
                    formatted += input[i];
                }

                // Limit the formatted string to 12 characters (XXX-XXX-XXXX)
                $(this).val(formatted.slice(0, 12));
            });
        });

        // selected record behaviour SCRIPTS
        
    </script>


<script>
        $(document).ready(function() {
            $('#phoneTenant').on('input', function() {
                var input = $(this).val().replace(/-/g, ''); // Remove existing dashes
                var formatted = '';

                // Format the string to follow the pattern: XXX-XXX-XXXX
                for (var i = 0; i < input.length; i++) {
                    if (i === 3 || i === 6) {
                        formatted += '-'; // Add dash after 3rd and 6th characters
                    }
                    formatted += input[i];
                }

                // Limit the formatted string to 12 characters (XXX-XXX-XXXX)
                $(this).val(formatted.slice(0, 12));
            });
        });

        // selected record behaviour SCRIPTS
        
    </script>


<script>
        $(document).ready(function() {
            $('#kinPhone').on('input', function() {
                var input = $(this).val().replace(/-/g, ''); // Remove existing dashes
                var formatted = '';

                // Format the string to follow the pattern: XXX-XXX-XXXX
                for (var i = 0; i < input.length; i++) {
                    if (i === 3 || i === 6) {
                        formatted += '-'; // Add dash after 3rd and 6th characters
                    }
                    formatted += input[i];
                }

                // Limit the formatted string to 12 characters (XXX-XXX-XXXX)
                $(this).val(formatted.slice(0, 12));
            });
        });

        // selected record behaviour SCRIPTS
        
    </script>

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


<!-- REGIONS AND DISTRICTS ON SELECT -->
<script>
    // Object mapping regions to their respective districts
    const regionDistricts = {
        'Mwanza': ['Nyamagana', 'Ilemela ',  'Misungwi'],
        'Arusha': ['Arusha City', 'Arumeru', 'Karatu', 'Longido'],
        'Dar es Salaam': ['Ilala', 'Kinondoni', 'Temeke', 'Kigamboni'],
        'Dodoma': ['Dodoma City', 'Bahi', 'Chamwino', 'Kondoa'],
        'Kilimanjaro': ['Moshi Urban', 'Hai', 'Rombo', 'Same'],
        'Mbeya': ['Mbeya City', 'Rungwe', 'Kyela', 'Mbarali'],
            'Tabora': ['Tabora Urban', 'Nzega', 'Igunga', 'Uyui','Sikonge','Urambo','Kaliua'],
            'Geita': ['Geita District', 'Bukombe', 'Chato', 'Mbogwe','Nyanghwale'],
            'Kagera': ['Bukoba Urban', 'Bukoba Rular', 'Muleba', 'Ngara','Biharamulo','Missenyi','Kyerwa'],

        // Add more regions and districts here
    };

    // Function to update districts based on selected region
    function updateDistricts() {
        const region = document.getElementById('region').value;
        const districtSelect = document.getElementById('district');
        
        // Clear existing options
        districtSelect.innerHTML = '<option selected disabled>Select a District</option>';
        
        // Get the districts for the selected region
        const districts = regionDistricts[region] || [];
        
        // Add the districts as options
        districts.forEach(district => {
            const option = document.createElement('option');
            option.value = district;
            option.textContent = district;
            districtSelect.appendChild(option);
        });
    }
</script>
<script>

function showNotifications() {
        alert("to be coded later"); // Placeholder action for the notification
    }

 </script>
</body>
  </body>
</html>
