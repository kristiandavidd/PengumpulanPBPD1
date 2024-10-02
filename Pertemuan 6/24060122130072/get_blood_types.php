<?php
require_once 'lib/db_login.php';

// TODO 2 : Mengambil data golongan darah dari tabel 'blood_types'
$query = "SELECT * FROM blood_types";
$result = $db->query($query);

if (!$result) {
  die("Could not query to the database: <br>".$db->error);
}

// Eksekusi query dengan setiap loopnya melakukan echo dibawah ini
while ($row = $result->fetch_object()) {
  echo "<option value='$row->id'>$row->name</option>";
}
// echo "<option value='$row->id'>$row->name</option>"

?>