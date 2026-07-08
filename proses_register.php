<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    // Enkripsi password
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    $cek_email = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");

    if (!$cek_email) {
        die("Query gagal: " . mysqli_error($koneksi));
    }

    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.location='register.html';</script>";
    } else {
        $query = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password_hashed')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location='login.html';</script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}
?>