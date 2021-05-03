<?php
include 'connection.php';

$testcentre_name = $_POST['testcentre_name'];

$query = mysqli_query($connection, "insert into testcentre_table values('','$testcentre_name')");

if ($query > 0) {
    echo "<script>alert('Record Test Centre Success');
            location.href='tcm_testcentre.php';
        </script>";
} else {
    echo "<script>alert('Record Test Centre Failed');
            location.href='tcm_testcentre.php';
        </script>";
}
