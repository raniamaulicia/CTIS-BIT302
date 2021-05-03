<?php
session_start();
include 'connection.php';

$username = $_SESSION['username'];
$query = mysqli_query($connection, "SELECT * FROM user_table WHERE username = '$username'");
$username = htmlspecialchars($_POST['username']);
$password_plain = htmlspecialchars($_POST['password']);
$fullname = htmlspecialchars($_POST['fullname']);
$row = mysqli_fetch_assoc($query);
$testcentre_name =  $row['testcentre_name'];
$password = password_hash($password_plain, PASSWORD_DEFAULT);
$query = mysqli_query($connection, "insert into user_table values('','$username','$password','patient','$fullname','$testcentre_name')");
$user_id =  mysqli_query($connection, "SELECT * FROM user_table WHERE username = '$username'");
$symptoms = htmlspecialchars($_POST['symptoms']);
$patient_type = htmlspecialchars($_POST['patient_type']);
$test_date = htmlspecialchars($_POST['test_date']);
$testkit_name = htmlspecialchars($_POST['testkit_name']);
$row_id =  mysqli_fetch_assoc($user_id);
$id = $row_id["id"];
$query = mysqli_query($connection, "insert into patient_table values('','$username','$password','$fullname','$symptoms','$patient_type')");
$testreport = mysqli_query($connection, "insert into testreport_table values('','$id','$fullname','$patient_type','$symptoms','','Pending','$test_date','','$testkit_name','$testcentre_name')");

if ($testreport > 0) {
    echo "<script>location.href='tester_recordtest.php';</script>";
} else {
    echo "<script>alert('Failed to record new data report');
            location.href='tester_recordtest.php';
        </script>";
}

if ($query > 0) {
    echo "<script>alert('Failed to record new data report');
    location.href='tester_recordtest.php';
</script>";
} else {
    echo "<script>location.href='tester_recordtest.php';</script>";
}
