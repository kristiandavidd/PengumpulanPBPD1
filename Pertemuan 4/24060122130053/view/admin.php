<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 25 September 2024
Lab : PBP D1
Tugas Pertemuan 4
-->

<?php
//File: admin.php
//Deskripsi: halaman ini hanya dapat ditampilkan jika user telah login, jika belum akan di-redircet ke halaman login.php
session_start(); //inisialisasi session
if (!isset($_SESSION['username'])){
    header('Location: login.php');
}

include('../header.html') ?>
<br>
<div class="card">
    <div class="card-header">Admin Page</div>
    <div class="card-body">
        <p>Welcome ... </p>
        <p>You are logged in as <b><?php echo $_SESSION['username']; ?></p> <br><br>
        <a class="btn btn-primary" href="logout.php">Logout</a>
    </div>
</div>

<?php include('../footer.html') ?>