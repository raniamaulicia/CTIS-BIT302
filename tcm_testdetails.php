<?php
session_start();
include 'connection.php';
$fullname = $_SESSION['username'];
if (!isset($_SESSION["username"])) {
    echo "<script>alert('login first'); location.href='login.php'</script>";
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($connection, "SELECT * FROM testreport_table WHERE id= $id");
    $row = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">

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

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-virus"></i>
                </div>
                <div class="sidebar-brand-text mx-5">CTIS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Test Center Manager
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="tcm_dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Menu -->
            <li class="nav-item">
                <a class="nav-link" href="tcm_testcentre.php">
                    <i class="far fa-fw fa-hospital"></i>
                    <!-- REGISTER TEST CENTRE --><span>Register Test Centre</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="tcm_tester.php">
                    <i class="fas fa-fw fa-user-nurse"></i>
                    <!-- RECORD TESTER --><span>Add New Tester</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="tcm_kitstock.php">
                    <i class="fas fa-fw fa-first-aid"></i>
                    <!-- Manage Kit Stock --><span>Test Kit Stock</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $fullname ?></span>
                                <i class="fas fa-hospital-user"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div id="page-content-wrapper">
                    <div class="container">
                        <div class="card my-5 p-3">
                            <div class="card-heading ">
                                <!-- Button trigger modal -->
                                <h2 class="card-title text-center">Test Report</h2>
                            </div>
                            <div class="card-body ">
                                <div class="justify-content-center">
                                    <div class="col-auto">
                                        <div class="table-responsive-md">
                                            <table class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Test ID</th>
                                                        <th>Patient Name</th>
                                                        <th>Patient Type</th>
                                                        <th>Symptoms</th>
                                                        <th>Test Date</th>
                                                        <th>Test Status</th>
                                                        <th>Result Date</th>
                                                        <th>Test Result</th>
                                                        <th>Test Kit Name</th>
                                                        <th>Done by</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                if (isset($_GET['id'])) {
                                                    $id = $_GET['id'];
                                                    $query = mysqli_query($connection, "SELECT * FROM testreport_table WHERE id= $id");
                                                    while ($data = mysqli_fetch_assoc($query)) {
                                                ?>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row"><?php echo $data['id']; ?></th>
                                                                <td><?php echo $data['fullname']; ?></td>
                                                                <td><?php echo $data['patient_type']; ?></td>
                                                                <td><?php echo $data['symptoms']; ?></td>
                                                                <td><?php echo $data['test_date']; ?></td>
                                                                <td><?php echo $data['test_status']; ?></td>
                                                                <td><?php echo $data['result_date']; ?></td>
                                                                <td><?php echo $data['test_result']; ?></td>
                                                                <td><?php echo $data['testkit_name']; ?></td>
                                                                <td><?php echo $data['testcentre_name']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </table>
                                        </div>
                                        <nav aria-label="...">
                                            <div class="col text-center">
                                                <a href="tcm_dashboard.php" class="btn btn-outline-primary">Previous Page</a>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; COVID-19 Testing Information System</span>
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

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

</body>

</html>