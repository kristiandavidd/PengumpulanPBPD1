<?php
require_once 'lib/db_login.php';
$phone_number = $_GET['phone_number'];

if ($phone_number == '') {
    echo "";
}

// TODO 6 : lakukan validasi dengan mengambil apakah phone_number sudah ada (hint: query select dengan where)
    $query = " SELECT phone_number FROM profile_books WHERE phone_number ='".$phone_number."' ";
    $result = $db->query($query);
    if(!$result){
        die("Could not query the database: <br />". $db->error ."<br> Query: ".$query);
    }

    if($result->num_rows != 0){
        echo "Phone number is used by someone.";
    } else {
        echo "Phone number is available.";
    }

    $result->free();
    $db->close();
?>