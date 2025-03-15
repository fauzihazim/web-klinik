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

    $sql = "SELECT * FROM obat";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1' class='table'>";
        echo "
        <thead>
            <tr class='table-primary'>
                <th>ID</th>
                <th>Nama Obat</th>
                <th>Stok Obat</th>
                <th>Harga</th>
                <th>Actions</th>
            </tr>
        </thead>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>".$row["idObat"]."</td>
            <td>".$row["namaObat"]."</td>
            <td>".$row["stokObat"]."</td>
            <td>".$row["harga"]."</td>
            <td>
                <a class='btn btn-danger' href='./controller/obat/deleteObat.php?id=".$row["idObat"]."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                <a class='btn btn-primary' href='./controller/obat/editObat.php?id=".$row["idObat"]."'>Edit</a>
            </td>";
            // echo "<td><a href='./controller/obat/editObat.php?id=".$row["idObat"]."'>Edit</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
?>