<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webklinik";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO dokter (namaDokter, spesialisasi, harga) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $namaDokter, $spesialisasi, $harga);

// Set parameters and execute
$namaDokter = $_POST['namaDokter'];
$spesialisasi = $_POST['spesialisasi'];
$harga = $_POST['harga'];
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: http://localhost/webklinik/dokter.php");
exit();

?>
