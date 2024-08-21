<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$connect= mysqli_connect("localhost","root","","job_portal_system");

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} else {
    echo "Connected successfully";
}

$sql = "SELECT * FROM all_jobs WHERE job_category='Engineering'";
$select = mysqli_query($connect, $sql);

if (!$select) {
    die("SQL error: " . mysqli_error($connect));
}

if (mysqli_num_rows($select) > 0) {
    echo "Data found";
} else {
    echo "No data found";
}

$connect->close();
?>
