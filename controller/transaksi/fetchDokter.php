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

$sql = "SELECT idDokter, namaDokter FROM dokter";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["idDokter"] . '">' . $row["namaDokter"] . '</option>';
    }
} else {
    echo '<option value="">No categories available</option>';
}

$conn->close();
?>
