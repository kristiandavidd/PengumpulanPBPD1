<!--
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pengerjaan  : Rabu, 2 Oktober 2024
    Nama File           : get_hobbies.php
-->

<?php
    require_once 'lib/db_login.php';

    // TODO 3 : Mengambil data hobi dari tabel 'hobbies'
    // Assign A Query
    $query = "SELECT * FROM hobbies ORDER BY id";

    // Execute the query
    $result = $db->query($query);

    if (!$result) { // Tampilkan pesan error jika query gagal dieksekusi
        die("Could not query the database: <br>" . $db->error);
    }

    // Fetch and display the result
    while ($row = $result->fetch_object()) {
        echo '<option value="' . $row->id . '">' . $row->name . '</option>';
    }

    // Free the memory and close DB connection
    $result->free();
    $db->close();          
    // Eksekusi query kemudian iterasi setiap loopnya yang melakukan echo dibawah ini
    // echo  "<option value='$row->id'>$row->name</option>";
?>