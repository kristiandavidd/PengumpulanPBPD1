<!-- 
Nama : Tara Tirzandina
NIM : 24060122130060
Tanggal : 2 Oktober 2024
-->
<?php
require_once 'lib/db_login.php';

// TODO 2 : Mengambil data golongan darah dari tabel 'blood_types'
$query = " SELECT * FROM blood_types ";
$result = $db->query($query);
if(!$result){
    die ("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
}
//fetch and display the result
$i = 1;
while($row = $result->fetch_object()){
    echo "<option value='$row->id'>$row->name</option>";
    $i++;
}
    $result->free();
    $db->close();
?>

// Eksekusi query dengan setiap loopnya melakukan echo dibawah ini
// echo "<option value='$row->id'>$row->name</option>"