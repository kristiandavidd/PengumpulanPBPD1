<?php
require_once 'lib/db_login.php';
$phone_number = $_GET['phone_number'];

if ($phone_number == '') {
    echo "";
    exit;
}

// TODO 6 : lakukan validasi dengan mengambil apakah phone_number sudah ada (hint: query select dengan where)
$query = "SELECT id FROM profile_books WHERE phone_number='$phone_number'";
$result = $db->query($query);
if ($result->num_rows == 0) {
    echo '<p class="text-success"> Nomor telepon bisa digunakan! </p>';
} else {
    echo '<p class="text-danger"> Nomor telepon sudah digunakan! </p>';
}