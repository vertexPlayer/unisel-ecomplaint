<?php include "include/session.php"; ?>

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

  <title>Admin - Users</title>

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
    <?php include('include/sidebar.php') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('include/top_bar.php') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="complaint.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Import users</a>
          </div>


          <!-- Technician list -->
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Users Lists</h6>
                  <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete all users?')">Delete all users</a>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable2" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="dt-filter-select">Role</th>
                          <th class="dt-filter-text">Name</th>
                          <th class="dt-filter-text">Username</th>
                          <th class="dt-filter-text">Email</th>
                          <th class="dt-filter-text">IC No.</th>
                          <th class="dt-filter-text">ID No.</th>
                          <th class="dt-filter-text">Phone No.</th>
                          <th class="dt-filter-text">Faculty</th>
                          <th width="20%">Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>Role</th>
                              <th>Name</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>IC No.</th>
                              <th>ID No.</th>
                              <th>Phone No.</th>
                              <th>Faculty</th>
                              <th></th>
                          </tr>
                      </tfoot>
                      <tbody>

                    <?php 

                    $run_query = $conn->query("SELECT * FROM users");

                    while ($db_row = $run_query->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $db_row['role']; ?></td>
                            <td><?= $db_row['name']; ?></td>
                            <td><?= $db_row['username']; ?></td>
                            <td><?= $db_row['email']; ?></td>
                            <td><?= $db_row['icNum']; ?></td>
                            <td><?= $db_row['matricNum']; ?></td>
                            <td><?= $db_row['phoneNum']; ?></td>
                            <td><?= $db_row['faculty']; ?></td>
                            <td><a class="btn btn-primary btn-sm" href="view_complaint.php?compid=<?= $db_row['userId']; ?>"><i class="fas fa fa-edit"></i>Edit</a>
                            	<a class="btn btn-danger btn-sm" href="users-delete.php?id=<?= $db_row['userId']; ?>" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fas fa fa-trash"></i> Delete</a>
                            </td>
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

  

</body>

</html>
