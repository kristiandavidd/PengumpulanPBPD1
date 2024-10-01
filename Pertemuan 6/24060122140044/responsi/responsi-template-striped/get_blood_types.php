<?php
require_once 'lib/db_login.php';

// TODO 2 : Mengambil data golongan darah dari tabel 'blood_types'

// Eksekusi query dengan setiap loopnya melakukan echo dibawah ini

// echo "<option value='$row->id'>$row->name</option>"
// include our login information
 require_once('db_login.php');

//  execute the query
$query = "SELECT * FROM profile_books WHERE  profile_books.blood_type_id = ".$blood_type_id;
$result = $db->query($query);
if (!$result){
    die ("could not query the database: <br>". $db->error. "<br>Query: ".$query);
}
$i = 1;
while ($row = $result->fetch_object()) {
    echo '<tr>';
    echo '<td>' . $i . '</td>'; // Menampilkan nomor urut
    echo '<td>' . $row->isbn . '</td>'; // Menampilkan kolom nama
    echo '<td>' . $row->author . '</td>'; // Menampilkan kolom alamat
    echo '<td>' . $row->title . '</td>'; // Menampilkan kolom kota
    echo '<td>' . $row->price . '</td>'; // Menampilkan kolom kota
    echo '<option value='$row->id'>$row->name</option>'
    // Tombol untuk edit dan delete berdasarkan id customer
    echo '<td>
            <a class="btn btn-primary" href="show_cart.php?id=' . $row->isbn . '">Add to Cart</a>&nbsp;&nbsp;
          </td>';
    echo '</tr>';
    $i++; // Increment nomor urut
}
echo '</table>';
echo '</br>';
echo 'Total Rows = '.$result->num_rows;
$result->free();
$db->close();

?>