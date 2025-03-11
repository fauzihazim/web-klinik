<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webklinik";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $idObat = $_GET['id'];

    // Menghapus data dari tabel
    $sql = "DELETE FROM obat WHERE idObat = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idObat);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

header("Location: http://localhost/webklinik/obat.php");
exit;
?>
