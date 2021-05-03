<?php
session_start();
include 'connection.php';

$username = $_SESSION['username'];
$query1 = mysqli_query($connection, "SELECT * FROM user_table WHERE username = '$username'");
$row = mysqli_fetch_assoc($query1);

$id = htmlspecialchars($_POST['user_id']);
$query2 = mysqli_query($connection, "SELECT * FROM user_table WHERE id = '$id'");
$data = mysqli_fetch_assoc($query2);

$fullname = $data['fullname'];
$testcentre_name =  $row['testcentre_name'];

//test_data
$symptoms = htmlspecialchars($_POST['symptoms']);
$patient_type = htmlspecialchars($_POST['patient_type']);
$test_date = htmlspecialchars($_POST['test_date']);
$testkit_name = htmlspecialchars($_POST['testkit_name']);
$testreport = mysqli_query($connection, "insert into testreport_table values('','$id','$fullname','$patient_type','$symptoms','','Pending','$test_date','','$testkit_name','$testcentre_name')");

if ($testreport > 0) {
    echo "<script>alert('Successfully record test data');
            location.href='tester_recordtest.php';
        </script>";
} else {
    echo "<script>alert('Failed to record new data');
            location.href='tester_recordtest.php';
        </script>";
}

if ($query > 0) {
    echo "<script>alert('Successfully record new patient');
            location.href='tester_recordtest.php';
        </script>";
} else {
    echo "<script>alert('Failed to record new data');
            location.href='tester_recordtest.php';
        </script>";
}
