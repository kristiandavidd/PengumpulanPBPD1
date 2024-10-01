<!-- Nama: Happy Desita W. -->
<!-- NIM: 24060122120023 -->
<!-- Tanggal Pengerjaan: 24 September 2024 -->
<!-- Nama File: logout.php -->

<?php 
    // Inisialisasi session
    session_start();

    // Hapus username session
    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
        session_destroy();
    }

    // Redirect ke halaman login
    header('Location: login.php');
?>