<?php
// TODO 1 : SETUP & CONNECT DATABASE
$db_host = 'localhost';
$db_database = 'db';
$db_username = 'root';
$db_password = '';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
