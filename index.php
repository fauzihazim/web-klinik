<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Web Klinik</title>
</head>
<body>
    <h2>Tambah Data Pasien</h2>
    <a href="dokter.php" class="btn btn-primary">dokter</a>
    <form action="controller/pasien/createPasien.php" method="post">
        <div class="input-group mb-3 start-50 translate-middle" style="width: 80%;">
            <span class="input-group-text" for="namaPasien">Nama Pasien :</span>
            <input type="text" class="form-control" id="namaPasien" name="namaPasien" placeholder="namaPasien" aria-label="namaPasien" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 start-50 translate-middle" style="width: 80%;">
            <span class="input-group-text" for="beratBadanPasien">Berat Pasien :</span>
            <input type="number" class="form-control" id="beratBadanPasien" name="beratBadanPasien" placeholder="beratBadanPasien" aria-label="beratBadanPasien" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 start-50 translate-middle" style="width: 80%;">
            <span class="input-group-text" for="umurPasien">Umur Pasien :</span>
            <input type="number" class="form-control" id="umurPasien" name="umurPasien" placeholder="umurPasien" aria-label="umurPasien" aria-describedby="basic-addon1">
        </div>

        <!-- <label for="namaPasien">Nama Pasien:</label>
        <input type="text" id="namaPasien" name="namaPasien"><br><br> -->
        <!-- <label for="beratBadanPasien">Berat Pasien:</label>
        <input type="number" id="beratBadanPasien" name="beratBadanPasien"><br><br> -->
        <!-- <label for="umurPasien">Umur Pasien:</label>
        <input type="number" id="umurPasien" name="umurPasien"><br><br> -->
        <input type="submit" value="Create">
    </form>
    <tbody>
        <?php include 'controller/pasien/readPasien.php';?>
    </tbody>
</body>
</html>