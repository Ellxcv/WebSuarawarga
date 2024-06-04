<?php
require_once '../vendor/autoload.php';

use Dompdf\Dompdf;

// Koneksi ke database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$dbname = "pengaduan_keluhan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM petisi"; // Sesuaikan nama tabel jika berbeda
$result = $conn->query($sql);

// Membuat objek Dompdf
$dompdf = new Dompdf();

// Mengatur HTML yang akan dicetak
$html = "<html><body>";
$html .= "<h1>Daftar Petisi</h1>";
$html .= "<table border='1' cellspacing='0' cellpadding='10'>";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<th>ID Petisi</th>";
$html .= "<th>Judul</th>";
$html .= "<th>Deskripsi</th>";
$html .= "<th>Status</th>";
$html .= "</tr>";
$html .= "</thead>";
$html .= "<tbody>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $html .= "<tr>";
        $html .= "<td>" . htmlspecialchars($row["ID Petisi"]) . "</td>";
        $html .= "<td>" . htmlspecialchars($row["Judul"]) . "</td>";
        $html .= "<td>" . htmlspecialchars($row["Deskripsi"]) . "</td>";
        $html .= "<td>" . htmlspecialchars($row["Status"]) . "</td>";
        $html .= "</tr>";
    }
} else {
    $html .= "<tr><td colspan='4'>Tidak ada data</td></tr>";
}

$html .= "</tbody>";
$html .= "</table>";
$html .= "</body></html>";

// Memasukkan HTML ke Dompdf
$dompdf->loadHtml($html);

// Mengatur ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');

// Render PDF
$dompdf->render();

// Output PDF ke browser
$dompdf->stream("daftar_petisi.pdf", array("Attachment" => false));

// Tutup koneksi database
$conn->close();
?>
