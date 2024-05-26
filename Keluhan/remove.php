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

// Proses penghapusan data jika tombol "Remove" diklik
if (isset($_POST['id_remove'])) {
    $id_remove = $_POST['id_remove'];

    // Buat kueri SQL untuk menghapus data
    $sql_delete = "DELETE FROM keluhan WHERE id_pengaduan = '$id_remove'";

    // Eksekusi kueri
    if ($conn->query($sql_delete) === TRUE) {
        // Data berhasil dihapus, redirect kembali ke halaman keluhan.php
        header("Location: keluhan.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
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
    <title>Daftar Keluhan</title>
    <link rel="stylesheet" href="style/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <!-- Tabel untuk menampilkan data keluhan -->
    <div class="tabel-wrapper">
        <div class="tabel-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data dari setiap baris
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_pengaduan"] . "</td>";
                            echo "<td>" . $row["deskripsi"] . "</td>";
                            echo "<td><a href=\"keluhan.php?id_remove=" . $row["id_pengaduan"] . "\" onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Remove</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Tidak ada data keluhan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
