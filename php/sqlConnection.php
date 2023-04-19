<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "gymBill";

// $username = "haitomns_restHat";
// $password = "CjaC@SrogPka$RkDE59g";
// $dbname = "haitomns_restHat";

$conn = new mysqli($serverName, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>