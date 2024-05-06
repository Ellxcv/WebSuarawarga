<?php
session_start(); // Mulai session

// Set username dan password yang diharapkan
$expected_username = "mizaell";
$expected_password = "miegoreng";

// Cek apakah formulir login sudah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan verifikasi login
    if ($username === $expected_username && $password === $expected_password) {
        // Login berhasil, set session
        $_SESSION["username"] = $username;
        
        // Set cookie jika login berhasil
        setcookie("username", $username, time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari

        // Redirect ke halaman index.php setelah login sukses
        header("Location: index.php");
        exit; // Pastikan untuk menghentikan eksekusi script setelah melakukan redirect
    } else {
        // Jika login gagal, bisa tampilkan pesan error atau melakukan tindakan lainnya
        $login_error = "Username atau password salah. Silakan coba lagi.";
    }
}

// Variabel PHP untuk menyimpan nilai username yang mungkin diisi oleh pengguna
$display_username = isset($_POST['username']) ? $_POST['username'] : '';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style/login.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />

    <!-- Javascript -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mengecek session
        <?php if(isset($_SESSION["username"])): ?>
            alert("Session 'username' telah diset dengan nilai: <?php echo $_SESSION["username"]; ?>");
        <?php else: ?>
            alert("Session 'username' belum diset. Mungkin pengguna belum login.");
        <?php endif; ?>

        // Mengecek cookie
        <?php if(isset($_COOKIE["username"])): ?>
            alert("Cookie 'username' telah diset dengan nilai: <?php echo $_COOKIE["username"]; ?>");
        <?php else: ?>
            alert("Cookie 'username' belum diset. Mungkin pengguna belum login atau cookie telah kadaluarsa.");
        <?php endif; ?>
    });
    </script>
  </head>
  <body>
  

    <div class="wrapper">
    <form action="" method="post"> <!-- tambahkan method="post" untuk menentukan metode pengiriman form -->
    <h1>Login</h1>
    <div class="input-box">
        <input type="text" name="username" placeholder="Username" required /> <!-- tambahkan name="username" -->
        <i class="bx bx-user-circle"></i>
    </div>
    <div class="input-box">
        <input type="password" name="password" placeholder="Password" required /> <!-- tambahkan name="password" -->
        <i class="bx bx-lock-alt"></i>
    </div>

    <div class="remember-forget">
        <label for="">
            <input type="checkbox" />
            Remember me
        </label>
        <a href="">Forgot password?</a>
    </div>
    <button type="submit" class="btn">Login</button>
    <div class="register-link">
        <p>Don't have an account? <a href="register.html">Register</a></p>
    </div>
</form>
    </div>
  </body>
</html>
