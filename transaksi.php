<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Transaksi</title>
    <script> 
        let counter = 2; // Initialize counter
        function addDropdown() { 
            // var container = document.getElementById('dropdownContainer');
            // var newDropdown = document.createElement('select');
            // newDropdown.name = 'additionalCategory[]';
            // newDropdown.innerHTML = '
            // container.appendChild(newDropdown);
            // container.appendChild(document.createElement('br')); // Add a line break for spacing
            var container = document.getElementById('dropdownContainer');
            // Create a new label
            var newLabel = document.createElement('label');
            newLabel.innerText = `Nama Obat ${counter}: `;
            container.appendChild(newLabel);
            // Create a new dropdown
            var newDropdown = document.createElement('select');
            newDropdown.name = 'obat[]';
            newDropdown.innerHTML = '<?php include 'controller/transaksi/fetchObat.php'; ?>';
            container.appendChild(newDropdown);
            container.appendChild(document.createElement('br')); // Add a line break for
            counter++; // Increment the
        }
    </script>
</head>
<body>
    <h1>Transaksi Klinik</h1>
    <!-- <h2>Select a obat</h2> -->
    <form action="controller/transaksi/createTransaksi.php" method="post">
        <label for="pasien">Nama Pasien:</label>
        <select id="pasien" name="pasien">
            <?php include 'controller/transaksi/fetchPasien.php'; ?>
        </select> <br><br>
        <label for="dokter">Nama Dokter:</label>
        <select id="dokter" name="dokter">
            <?php include 'controller/transaksi/fetchDokter.php'; ?>
        </select> <br><br>
        <label for="obat">Nama Obat 1: </label>
        <select id="obat" name="obat[]">
            <?php include 'controller/transaksi/fetchObat.php'; ?>
        </select> <br>
        <div id="dropdownContainer"></div>
        <button type="button" onclick="addDropdown()">Add Obat</button><br><br>
        <label for="diagnosa">Diagnosa:</label>
        <input type="text" id="diagnosa" name="diagnosa"><br><br>
        <label for="catatan">Catatan:</label>
        <input type="text" id="catatan" name="catatan"><br><br>
        <input type="submit" value="Submit">
    </form>
    <tbody>
        <?php include 'controller/transaksi/readTransaksi.php';?>
    </tbody>
</body>
</html>