<?php
require_once 'lib/db_login.php';

// TODO 3 : Mengambil data hobi dari tabel 'hobbies'

// Query untuk mengambil data dari tabel 'hobbies'
$query = "SELECT id, name FROM hobbies";
$result = $db->query($query);

// Cek apakah query berhasil dan mengembalikan hasil
if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        echo "<option value='$row->id'>$row->name</option>";
    }
} else {
    echo "<option value=''>No hobbies available</option>";
}

?>
