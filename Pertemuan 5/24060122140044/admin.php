<?php
// File       : admin.php
// Deskripsi  : halaman ini hanya dapat ditampilkan jika user telah login, jika belum akan di-redirect ke halaman login.php

session_start(); // Inisialisasi session
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
include('../header.html');
?>
<br>
<div class="card">
    <div class="card-header">Admin Page</div>
    <div class="card-body">
        <p>Welcome ...</p>
        <p>You are logged in as <b><?php echo $_SESSION['username']; ?></b></p>
        <br><br>
        <a class="btn btn-primary" href="logout.php">Logout</a>
    </div>
</div>
<br>
<?php include('../footer.html'); ?>
