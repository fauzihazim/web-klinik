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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Edit Obat</title>
    <link rel="stylesheet" href="../../css/stylesheet.css">
</head>
<body class="m-10">
    <a href="../../obat.php" class="btn btn-primary">
        <i class="bi bi-chevron-left"></i> Back
    </a>
    <h2>Edit Obat</h2>
    <form class="mt-30" action="editObat.php" method="post">
        <input type="hidden" name="idObat" value="<?php echo $obat['idObat']; ?>">
        <div class="input-group mb-3 start-50 translate-middle" style="width: 80%;">
            <span class="input-group-text" for="namaObat">Nama Obat :</span>
            <input type="text" class="form-control" id="namaObat" name="namaObat" value="<?php echo $obat['namaObat']; ?>" placeholder="namaObat" aria-label="namaObat" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 start-50 translate-middle" style="width: 80%;">
            <span class="input-group-text" for="stokObat">Stok Obat :</span>
            <input type="number" class="form-control" id="stokObat" name="stokObat" value="<?php echo $obat['stokObat']; ?>" placeholder="stokObat" aria-label="stokObat" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 start-50 translate-middle" style="width: 80%;">
            <span class="input-group-text" for="harga">Berat Pasien :</span>
            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $obat['harga']; ?>" placeholder="harga" aria-label="harga" aria-describedby="basic-addon1">
        </div>
        <input class="btn btn-primary" type="submit" value="Update">
    </form>
</body>
</html>
