<?php
ob_start();
session_start();
include('include/db.php');
if (!isset($_SESSION['user'])) header('Location: login.php');
// elseif (!$_SESSION['student'] || !$_SESSION['staff']) header('Location: login.php');

// if (isset($_SESSION['id']) && $_SESSION['role'] == 'student' || $_SESSION['role'] == 'staff'){

// } else{
//   header('Location: login.php');
// }



?>


<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    tfoot {
    display: table-header-group;
}
</style>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-complaint <br><sup><?= $_SESSION['user']['role'] ?></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="complaint.php">
          <i class="fa fa-fw fa-folder"></i>
          <span>Complaints</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['user']['name'] ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="complaint.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Complaint</a>
          </div>

          <!-- Content Row -->
          <?php include('include/card_row.php'); ?>
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Complaint Lists</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="100">Image</th>
                          <th class="dt-filter-text">Technician</th>
                          <th class="dt-filter-select">Status</th>
                          <th class="dt-filter-text">Room</th>
                          <th class="dt-filter-select">Type</th>
 
                          <th>Detail</th>
                          <th>Available Date</th>
                          <th>Available Time</th>
                          <th>Comment</th>
                          <!-- <th>View</th> -->
                        </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th></th>
                              <th>Technician</th>
                              <th>Status</th>
                              <th>Room</th>
                              <th>Type</th>
                              
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <!-- <th></th> -->
                          </tr>
                      </tfoot>
                      <tbody>

                    <?php 

                    // print_r($_SESSION['user']);

                    $complainer_id = $_SESSION['user']['userId'];
                    $run_query = $conn->query("SELECT * FROM complaints WHERE complainer_id = $complainer_id ORDER BY id DESC");

                    while ($db_row = $run_query->fetch_assoc()) { ?>
                        <tr>
                            <td><img src="images/<?= $db_row['img1'] ?>" width="100%"></td>
                            <td>
                                <?php 
                                $query = $conn->query("SELECT * FROM technician WHERE id = ".$db_row['technician_id']."");
                                $row = $query->fetch_assoc();

                                echo $db_row['technician_id'] == 0 ? "not set" : $row['name'];
                                
                                ?>       
                            </td>
                            <td>
                              <?php 

                              // $db_row['status_id']; 
                              switch ($db_row['status_id']) {
                                case 1:
                                  echo "KIV";
                                  break;
                                case 2:
                                  echo "Closed";
                                  break;
                                default:
                                  echo "Pending";
                                  break;
                              }
                              ?>
                            </td>
                            <td><?= $db_row['room_no']; ?></td>
                            <td>
                                <?php 

                                $query = $conn->query("SELECT * FROM complaint_type WHERE id=".$db_row['complaint_type']."");
                                $row = $query->fetch_assoc();
                                echo $row['type'];

                                ?>
                                    
                                
                            </td>
                           
                            <td><?= $db_row['detail']; ?></td>
                            <td><?= $db_row['available_date']; ?></td>
                            <td><?= $db_row['available_time']; ?></td>
                           <!--  <td><?= $db_row['status'] == '' ? 'Not Processe' : $db_row['status']; ?></td> -->
                           <td><?= $db_row['comment'] == '' ? 'No comment' : $db_row['comment']; ?></td>
                            <!-- <td><a class="btn btn-primary btn-sm" href="view_complaint.php?compid=<?= $db_row['id']; ?>">View</a></td> -->
                        </tr>

                        <?php
                    }
                     ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

           
          </div>

          <!-- Request Table -->

          <?php 

          if ($_SESSION['user']['role'] == 'staff') {
            ?>
            <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Requests Lists</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable2" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="dt-filter-text">No.</th>
                          <th class="dt-filter-text">Complaint Type</th>
                          <th class="dt-filter-select">Status</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No.</th>
                              <th>Complaint Type</th>
                              <th>Status</th>
                              <th></th>
                          </tr>
                      </tfoot>
                      <tbody>

                    <?php 

                    // print_r($_SESSION['user']);

                    $complainer_id = $_SESSION['user']['userId'];
                    $run_query = $conn->query("SELECT id, jenis_complaint, status FROM complaint_tbl WHERE complainer_id = $complainer_id");

                    while ($db_row = $run_query->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $db_row['id'] ?></td>
                            <td><?= $db_row['jenis_complaint']; ?></td>
                            <td><?= $db_row['status'] == '' ? 'Not Processe' : $db_row['status']; ?></td>
                            <td><a class="btn btn-primary btn-sm" href="view_complaint.php?compid=<?= $db_row['id']; ?>">View</a></td>
                        </tr>

                        <?php
                    }
                     ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

           
          </div>
            <?php
          }

           ?>

          
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
