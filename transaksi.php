<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Web Klinik | Transaksi</title>
    <script> 
        let counter = 2; // Initialize counter
        // function addDropdown() { 
        //     var container = document.getElementById('dropdownContainer');
        //     // Create a new label
        //     var newLabel = document.createElement('label');
        //     newLabel.innerText = `Nama Obat ${counter}: `;
        //     newLabel.classList.add('custom-label-class');
        //     container.appendChild(newLabel);
        //     // Create a new dropdown
        //     var newDropdown = document.createElement('select');
        //     newDropdown.name = 'obat[]';
        //     newDropdown.innerHTML = '<?php include 'controller/transaksi/fetchObat.php'; ?>';
        //     container.appendChild(newDropdown);
        //     container.appendChild(document.createElement('br')); // Add a line break for
        //     counter++; // Increment
        // }
        function addDropdown() {
            var container = document.getElementById('dropdownContainer');

            // Create the input group div
            var inputGroupDiv = document.createElement('div');
            inputGroupDiv.className = 'input-group mb-3 start-50 translate-middle dropdown';
            inputGroupDiv.style.width = '80%';

            // Create the span for the input group text
            var span = document.createElement('span');
            span.className = 'input-group-text';
            span.innerText = `Nama Obat ${counter}: `;
            inputGroupDiv.appendChild(span);

            // Create the dropdown (select element)
            var newDropdown = document.createElement('select');
            newDropdown.className = 'form-control';
            newDropdown.name = 'obat[]';
            newDropdown.innerHTML = '<?php include 'controller/transaksi/fetchObat.php'; ?>';
            inputGroupDiv.appendChild(newDropdown);

            // Append the input group div to the container
            container.appendChild(inputGroupDiv);

            // Increment the counter
            counter++;
        }
    </script>
    <script>
        fetch('navbar/navbar.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('navbar').innerHTML = data;

                // Determine the current page
                const currentPage = window.location.pathname.split('/').pop() || 'index.html';

                // Map of page names to nav item IDs
                const pageToNavId = {
                    'index.html': 'nav-pasien',
                    'dokter.php': 'nav-dokter',
                    'obat.php': 'nav-obat',
                    'transaksi.php': 'nav-transaksi',
                };

                // Get the corresponding nav item ID
                const navId = pageToNavId[currentPage];

                // Add the 'active' class to the appropriate nav item
                if (navId) {
                    const navItem = document.getElementById(navId);
                    if (navItem) {
                        navItem.classList.add('active');
                    }
                }
            });
    </script>
    <link rel="stylesheet" href="./css/stylesheet.css">
</head>
<body>
    <div id="navbar"></div>
    <h1>Transaksi Klinik</h1>
    <form class="mt-30" action="controller/transaksi/createTransaksi.php" method="post">
        <div class="input-group mb-3 start-50 translate-middle dropdown" style="width: 80%;">
            <span class="input-group-text" for="pasien">Nama Pasien :</span>
            <select id="pasien" class="form-control" name="pasien">
                <?php include 'controller/transaksi/fetchPasien.php'; ?>
            </select>
        </div>
        <div class="input-group mb-3 start-50 translate-middle dropdown" style="width: 80%;">
            <span class="input-group-text" for="dokter">Nama Dokter :</span>
            <select id="dokter" class="form-control" name="dokter">
                <?php include 'controller/transaksi/fetchDokter.php'; ?>
            </select>
        </div>
        <div class="input-group mb-3 start-50 translate-middle dropdown" style="width: 80%;">
            <span class="input-group-text" for="obat">Nama Obat :</span>
            <select id="obat" class="form-control" name="obat[]">
                <?php include 'controller/transaksi/fetchObat.php'; ?>
            </select>
        </div>
        <div id="dropdownContainer"></div>
        <div class="mb-3">
            <button class="btn btn-primary m-10" type="button" onclick="addDropdown()">Add Obat</button><br><br>
        </div>
        <div class="input-group mb-3 start-50 translate-middle" style="width: 80%;">
            <span class="input-group-text" for="diagnosa">Diagnosa :</span>
            <input type="text" class="form-control" id="diagnosa" name="diagnosa" placeholder="diagnosa" aria-label="diagnosa" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 start-50 translate-middle" style="width: 80%;">
            <span class="input-group-text" for="catatan">Catatan :</span>
            <input type="text" class="form-control" id="catatan" name="catatan" placeholder="catatan" aria-label="catatan" aria-describedby="basic-addon1">
        </div>
        <input class="btn btn-primary m-10" type="submit" value="Submit">
    </form>
    <tbody>
        <?php include 'controller/transaksi/readTransaksi.php';?>
    </tbody>
</body>
</html>