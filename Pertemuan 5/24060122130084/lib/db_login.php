<!-- Nama       : Nashwan Adenaya -->
<!-- NIM        : 24060121130084 -->
<!-- Lab        : D1 -->
<!-- Tanggal    : 28 September 2024-->
<!-- Deskripsi  : membuat program berbasis PHP dengan bantuan AJAX-->

<?php 
$db_host = 'localhost:3308';
$db_database = 'bookdb';
$db_username = 'root';
$db_password = '';

//  Connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
    die('Could not connect to the database: <br/> Ubah port pada host' . $db->connect_error);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>