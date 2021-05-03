<?php
session_start();
include 'connection.php';

$username = htmlspecialchars($_POST['username']);
$password_plain = htmlspecialchars($_POST['password']);
$tester_name = htmlspecialchars($_POST['tester_name']);
$testcentre_name = htmlspecialchars($_POST['testcentre_name']);

$password = password_hash($password_plain, PASSWORD_DEFAULT);
$query = mysqli_query($connection, "insert into user_table values('','$username','$password','tester','$tester_name','$testcentre_name')");
$query = mysqli_query($connection, "insert into tester_table values('','$username','$password','$tester_name','$testcentre_name')");

if ($query > 0) {
    echo "<script>alert('Successfully record new tester');
            location.href='tcm_tester.php';
        </script>";
} else {
    echo "<script>alert('Failed to record new tester');
            location.href='tcm_tester.php';
        </script>";
}
