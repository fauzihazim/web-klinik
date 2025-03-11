<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Klinik</title>
</head>
<body>
    <h2>Tambah Data Pasien</h2>
    <a href="dokter.php">dokter</a>
    <form action="controller/pasien/createPasien.php" method="post">
        <label for="namaPasien">Nama Pasien:</label>
        <input type="text" id="namaPasien" name="namaPasien"><br><br>
        <label for="beratBadanPasien">Berat Pasien:</label>
        <input type="number" id="beratBadanPasien" name="beratBadanPasien"><br><br>
        <label for="umurPasien">Umur Pasien:</label>
        <input type="number" id="umurPasien" name="umurPasien"><br><br>
        <input type="submit" value="Create">
    </form>
    <tbody>
        <?php include 'controller/pasien/readPasien.php';?>
    </tbody>
</body>
</html>