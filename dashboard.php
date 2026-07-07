<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat Datang, <?php echo $_SESSION['email']; ?>!</h1>
    <p>Kamu berhasil masuk ke sistem.</p>
    <a href="logout.php">Logout</a>
</body>
</html>