<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Klinik</title>
</head>
<body>
    <h2>Tambah Data Dokter</h2>
    <form action="controller/dokter/createDokter.php" method="post">
        <label for="namaDokter">Nama Dokter:</label>
        <input type="text" id="namaDokter" name="namaDokter"><br><br>
        <label for="spesialisasi">Spesialisasi:</label>
        <input type="text" id="spesialisasi" name="spesialisasi"><br><br>
        <label for="harga">Harga Konsultasi:</label>
        <input type="number" id="harga" name="harga"><br><br>
        <input type="submit" value="Create">
    </form>
    <tbody>
        <?php include 'controller/dokter/readDokter.php';?>
    </tbody>
</body>
</html>