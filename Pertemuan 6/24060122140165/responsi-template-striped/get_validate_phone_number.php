<?php
require_once 'lib/db_login.php';
$phone_number = $_GET['phone_number'];

if ($phone_number == '') {
    echo "";
    exit;
}

// TODO 6: lakukan validasi dengan mengambil apakah phone_number sudah ada
$query = "SELECT * FROM profile_books WHERE phone_number = '$phone_number'";
$result = $db->query($query);

if ($result->num_rows > 0) {
    echo "Phone number sudah terdaftar.";
} else {
    echo "Phone number belum terdaftar.";
}
?>
