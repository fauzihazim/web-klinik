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

// SQL query to fetch transaction details
$sql = "SELECT
    transaksi.idTransaksi,
    pasien.namaPasien,
    dokter.namaDokter,
    GROUP_CONCAT(obat.namaObat SEPARATOR ', ') AS obat,
    transaksi.harga,
    transaksi.diagnosa,
    transaksi.catatan,
    transaksi.create_at
FROM
    transaksi
JOIN
    pasien ON transaksi.idPasien = pasien.idPasien
JOIN
    dokter ON transaksi.idDokter = dokter.idDokter
LEFT JOIN
    obatkeluar ON transaksi.idTransaksi = obatkeluar.idTransaksi
LEFT JOIN
    obat ON obatkeluar.idObat = obat.idObat
GROUP BY
    transaksi.idTransaksi, 
    pasien.namaPasien, 
    dokter.namaDokter, 
    transaksi.harga, 
    transaksi.diagnosa, 
    transaksi.catatan, 
    transaksi.create_at";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div  class='overflow-x-scroll'>";
    echo "<table border='1' class='table'>
            <tr class='table-primary'>
                <th>idTransaksi</th>
                <th>nama pasien</th>
                <th>nama dokter</th>
                <th>obat</th>
                <th>Harga</th>
                <th>diagnosa</th>
                <th>catatan</th>
                <th>create_at</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "
            <tr>
                <td>" . $row["idTransaksi"] . "</td>
                <td>" . $row["namaPasien"] . "</td>
                <td>" . $row["namaDokter"] . "</td>
                <td>" . $row["obat"] . "</td>
                <td>" . $row["harga"] . "</td>
                <td>" . $row["diagnosa"] . "</td>
                <td>" . $row["catatan"] . "</td>
                <td>" . $row["create_at"] . "</td>
            </tr>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "0 results";
}

$conn->close();
?>
