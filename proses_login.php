<?php
session_start();
// 1. Mengambil perintah koneksi dari file koneksi.php
include 'koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 2. Mengambil input email & password dari form login.html
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    // 3. Mencari apakah ada email yang cocok di tabel database
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");
    
    if (mysqli_num_rows($query) === 1) {
        $row = mysqli_fetch_assoc($query);
        
        // 4. MENCETAK FUNGSI NYATA: 
        // Mencocokkan password inputan dengan password_hash terenkripsi yang ada di database
        if (password_verify($password, $row['password'])) {
            // 5. Jika cocok, simpan data ke Session pembuka halaman dashboard
            $_SESSION['login'] = true;
            $_SESSION['email'] = $row['email'];

            echo "<script>alert('Login Berhasil!'); window.location='dashboard.php';</script>";
            exit;
        }
    }
    // Jika tidak cocok atau email tidak terdaftar
    echo "<script>alert('Email atau password salah!'); window.location='login.html';</script>";
}
?>