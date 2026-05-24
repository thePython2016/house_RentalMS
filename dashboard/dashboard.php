<?php
require 'includeTodashboard.php';



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

    <title>Dashboard</title>

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
<?php  require "main-menu.php" ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

        <?php 

require "user-profile.php";
?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-8 mb-4 order-0">
                  <div class="card tenants-block">
                 
                        <div class="card-body " style="display: flex !important;flex-direction: row !important;">
                        <div>
                          <svg xmlns="http://www.w3.org/2000/svg" class="tenants-icon" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                        </div>
                        <div style="display:flex;flex-direction: column;">
                                                    <p class="tenants-text1">
                         Tenants
                          </p>
                          <p class="mb-4 tenants-text2">
                          <?php echo $tenantCount?>
                           </p>

                          </div>
                        </div>
                      </div>
                   
                  
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card houses-block">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <svg xmlns="http://www.w3.org/2000/svg" class="houses-icon" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                            </div>
                          
                          </div>
                          <span class="fw-semibold d-block mb-1 houses-text">Houses</span>
                          <h3 class="card-title mb-2 houses-numbertext"><?php echo $housesCount?></h3>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card annual-collectionBlock">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <svg xmlns="http://www.w3.org/2000/svg" class="annual-collection" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 64C28.7 64 0 92.7 0 128L0 384c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64L64 64zm64 320l-64 0 0-64c35.3 0 64 28.7 64 64zM64 192l0-64 64 0c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64l0 64-64 0zm64-192c-35.3 0-64-28.7-64-64l64 0 0 64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>
                            </div>
                            <!-- Style for seelcted value  -->
                            
                      
                          </div>
                          <span class="fw-semibold d-block mb-1 annual-collectionText">Revenue</span>
                          <h3 class="card-title text-nowrap mb-1 annual-collectionnumbertext">
                            <?php

