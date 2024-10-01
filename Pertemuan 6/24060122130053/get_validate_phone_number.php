<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 2 Oktober 2024
Lab : PBP D1
Responsi
-->
<?php
require_once 'lib/db_login.php';
$phone_number = $_GET['phone_number'];
$query = "SELECT * FROM profile_books WHERE phone_number = '$phone_number'";
$result = $db->query($query);
if ($phone_number == '') {
    echo "";
    exit;
}

// TODO 6 : lakukan validasi dengan mengambil apakah phone_number sudah ada (hint: query select dengan where)

