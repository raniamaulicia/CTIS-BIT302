<?php
session_start();
include 'connection.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($connection, "SELECT * FROM user_table where username = '$username'");

    if (mysqli_num_rows($query) == 1) {
        $role_id = mysqli_fetch_assoc($query);
        $id = $role_id['id'];
        session_start();
        if (password_verify($password, $role_id['password'])) {
            if ($role_id['role_id'] == "tcm") {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
                $_SESSION['role_id'] = $password;

                header("location:tcm_dashboard.php");
            } else if ($role_id['role_id'] == "tester") {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
                $_SESSION['role_id'] = $password;

                header("location:tester_dashboard.php");
            } else if ($role_id['role_id'] == "patient") {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
                $_SESSION['role_id'] = $password;

                header("location:patient_dashboard.php");
            }
        } else {

            echo "<script>alert('Wrong username or passwrod');
  
                </script>";
        }
    } else {
        echo "<script>alert('Username does not exist!');

                </script>";
    }
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <title>Login</title>

</head>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class=" card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">CTIS Login</h1>
                                    </div>
                                    <!-- Login Placeholder -->
                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Username" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password" />
                                        </div>

                                        <!-- Login Button -->
                                        <div>
                                            <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Login" />
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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