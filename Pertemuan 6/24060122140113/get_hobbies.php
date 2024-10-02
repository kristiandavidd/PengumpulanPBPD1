<?php
require_once 'lib/db_login.php';

// TODO 3 : Mengambil data hobi dari tabel 'hobbies'
        
// Eksekusi query kemudian iterasi setiap loopnya yang melakukan echo dibawah ini
// echo  "<option value='$row->id'>$row->name</option>";
?>
<?php
// Nama : Bima Aditya Aryono / 24060122140113
// File: get_customer.php
// Deskripsi: Menampilkan detail customer
    require_once('./lib/db_login.php');

    $query = "SELECT * FROM hobbies";
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