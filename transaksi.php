<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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