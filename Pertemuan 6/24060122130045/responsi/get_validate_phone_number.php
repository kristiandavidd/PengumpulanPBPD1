<?php
require_once 'lib/db_login.php';
$phone_number = $_GET['phone_number'];

if ($phone_number == '') {
    echo "";
    exit;
}

// TODO 6 : lakukan validasi dengan mengambil apakah phone_number sudah ada (hint: query select dengan where)

$sql = "SELECT * FROM `profile_books` WHERE `phone_number` = '$phone_number'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "Phone number already exists!";
} else {
    echo "Phone number is available!";
}
?>
