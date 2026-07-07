<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dari_kita_untuk_mereka";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>