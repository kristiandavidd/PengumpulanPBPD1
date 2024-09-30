<?php
require_once('./db_login.php'); // Memasukkan file db_login.php untuk koneksi ke database

// Mengambil data dari form dan menghindari injeksi SQL dengan real_escape_string
$name = $db->real_escape_string($_POST['name']);
$address = $db->real_escape_string($_POST['address']);
$city = $db->real_escape_string($_POST['city']);

// Menyusun query untuk memasukkan data ke tabel customers
$query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";

// Menjalankan query
$result = $db->query($query);

// Mengecek apakah query berhasil dijalankan atau tidak
if (!$result) {
    // Jika gagal, tampilkan pesan error
    echo '<div class="alert alert-danger alert-dismissible">';
    echo '<strong>Error!</strong> Could not query the database<br>';
    echo $db->error . '<br>query = ' . $query;
    echo '</div>';
} else {
    // Jika berhasil, tampilkan pesan sukses
    echo '<div class="alert alert-success alert-dismissible">';
    echo '<strong>Success!</strong> Data has been added.<br>';
    echo 'Name: ' . $_POST['name'] . '<br>';
    echo 'Address: ' . $_POST['address'] . '<br>';
    echo 'City: ' . $_POST['city'] . '<br>';
    echo '</div>';
}

// Menutup koneksi database
$db->close();
?>
