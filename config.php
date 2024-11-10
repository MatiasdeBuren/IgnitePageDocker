<?php
$servername = "db"; // This should match the service name in docker-compose.yml
$username = "user";
$password = "password";
$dbname = "ignite2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT 1";
if (!mysqli_query($conn, $sql)) {
    die("Query failed: " . mysqli_error($conn));
}

?>