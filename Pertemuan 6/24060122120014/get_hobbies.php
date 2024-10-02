<?php
require_once 'lib/db_login.php';

// TODO 3 : Mengambil data hobi dari tabel 'hobbies'
//$hobbies_id = $_GET['id'];

// Assign a query
$query = " SELECT * FROM hobbies ";
// $query = " SELECT * FROM hobbies WHERE id=" .$hobbies_id;
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br />".$db->error);
}   

// Eksekusi query kemudian iterasi setiap loopnya yang melakukan echo dibawah ini
// echo  "<option value='$row->id'>$row->name</option>";

// Fetch and display the results
while ($row = $result->fetch_object()) {
    echo "<option value='$row->id'>$row->name</option>";
}

$result->free();
$db->close();
?>