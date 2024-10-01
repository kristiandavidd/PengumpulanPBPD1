<?php
require_once 'lib/db_login.php';
$phone_number = $_GET['phone_number'];

if ($phone_number == '') {
    echo "";
    exit;
}

// TODO 6 : lakukan validasi dengan mengambil apakah phone_number sudah ada (hint: query select dengan where)
$query = "SELECT * FROM phone_number";
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}

// TODO 4: Dealokasi variabel dan tutup koneksi database
$result->free();
$db->close();
?>