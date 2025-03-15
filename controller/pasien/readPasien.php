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

    $sql = "SELECT * FROM pasien";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "
        <table border='1' class='table'>";
        echo "
            <thead>
                <tr class='table-primary'>
                    <th scope='col'>ID</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Berat Badan</th>
                    <th scope='col'>Umur</th>
                    <th scope='col'>Created At</th>
                </tr>
            </thead>
        ";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["idPasien"]."</td><td>".$row["namaPasien"]."</td><td>".$row["beratBadanPasien"]."</td><td>".$row["umurPasien"]."</td><td>".$row["created_at"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
?>