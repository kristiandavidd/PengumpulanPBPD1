<!-- Nama       : Fendi Ardianto -->
<!-- NIM        : 24060122130077 -->
<!-- Lab        : D1 -->
<!-- Tanggal    : 27 September 2024 -->

<?php
require_once('../lib/db_login.php');

$name = isset($_POST['name']) ? $db->real_escape_string($_POST['name']) : '';
$address = isset($_POST['address']) ? $db->real_escape_string($_POST['address']) : '';
$city = isset($_POST['city']) ? $db->real_escape_string($_POST['city']) : '';


// Assign a query
$query = "INSERT INTO customers VALUES ('', '$name',  '$address', '$city')";
$result = $db->query($query);

if (!$result) {
    echo 'div class="alert alert-danger alert-dismissible"><strong>Error! </strong> Could not query the database <br>'.$db->error.'<br></div>';
} else {
    echo '<div class="alert alert-success alert-dismissible"><strong>Success! </strong> Data has been added.<br>
    Name: '.$_POST['name'].'<br>
    Address: '.$_POST['address'].'<br>
    City: '.$_POST['city'].'<br></div>';
}

// Close DB Connection
$db->close();
?>