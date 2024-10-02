<?php
require_once 'lib/db_login.php';
$phone_number = $_GET['phone_number'];

if ($phone_number == '') {
    echo "Phone number cannot be empty";
    exit;
} else {
    $query = "SELECT phone_number FROM profile_books WHERE phone_number = ".$phone_number;
    $result = $db->query($query);

    if (!$result) {
        die ("Could not query to the database: <br>".$db->error);
    } else {
        $result = $result->fetch_object();
        if ($result !== null) {
            echo "Phone number already been used";
            exit;
        }
    }
}

// TODO 6 : lakukan validasi dengan mengambil apakah phone_number sudah ada (hint: query select dengan where)

