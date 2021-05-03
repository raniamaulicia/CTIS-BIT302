<?php
include 'connection.php';

$testkit_name = $_POST['testkit_name'];
$testkit_stock = $_POST['testkit_stock'];
$testcentre_name = $_POST['testcentre_name'];

$query = mysqli_query($connection, "insert into testkit_table values('','$testkit_name','$testkit_stock','$testcentre_name')");

if ($query > 0) {
    echo "<script>
            location.href='tcm_kitstock.php';
        </script>";
} else {
    echo "<script>alert('Failed to add new test kit');
            location.href='tcm_kitstock.php';
        </script>";
}
