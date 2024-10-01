<?php
require_once 'lib/db_login.php';

// TODO 3 : Mengambil data hobi dari tabel 'hobbies'
        
// Eksekusi query kemudian iterasi setiap loopnya yang melakukan echo dibawah ini
// echo  "<option value='$row->id'>$row->name</option>";
if (isset($_GET['id'])) {
    $id = $db->real_escape_string($_GET['id']);
    $query = "SELECT * FROM hobbies";
    $result = $db->query($query);

    if (!$result) {
        die("Could not query the database: <br/>". $db->error. "<br>Query: ".$query);
    }
    while ($row = $result->fetch_object()) {
        echo '<tr>';
        echo '<td>'.$row->id.'</td>';
        echo '<td>'.$row->name.'</td>';
        echo '</tr>';
    }
}