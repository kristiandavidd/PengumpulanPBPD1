<!-- 
 Nama: Tirza Aurellia Wijaya
 NIM: 24060122130047
 Tanggal Pengerjaan: 24 Sept 2024 -->
<?php
    session_start();
    if (isset($_SESSION['username'])) {
        # code...
        unset($_SESSION['username']);
        session_destroy();
    }
    header('Location: login.php')
?>