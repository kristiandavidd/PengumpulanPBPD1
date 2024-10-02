<?php
require_once 'lib/db_login.php';
$phone_number = $_GET['phone_number'];

$query = "SELECT phone_number FROM profile_books WHERE phone_number = '$phone_number'";
$result = $db->query($query);

if ($phone_number == $result->num_rows>0) {
    //send response to the client (js)
    echo "sudah";
}else{
    echo "belum";
}

// TODO 6 : lakukan validasi dengan mengambil apakah phone_number sudah ada (hint: query select dengan where)

