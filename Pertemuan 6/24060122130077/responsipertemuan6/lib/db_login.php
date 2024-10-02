<?php
// TODO 1 : SETUP & CONNECT DATABASE
$db = new mysqli("localhost", "root", "", "profilebook");
if($db->connect_errno){
    die("Could not connect to database: <br>" . $db->connect_error);
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
