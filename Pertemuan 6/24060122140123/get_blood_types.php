<?php
require_once 'lib/db_login.php';

// TODO 2 : Mengambil data golongan darah dari tabel 'blood_types'
$query = "SELECT * FROM blood_types";

// Eksekusi query dengan setiap loopnya melakukan echo dibawah ini
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}
// echo "<option value='$row->id'>$row->name</option>"
while($row = $result->fetch_object()) {
    echo 'Id: ' . $row->id . '<br>';
    echo 'Name: ' . $row->name . '<br>';
}

// TODO 4: Dealokasi variabel dan tutup koneksi database
$result->free();
$db->close();
?>