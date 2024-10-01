<!-- Nama       : Kristian David Adi Prasetya -->
<!-- NIM        : 24060121130049 -->
<!-- Lab        : B2 -->
<!-- Tanggal    : 6 Oktober 2023-->
<!-- Deskripsi  : membuat program berbasis PHP dengan bantuan AJAX-->

<?php 
$db_host = 'localhost';
$db_database = 'bookdb';
$db_username = 'root';
$db_password = '';

//  Connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
    die('Could not connect to the database: <br/>' . $db->connect_error);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>