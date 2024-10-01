<?php
// TODO 1 : SETUP & CONNECT DATABASE

$db_host = 'localhost';
$db_database = 'responsipbp';
$db_username = 'root';
$db_password = '';

//  Connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
    die('Could not connect to the database: <br/>' . $db->connect_error);
}else{
}


function test_input($data)
{
    $data = trim($data);
    // $data = stripslashes($data);
    // $data = htmlspecialchars($data);
    return $data;
}
