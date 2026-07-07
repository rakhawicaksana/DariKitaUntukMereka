<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    // Enkripsi password
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    $cek_email = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>alert('Email sudah terdaftar!'); window.location='register.html';</script>";
    } else {
        $query = "INSERT INTO users (email, password) VALUES ('$email', '$password_hashed')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location='login.html';</script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}
?>