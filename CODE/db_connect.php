<?php
// db_connect.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Surnames_K_N_cis2360_dog_show_3"; 

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
