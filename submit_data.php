<?php
$servername = "localhost"; // Ubah jika server database Anda berbeda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "pengaduan_keluhan"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$status = 'pending'; // Set status awal sebagai 'pending'

// Buat query
$sql = "INSERT INTO petisi (judul, deskripsi, status) VALUES ('$judul', '$deskripsi', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirect kembali ke halaman utama atau halaman lain
header("Location: index.php");
exit();
?>
