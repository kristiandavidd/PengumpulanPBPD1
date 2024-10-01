<!-- Nama       : Nashwan Adenaya -->
<!-- NIM        : 24060121130084 -->
<!-- Lab        : D1 -->
<!-- Tanggal    : 02 Oktober 2024-->
<!-- Deskripsi  : Responsi -->


<?php
// TODO 1 : SETUP & CONNECT DATABASE
$db_host = 'localhost:3308';
$db_database = 'db_profile_book';
$db_username = 'root';
$db_password = '';

$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
    die('Could not connect to the database: <br/> Ubah port pada host' . $db->connect_error);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
