<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webklinik";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO transaksi (idPasien, idDokter, harga, diagnosa, catatan) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiss", $pasien, $dokter, $harga, $diagnosa, $catatan);
    
    // Data Pasien
    $pasien = $_POST['pasien'];
    echo "ID Pasien: " . $pasien;
    // Data Dokter
    $dokter = $_POST['dokter'];
    echo "ID Dokter: " . $dokter;
    // Diagnosa
    $diagnosa = $_POST['diagnosa'];
    echo "ID DIagnosa: " . $diagnosa;
    $catatan = $_POST['catatan'];
    echo "ID Catatan: " . $catatan;

    // Harga
    // Select Harga Obat
    $obat = isset($_POST['obat']) ? $_POST['obat'] : [];
    // Prepare the SQL statement with placeholders
    $placeholders = implode(',', array_fill(0, count($obat), '?'));
    $sqlGetHargaObat = "SELECT harga FROM obat WHERE idObat IN ($placeholders)"; // Prepare the statement
    $stmtGetHargaObat = $conn->prepare($sqlGetHargaObat); // Bind the parameters dynamically
    $types = str_repeat('i', count($obat)); // Assuming all obat are integers
    $stmtGetHargaObat->bind_param($types, ...$obat); // Execute the statement
    $stmtGetHargaObat->execute();
    // Get the result
    $result = $stmtGetHargaObat->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $hargaObat[] = $row["harga"];
        }
    } else {
        echo "No results found for the provided IDs.";
    }
    $stmtGetHargaObat->close();
    // Select Harga Dokter
    $stmtSelectHargaDokter = $conn->prepare("SELECT harga FROM dokter WHERE idDokter = ?");
    $stmtSelectHargaDokter->bind_param("i", $dokter);
    $stmtSelectHargaDokter->execute();
    $stmtSelectHargaDokter->bind_result($hargaDokter);
    if (!$stmtSelectHargaDokter->fetch()) {
        echo "No results found.";
    }
    $stmtSelectHargaDokter->close();
    // Total Harga
    $totalHargaObat = array_sum($hargaObat);
    $harga = $totalHargaObat + $hargaDokter;
    
    $obat = isset($_POST['obat']) ? $_POST['obat'] : [];
    if (!empty($obat)) {
        echo "Additional Category IDs: " . implode(', ', $obat);
    }

    // Set parameters and execute
    $stmt->execute();
    $stmt->close();

    // Create Obat Keluar
    $stmtInsertObatKeluar = $conn->prepare("INSERT INTO obatkeluar (idTransaksi, idObat) VALUES (?, ?)");
    $stmtInsertObatKeluar->bind_param("ii", $lastId, $idObat); // Loop through the array and execute the insert statement
    $lastId = mysqli_insert_id($conn);
    foreach ($obat as $idObat) { 
        $stmtInsertObatKeluar->execute(); 
    }
    $stmtInsertObatKeluar->close();

    // Decrease amount of medicine after sold
    $stmtUpdateStokObat = $conn->prepare("UPDATE obat SET stokObat = stokObat - 1 WHERE idObat = ? AND stokObat >= 1");
    $stmtUpdateStokObat->bind_param("i", $idObat);
    
    // Execute the statement
    foreach ($obat as $idObat) { 
        $stmtUpdateStokObat->execute(); 
    }

    $stmtUpdateStokObat->close();

    $conn->close();
    header("Location: http://localhost/webklinik/transaksi.php");
    exit();
?>