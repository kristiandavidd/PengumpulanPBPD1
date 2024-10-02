<?php
require_once 'lib/db_login.php';
$phone_number = $_GET['phone_number'];

if ($phone_number == '') {
    echo "";
    exit;
}

// TODO 6 : lakukan validasi dengan mengambil apakah phone_number sudah ada (hint: query select dengan where)

$query = " SELECT * FROM profile_books WHERE phone_number=" .$phone_number;
$result = $db->query($query);

if ($phone_number == $result) {
    $error_nama = "Phone number is used by someone";
} else {
    $error_nama = "Phone number is available";
}

?>