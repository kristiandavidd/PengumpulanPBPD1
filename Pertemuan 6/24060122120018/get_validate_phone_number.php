<?php
require_once 'lib/db_login.php';
$phone_number = $_GET['phone_number'];

if ($phone_number == '') {
    echo"";
    exit;
}

$query = "SELECT * FROM profile_books WHERE phone_number = '$phone_number'";
$result = $db->query($query);

?>
