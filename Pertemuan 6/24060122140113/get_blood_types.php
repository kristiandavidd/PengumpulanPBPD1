<?php
require_once 'lib/db_login.php';

// TODO 2 : Mengambil data golongan darah dari tabel 'blood_types'

// Eksekusi query dengan setiap loopnya melakukan echo dibawah ini
// echo "<option value='$row->id'>$row->name</option>"
?>
<?php
// Nama : Bima Aditya Aryono / 24060122140113
// File: get_customer.php
// Deskripsi: Menampilkan detail customer
    require_once('./lib/db_login.php');

    $query = "SELECT * FROM blood_types";
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error);
    }
    while($row = $result->fetch_object()){
        echo "<option value='$row->id'>$row->name</option>";
    }
    $result->free();
    $db->close();
?>