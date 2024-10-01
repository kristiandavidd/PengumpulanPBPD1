<!-- Nama       : Nashwan Adenaya -->
<!-- NIM        : 24060121130084 -->
<!-- Lab        : D1 -->
<!-- Tanggal    : 02 Oktober 2024-->
<!-- Deskripsi  : Responsi -->

<?php
require_once 'lib/db_login.php';

// $hobby = $_GET['hobby_id'];

// TODO 3 : Mengambil data hobi dari tabel 'hobbies'
$query = "SELECT * FROM hobbies";
$result = $db->query($query);

if (!$result) {
  die("Could not query the database: <br>" . $db->error);
}

// Eksekusi query kemudian iterasi setiap loopnya yang melakukan echo dibawah ini
while($row = $result->fetch_object()) {
  echo "<option value='$row->id'>$row->name</option>";
}

$result->free();
$db->close();
        
