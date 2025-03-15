<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Web Klinik</title>
</head>
<body>
    <h2>Tambah Data Obat</h2>
    <form action="controller/obat/createObat.php" method="post">
        <div class="mb-3">
            <label for="namaObat">Nama Obat:</label>
            <input type="text" id="namaObat " name="namaObat"><br><br>
        </div>
        <div class="mb-3">
            <label for="stokObat">Stok Obat:</label>
            <input type="number" id="stokObat" name="stokObat"><br><br>
        </div>
        <div class="mb-3">
            <label for="hargaObat">Harga Obat:</label>
            <input type="number" id="hargaObat" name="hargaObat"><br><br>
        </div>
        <div class="mb-3">
            <input type="submit" value="Create" class="btn btn-primary">
        </div>
    </form>
    <tbody>
        <?php include 'controller/obat/readObat.php';?>
    </tbody>
</body>
</html>