<?php
require_once 'lib/db_login.php';
$phone_number = $_GET['phone_number'];

$query = "SELECT * FROM profiles WHERE phone_number = '$phone_number'";
$result = $db->query($query);

if ($phone_number == $result->fetch_object()->phone_number) {
    echo('true');
}
else {
    echo('false');
}

// TODO 6 : lakukan validasi dengan mengambil apakah phone_number sudah ada (hint: query select dengan where)

