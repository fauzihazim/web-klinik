<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Web Klinik | Pasien</title>
    <link rel="stylesheet" href="./css/stylesheet.css">
    <!-- Load the navigation bar using JavaScript -->
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
</head>
<body>
    <div id="navbar"></div>
    <h2 class="m-10">Tambah Data Pasien</h2>
    <form class="mt-30" action="controller/pasien/createPasien.php" method="post">
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
        <input class="btn btn-primary m-10" type="submit" value="Create">
    </form>
    <tbody>
        <?php include 'controller/pasien/readPasien.php';?>
    </tbody>
</body>
</html>