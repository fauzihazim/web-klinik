<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Web Klinik | Obat</title>
    <link rel="stylesheet" href="./css/stylesheet.css">
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
    <h2 class="m-10">Tambah Data Obat</h2>
    <form class="mt-30" action="controller/obat/createObat.php" method="post">
        <div class="input-group mb-3 start-50 translate-middle" style="width: 80%;">
            <span class="input-group-text" for="namaObat">Nama Obat :</span>
            <input type="text" class="form-control" id="namaObat" name="namaObat" placeholder="namaObat" aria-label="namaObat" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 start-50 translate-middle" style="width: 80%;">
            <span class="input-group-text" for="stokObat">Stok Obat :</span>
            <input type="number" class="form-control" id="stokObat" name="stokObat" placeholder="stokObat" aria-label="stokObat" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3 start-50 translate-middle" style="width: 80%;">
            <span class="input-group-text" for="hargaObat">Harga Obat :</span>
            <input type="number" class="form-control" id="hargaObat" name="hargaObat" placeholder="hargaObat" aria-label="hargaObat" aria-describedby="basic-addon1">
        </div>
        <div class="mb-3">
            <input type="submit" value="Create" class="btn btn-primary m-10">
        </div>
    </form>
    <tbody>
        <?php include 'controller/obat/readObat.php';?>
    </tbody>
</body>
</html>