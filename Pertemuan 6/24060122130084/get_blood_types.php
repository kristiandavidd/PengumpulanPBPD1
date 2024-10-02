<!-- Nama       : Nashwan Adenaya -->
<!-- NIM        : 24060121130084 -->
<!-- Lab        : D1 -->
<!-- Tanggal    : 02 Oktober 2024-->
<!-- Deskripsi  : Responsi -->

<?php
require_once 'lib/db_login.php';
// $blood_type = $_GET['blood_type_id'];

// TODO 2 : Mengambil data golongan darah dari tabel 'blood_types'
$query = "SELECT * FROM blood_types";
$result = $db->query($query);

if (!$result) {
  die("Could not query the database: <br>" . $db->error);
}

// Eksekusi query dengan setiap loopnya melakukan echo dibawah ini
while($row = $result->fetch_object()) {
  echo "<option value='$row->id'>$row->name</option>";
}

$result->free();
$db->close();
