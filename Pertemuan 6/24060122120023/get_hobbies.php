<?php
    require_once 'lib/db_login.php';

    // TODO 3 : Mengambil data hobi dari tabel 'hobbies'
    // Asign a query
    $query = " SELECT * FROM hobbies ORDER BY id";
    $result = $db->query( $query );

    // Eksekusi query kemudian iterasi setiap loopnya yang melakukan echo dibawah ini
    // echo  "<option value='$row->id'>$row->name</option>";
    // Asign a query
    if (!$result) {
        die ("Could not query the database: <br />". $db->error);
    }

    // Fetch and display the results
    while ($row = $result->fetch_object()) {
        echo "<option value='$row->id'>$row->name</option>";
    }
    $result->free ();
    $db->close () ;

        

