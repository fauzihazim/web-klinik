<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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