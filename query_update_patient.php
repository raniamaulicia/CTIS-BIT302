<?php
include 'connection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $test_result = htmlspecialchars($_POST['test_result']);
    $test_status = htmlspecialchars($_POST['test_status']);
    $result_date = htmlspecialchars($_POST['result_date']);

    $query = mysqli_query($connection, "UPDATE testreport_table set test_result = '$test_result', test_status = '$test_status', result_date = '$result_date' WHERE id= $id");

    if ($query > 0) {
        echo "<script>alert('Successfully update the data');
        location.href='tester_recordtest.php';
        </script>";
    } else {
        echo "<script>alert('Failed to update the data');
        location.href='tester_recordtest.php';
        </script>";
    }
}
