

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
<?php require 'includeTodashboard.php'?>
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

    <title>Charts</title>

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
                <div class="col-12 col-lg-6 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">Houses by Region</h5>
                        <canvas id="myChart"></canvas>
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                 

                                             <!-- Charts -->
                                                          

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
                <div class="col-12 col-md-12 col-lg-6 order-3 order-md-2" >
                  <div class="row">
                    <div class="col-6 mb-4 w-100">
                      <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                          <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Monthly Revenue</h5>
                           
                          </div>
                          <div class="dropdown" style="margin-left:40px !important">
                            
                          </div>
                        </div>
                        <div class="card-body">
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

                <!-- Second row -->

                <div class="row">
                <div class="col-12 col-lg-6 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">Houses by Location</h5>
                        <canvas id="chart5"></canvas>
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                 

                                             <!-- Charts -->
  <script>
    
    const labels5 = ['Mwanza','Simiyu','Tabora','Geita','Arusha','Mbeya','Iringa','Mara'];
  const data5 = {
    labels: labels5,
    datasets: [{
      label: 'Houses by Region',
      data: [10,23,48,67,30,23,20,34],
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
  const config5 = {
    type: 'bar',
    data: data5,
    options: {
   
      
      scales: {
        y: {
          beginAtZero: true
        }
        
      }
    },
  };
  var chart5 = new Chart(
      document.getElementById('chart5'),
      config5
    );
  </script>
                       
                        </div>
      
                   

                    
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-12 col-lg-6 order-3 order-md-2" >
                  <div class="row">
                    <div class="col-6 mb-4 w-100">
                      <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                          <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Monthly Revenue</h5>
                        
                          </div>
                          <div class="dropdown" style="margin-left:40px !important">
                            <button style="color:white !important"
                              class="btn  dropdown-toggle"
                              type="button"
                              id="growthReportId"
                              data-bs-toggle="dropdown"
                              aria-haspopup="true"
                              aria-expanded="false"
                            >
                             
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                              <a class="dropdown-item" href="javascript:void(0);">2021</a>
                              <a class="dropdown-item" href="javascript:void(0);">2020</a>
                              <a class="dropdown-item" href="javascript:void(0);">2019</a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <canvas id="linechart"></canvas>

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


</body>
<script>

function showNotifications() {
        alert("to be coded later"); // Placeholder action for the notification
    }

 </script>
</html>
