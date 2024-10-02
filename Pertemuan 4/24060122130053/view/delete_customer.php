<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 25 September 2024
Lab : PBP D1
Tugas Pertemuan 4
-->

<?php
// File: delete_customer.php
require_once('../lib/db_login.php'); // Pastikan jalur file koneksi database sudah benar

// Cek apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Ambil nilai id dari URL

    // Query untuk menghapus customer berdasarkan customerid
    $query = "DELETE FROM customers WHERE customerid = $id";

    // Eksekusi query
    $result = $db->query($query);

    if (!$result) {
        die("Could not query the database: <br>" . $db->error);
    } else {
        // Jika berhasil, arahkan ke halaman list customer (misalnya `view_customer.php`)
        header('Location: view_customer.php');
        exit;
    }
} else {
    // Jika tidak ada parameter id, redirect atau tampilkan pesan error
    echo "No customer ID specified.";
}

$db->close();
?>
