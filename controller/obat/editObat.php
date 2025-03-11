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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idObat = $_POST['idObat'];
    $namaObat = $_POST['namaObat'];
    $stokObat = $_POST['stokObat'];
    $harga = $_POST['harga'];

    $sql = "UPDATE obat SET namaObat=?, stokObat=?, harga=? WHERE idObat=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siii", $namaObat, $stokObat, $harga, $idObat);
    $stmt->execute();
    $stmt->close();

    header("Location: http://localhost/webklinik/obat.php");
    exit;
} else {
    $idObat = $_GET['id'];
    $sql = "SELECT * FROM obat WHERE idObat=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idObat);
    $stmt->execute();
    $result = $stmt->get_result();
    $obat = $result->fetch_assoc();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Obat</title>
</head>
<body>
    <h2>Edit Obat</h2>
    <form action="editObat.php" method="post">
        <input type="hidden" name="idObat" value="<?php echo $obat['idObat']; ?>">
        <label for="namaObat">Nama Obat:</label>
        <input type="text" id="namaObat" name="namaObat" value="<?php echo $obat['namaObat']; ?>"><br><br>
        <label for="stokObat">Stok Obat:</label>
        <input type="number" id="stokObat" name="stokObat" value="<?php echo $obat['stokObat']; ?>"><br><br>
        <label for="harga">Harga:</label>
        <input type="number" step="0.01" id="harga" name="harga" value="<?php echo $obat['harga']; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
