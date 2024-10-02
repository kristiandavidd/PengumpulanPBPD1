<?php
require_once 'lib/db_login.php';

// TODO 2 : Mengambil data golongan darah dari tabel 'blood_types'

// Query untuk mengambil data dari tabel 'blood_types'
$query = "SELECT id, name FROM blood_types";
$result = $db->query($query);

// Cek apakah query berhasil dan mengembalikan hasil
if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        echo "<option value='$row->id'>$row->name</option>";
    }
} else {
    echo "<option value=''>No blood types available</option>";
}

?>
