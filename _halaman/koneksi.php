<?php
$setTemplate = false;
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perum11_rck";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel m_lokasi
$sql = "SELECT id_lokasi, id_perumahan, lokasi, marker, lat, lng, geojson FROM m_lokasi";
$result = $conn->query($sql);

// Jika data ditemukan, kirimkan sebagai respons JSON
if ($result->num_rows > 0) {
    $lokasiData = array();
    while ($row = $result->fetch_assoc()) {
        $lokasiData[] = $row;
    }
    echo json_encode($lokasiData);
} else {
    echo "Tidak ada data lokasi yang ditemukan.";
}
$conn->close();
?>
