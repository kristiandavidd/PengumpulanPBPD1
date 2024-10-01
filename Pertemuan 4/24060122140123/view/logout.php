<!-- 
Nama                   : Alya Safina
NIM                    : 24060122140123
Tanggal pengerjaan     : 25 September 2024 
-->

<?php
    // Memulai sesi
    session_start();
    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
        // Menghancurkan sesi
        session_destroy();
    }
    // Beralih halaman
    header('Location: login.php')
?>