echo (int)$revenueCount;
?>
                        </h3>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-7 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-7">
                        <h5 class="card-header m-0 me-2 pb-3">Houses by Location</h5>
                        <canvas id="myChart"></canvas>
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                 

                                             <!-- Charts -->
  <script>
    
    const labels2 = <?php echo json_encode($region)?>;
  const data2 = {
    labels: labels2,
    datasets: [{
      label: 'Houses by Region',
      data: <?php echo json_encode($count)?>,
      
      backgroundColor: [
        '#EB8921',
        '#375E97',
        '#EB8921',
        '#007083',
       
      ],
      borderColor: [
       '#EB8921',
       
      ],
      borderWidth: 1
    }]
  };
  const config2 = {
    type: 'bar',
    data: data2,
    options: {
   
      
      scales: {
        y: {
          beginAtZero: true
        }
        
      }
    },
  };
  var myChart = new Chart(
      document.getElementById('myChart'),
      config2
    );
  </script>
                       
                        </div>
      
                   

                    
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-12 col-lg-5 order-3 order-md-2" >
                  <div class="row">
                    <div class="col-5 mb-4 w-100">
                      <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                          <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Monthly Revenue</h5>
                     
                          </div>
                          <div class="dropdown" style="margin-left:40px !important">
                            
                          </div>
                        </div>
                      
                        <div class="card-body" style="width:350px !important">
                    
                          <canvas id="lineChart"></canvas>

                          <!-- Chart Scripts -->
                          <script>
                            const months = <?php echo json_encode($months); ?>;  // PHP array of month names
                            const revenues = <?php echo json_encode($revenues); ?>;  // PHP array of revenue values
    
                            const labels3 =<?php echo json_encode($months)?>;
                            
                          const data3 = {
                            labels: labels3,
                            datasets: [{
                              label: 'Monthly Revenue',
                              data: <?php echo json_encode($revenues)?>,
                              backgroundColor: [
                              '#EB8921',
                            '#375E97',
                            ' #f1ba21f1',
                            'purple',
                           
                               
                              ],
                              borderColor: [
                               '#EB8921',
                               
                              ],
                              borderWidth: 1
                            }]
                          };
                          const config3 = {
                            type: 'line',
                            data: data3,
                            options: {
                           
                              
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                                
                              }
                            },
                          };
                          var lineChart = new Chart(
                              document.getElementById('lineChart'),
                              config3
                            );
                          </script>
                      
                       
                    
                               
                        </div>
                      </div>
                      </div>
                    </div>
                 
           
                  
                           
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Order Statistics -->
                <div class="col-md-12 col-lg-12 col-xl-11 order-0 mb-4"  style="margin:0 auto !important">
                  <div class="card h-100" >
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Tenants List</h5>
                 
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
                                  <!-- <th>Contract</th> -->
                                 
                                  
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
                                  <td><a href="house-number.php?number=<?php echo $tenants['houseNumber']?>"><?php echo $tenants['houseNumber']?></a></td>
                                  <td><?php echo $tenants['address']?></td>
                                  <td><?php echo $tenants['startDate']?></td>
                                  <td><?php echo $tenants['endDate']?></td>
                                  <td><?php echo htmlspecialchars(rentalTenantAmount($tenants), ENT_QUOTES, 'UTF-8'); ?></td>
                          
                                  <!-- <td><a href='<?php echo $tenants['contract']?>' download>Download</a></td> -->
                                 
                                  
                                
                                 
                              </tr>
                              <?php 
                        }
                        ?>
                           
                          </tbody>
                        
                      </table>
                      <style>
                           .page-link{
                            background-color: hsl(48, 4%, 23%)  !important;
                           }
                           .addBtn{
                            background-color: hsl(48, 4%, 23%)  !important;
                            border:none !important;
                           }
                           
                           </style>
                      <!-- </div> -->
                      </div>
               
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                    
                      </div>
                      
                          
                   
                         
                    </div>
                  </div>
                </div>
              
          
                <!--/ Transactions -->
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
            "next":       "<button style='border:1px solid grey !important;color:grey;column-gap:0px' class='addBtn' >Next</button>",
            "previous":   "<button style='border:1px solid grey !important;color:grey;column-gap:0px'  class='addBtn'>Previous</button>",
            
        }
      }
      } );
      </script>

      <!-- Generate year -->
      <script>
    $(document).ready(function() {
      var startYear = 2024;
      var endYear = 2030;
      var $dropdown = $('#yearDropdown');
      
      // Loop through and add the years to the dropdown
      for (var year = startYear; year <= endYear; year++) {
        $dropdown.append('<option value="' + year + '">' + year + '</option>');
      }
    });
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
<!-- Notification badge -->
<script src='alert.js'></script>

    <!-- ========== AI ASSISTANT FLOATING BUTTON ========== -->
    <style>
      #ai-assistant-fab {
        position: fixed;
        bottom: 28px;
        right: 28px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
      }

      #ai-assistant-btn {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: linear-gradient(135deg, #EB8921 0%, #c96a10 100%);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 18px rgba(235, 137, 33, 0.45);
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        position: relative;
        outline: none;
      }

      #ai-assistant-btn:hover {
        transform: translateY(-3px) scale(1.07);
        box-shadow: 0 8px 28px rgba(235, 137, 33, 0.6);
      }

      #ai-assistant-btn:active {
        transform: scale(0.96);
      }

      #ai-assistant-btn svg {
        width: 26px;
        height: 26px;
        fill: #ffffff;
      }

      #ai-assistant-btn::before {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 50%;
        border: 2px solid rgba(235, 137, 33, 0.45);
        animation: ai-pulse 2s ease-in-out infinite;
      }

      @keyframes ai-pulse {
        0%, 100% { transform: scale(1);    opacity: 0.65; }
        50%       { transform: scale(1.18); opacity: 0;    }
      }

      #ai-assistant-label {
        font-size: 11px;
        font-weight: 600;
        color: #EB8921;
        letter-spacing: 0.3px;
        background: #fff;
        padding: 3px 10px;
        border-radius: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
        white-space: nowrap;
        user-select: none;
      }

      #ai-chat-modal {
        display: none;
        position: fixed;
        bottom: 110px;
        right: 28px;
        z-index: 9998;
        width: 340px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.18);
        overflow: hidden;
        flex-direction: column;
        animation: ai-slide-in 0.25s ease;
      }

      @keyframes ai-slide-in {
        from { opacity: 0; transform: translateY(16px) scale(0.97); }
        to   { opacity: 1; transform: translateY(0)   scale(1);    }
      }

      #ai-chat-modal.open { display: flex; }

      .ai-chat-header {
        background: linear-gradient(135deg, #EB8921 0%, #c96a10 100%);
        padding: 14px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: #fff;
      }

      .ai-chat-header-title {
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
      }

      .ai-chat-header-close {
        background: none;
        border: none;
        color: rgba(255, 255, 255, 0.8);
        font-size: 22px;
        cursor: pointer;
        line-height: 1;
        padding: 0;
        outline: none;
      }

      .ai-chat-header-close:hover { color: #fff; }

      .ai-chat-body {
        padding: 16px;
        font-size: 13px;
        color: #444;
        background: #fff9f3;
        min-height: 80px;
      }

      .ai-chat-body p { margin: 0 0 8px; }

      .ai-chat-footer {
        padding: 12px 16px;
        border-top: 1px solid #f0e0cc;
        font-size: 12px;
        color: #999;
        text-align: center;
        background: #fff;
      }
    </style>

    <div id="ai-assistant-fab">
      <div id="ai-chat-modal">
        <div class="ai-chat-header">
          <div class="ai-chat-header-title">
            <!-- Robot / AI agent icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18" height="18">
              <path d="M12 2a2 2 0 0 1 2 2c0 .74-.4 1.39-1 1.73V7h3a3 3 0 0 1 3 3v1h.5a1.5 1.5 0 0 1 0 3H19v1a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3v-1h-.5a1.5 1.5 0 0 1 0-3H5v-1a3 3 0 0 1 3-3h3V5.73A2 2 0 0 1 10 4a2 2 0 0 1 2-2zm-2 9a1.5 1.5 0 0 0 0 3 1.5 1.5 0 0 0 0-3zm4 0a1.5 1.5 0 0 0 0 3 1.5 1.5 0 0 0 0-3zm-4 4.5h4v1H10v-1z"/>
            </svg>
            AI Assistant
          </div>
          <button class="ai-chat-header-close" onclick="toggleAiChat()" aria-label="Close">&times;</button>
        </div>
        <div class="ai-chat-body">
          <p>👋 Hello! I'm your <strong>AI Assistant</strong>.</p>
          <p>I can help you review tenant records, track revenue trends, and answer questions about your property data.</p>
        </div>
        <div class="ai-chat-footer">🔒 Powered by Property Intelligence</div>
      </div>

      <button id="ai-assistant-btn" onclick="toggleAiChat()" title="AI Assistant" aria-label="Open AI Assistant">
        <!-- Circuit-brain / AI chip icon -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M9 2H7v2H5a2 2 0 0 0-2 2v2H1v2h2v2H1v2h2v2a2 2 0 0 0 2 2h2v2h2v-2h2v2h2v-2h2a2 2 0 0 0 2-2v-2h2v-2h-2v-2h2V9h-2V7a2 2 0 0 0-2-2h-2V2h-2v2H9V2zm-2 4h10v10H7V6zm2 2v6h6V8H9zm2 2h2v2h-2v-2z"/>
        </svg>
      </button>
      <span id="ai-assistant-label">AI Assistant</span>
    </div>

    <script>
      function toggleAiChat() {
        var modal = document.getElementById('ai-chat-modal');
        modal.classList.toggle('open');
      }

      document.addEventListener('click', function(e) {
        var fab   = document.getElementById('ai-assistant-fab');
        var modal = document.getElementById('ai-chat-modal');
        if (modal.classList.contains('open') && !fab.contains(e.target)) {
          modal.classList.remove('open');
        }
      });
    </script>
    <!-- ========== / AI ASSISTANT FLOATING BUTTON ========== -->

</body>
  </body>
</html>