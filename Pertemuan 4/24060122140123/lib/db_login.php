<!-- 
Nama                   : Alya Safina
NIM                    : 24060122140123
Tanggal pengerjaan     : 25 September 2024 
-->

<?php
    // Inisialisasi variabel koneksi database
    $db_host = 'localhost';
    $db_database = 'bookdb';
    $db_username = 'root';
    $db_password = '';

    // Koneksi ke database
    $db = new mysqli($db_host, $db_username, $db_password, $db_database);
    // Cek apakah koneksi berhasil
    if ($db->connect_errno) {
        die("Could not connect to the database: <br />" . $db->connect_error);
    }
    
    // Fungsi test_input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>