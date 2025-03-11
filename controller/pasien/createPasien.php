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
    $stmt = $conn->prepare("INSERT INTO pasien (namaPasien, beratBadanPasien, umurPasien) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $namaPasien, $beratBadanPasien, $umurPasien);

    // Set parameters and execute
    $namaPasien = $_POST['namaPasien'];
    $beratBadanPasien = $_POST['beratBadanPasien'];
    $umurPasien = $_POST['umurPasien'];
    $stmt->execute();

    $stmt->close();
    $conn->close();

    header("Location: http://localhost/webklinik");
    exit();
?>