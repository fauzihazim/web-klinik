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
    $stmt = $conn->prepare("INSERT INTO obat (namaObat, stokObat, harga) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $namaObat, $stokObat, $hargaObat);

    // Set parameters and execute
    $namaObat = $_POST['namaObat'];
    $stokObat = $_POST['stokObat'];
    $hargaObat = $_POST['hargaObat'];
    $stmt->execute();

    $stmt->close();
    $conn->close();

    header("Location: http://localhost/webklinik/obat.php");
    exit();
?>