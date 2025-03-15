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

    $sql = "SELECT * FROM dokter";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1' class='table'>";
        echo "
        <thead>
            <tr class='table-primary'>
                <th>ID</th>
                <th>Nama</th>
                <th>Spesialisasi</th>
                <th>Harga</th>
                <th>Created At</th>
            </tr>
        </thead>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["idDokter"]."</td><td>".$row["namaDokter"]."</td><td>".$row["spesialisasi"]."</td><td>".$row["harga"]."</td><td>".$row["created_at"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
?>