<?php

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

// Ambil ID petisi dari URL
$id = $_GET['id'];

// Periksa apakah ID telah diterima dari URL
if (!isset($id)) {
    // Jika tidak, redirect kembali ke halaman petisi.php
    header("Location: petisi.php");
    exit;
}

// Ambil data petisi dari database berdasarkan ID
$sql = "SELECT * FROM petisi WHERE id = '$id'"; // Perhatikan penggunaan tanda kutip
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Data ditemukan, ambil baris data
    $row = $result->fetch_assoc();
} else {
    // Data tidak ditemukan, redirect kembali ke halaman petisi.php
    header("Location: petisi.php");
    exit;
}

// Persiapkan variabel $stmt
$stmt = null;

// Proses form jika POST request diterima
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $deskripsi = $_POST['deskripsi'];

    // Update data di database tanpa mengubah foto
    $sql_update = "UPDATE petisi SET deskripsi=? WHERE id=?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("si", $deskripsi, $id);

    // Eksekusi statement jika sudah didefinisikan
    if ($stmt !== null && $stmt->execute()) {
        // Jika update berhasil, redirect kembali ke halaman petisi.php
        header("Location: petisi.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Tutup statement jika sudah didefinisikan
    if ($stmt !== null) {
        $stmt->close();
    }
}

// Tutup koneksi database
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <!-- Head content -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="../style/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
<div class="sidebar">
        <div class="logo">
            
        </div>
        <ul class="menu">
            <li><a href="../admin.php"><i class="bx bxs-dashboard"></i><span>Dashboard</span></a></li>
            <li><a href="keluhan.php"><i class="bx bxs-objects-vertical-bottom"></i><span>Pengaduan dan Keluhan</span></a></li>
            <li class="active"><a href="input.php"><i class="bx bx-notepad"></i><span>Input Data</span></a></li>
            <li><a href="../Petisi/petisi.php"><i class="bx bxs-message-dots"></i><span>Petisi dan Kampanye</span></a></li>
            <li><a href="#"><i class="bx bxs-log-out"></i><span>Logout</span></a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header-wrapper">
            <div class="header-title">
                <span>Edit Data</span>
                <span>Dashboard</span>
            </div>
            <div class="user-info">
                <div class="search">
                    <i class="bx bx-search-alt"></i>
                    <input type="text" placeholder="Search">
                </div>
                <img src="../image/government64px.png" alt="">
            </div>
        </div>
        <div class="tabel-wrapper">
            <h3 class="main-title">Edit Data</h3>
            <div class="form-wrapper">
                <!-- Form untuk pengeditan data -->
    <form action="" method="post">
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"><?php echo $row["deskripsi"]; ?></textarea>
        </div>

        <button type="submit">Simpan Perubahan</button>
    </form>
            </div>
        </div>
    </div>
</body>
</html>
