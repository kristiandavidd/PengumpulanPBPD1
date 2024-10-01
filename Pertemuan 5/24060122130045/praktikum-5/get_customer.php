<!-- Nama : Muhammad Naufal Rifqi Setiawan -->
<!-- NIM : 24060122130045 -->
<!-- Tanggal : 01/10/2024 -->

<?php

require_once('./lib/db_login.php');
$customerid = $_GET['id'];

// TODO 1: Ambil value dari query string parameter id
$query = "SELECT * FROM customers WHERE customerid = " . $customerid;

// TODO 2: Tuliskan dan eksekusi query untuk mendapatkan informasi customer
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}

// TODO 3: Tuliskan response
while($row = $result->fetch_object()) {
    echo 'Name: ' . $row->name . '<br>';
    echo 'Email: ' . $row->address . '<br>';
    echo 'City: ' . $row->city . '<br>';
}

// TODO 4: Dealokasi variabel dan tutup koneksi database
$result->free();
$db->close();
?>