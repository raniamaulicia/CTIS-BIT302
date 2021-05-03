<?php
include 'connection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $fullname = htmlspecialchars($_POST['fullname']);
    $testcentre_name = htmlspecialchars($_POST['testcentre_name']);
    $query = mysqli_query($connection, "UPDATE user_table set fullname= '$fullname', testcentre_name= '$testcentre_name' WHERE id= $id");

    if ($query > 0) {
        echo "<script>alert('Successfully update the data');
        location.href='tcm_tester.php';
        </script>";
    } else {
        echo "<script>alert('Failed to update the data');
        location.href='tcm_tester.php';
        </script>";
    }
}
