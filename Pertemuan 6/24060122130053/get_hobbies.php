<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 2 Oktober 2024
Lab : PBP D1
Responsi
-->
<?php
require_once 'lib/db_login.php';

// TODO 3 : Mengambil data hobi dari tabel 'hobbies'
        
// Eksekusi query kemudian iterasi setiap loopnya yang melakukan echo dibawah ini
// echo  "<option value='$row->id'>$row->name</option>";

$query = "SELECT * FROM hobbies";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}

while($row = $result->fetch_object()) {
    echo "<option value='$row->id'>$row->name</option>";
}

$result->free();
$db->close();
?>