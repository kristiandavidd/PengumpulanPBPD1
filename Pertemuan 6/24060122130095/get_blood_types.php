<?php
require_once 'lib/db_login.php';

// TODO 2 : Mengambil data golongan darah dari tabel 'blood_types'

// Eksekusi query dengan setiap loopnya melakukan echo dibawah ini
// echo "<option value='$row->id'>$row->name</option>"

$query = "SELECT * FROM blood_types";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br />" . $db->error);
} else {
    while ($row = $result->fetch_object()) {
        echo "<option value='" . $row->id . "'>" . $row->name ."</option>";
    }
}

