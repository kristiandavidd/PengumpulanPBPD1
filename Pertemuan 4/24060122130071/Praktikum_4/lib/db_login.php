<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 20 September 2024-->
<?php
$db_host = 'localhost';
$db_database = 'bookdb';
$db_username = 'root';
$db_password = '';

//Menghubungkan ke database
$conn = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>