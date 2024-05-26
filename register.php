<?php
session_start(); // Mulai session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir registrasi
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi input
    if ($password === $confirm_password) {
        // Baca data pengguna dari sesi
        $users = isset($_SESSION['users']) ? $_SESSION['users'] : [];

        // Tambahkan pengguna baru
        $users[] = [
            'full_name' => $full_name,
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'password' => password_hash($password, PASSWORD_DEFAULT) // Simpan password yang sudah di-hash
        ];

        // Simpan kembali ke sesi
        $_SESSION['users'] = $users;

        // Redirect ke halaman login
        header("Location: login.php");
        exit;
    } else {
        $register_error = "Password dan konfirmasi password tidak cocok.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/register.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <form action="register.php" method="post">
            <h1>Registration</h1>
            <?php if (isset($register_error)) echo "<p style='color:red;'>$register_error</p>"; ?>
            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="full_name" placeholder="Full Name" required>
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="input-field">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class="bx bx-user-circle"></i>
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class="bx bxl-gmail"></i>
                </div>
                <div class="input-field">
                    <input type="number" name="phone" placeholder="Phone Number" required>
                    <i class="bx bx-phone"></i>
                </div>
            </div>
            <div class="input-box">
                <div class="input-field">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="bx bx-lock"></i>
                </div>
                <div class="input-field">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <i class="bx bx-lock"></i>
                </div>
            </div>
            <label><input type="checkbox" required>I hereby declare that the above information provided is true and correct</label>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>
</body>
</html>
