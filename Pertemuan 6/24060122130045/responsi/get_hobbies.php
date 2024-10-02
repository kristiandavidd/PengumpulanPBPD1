<?php
require_once 'lib/db_login.php';

// TODO 3 : Mengambil data hobi dari tabel 'hobbies'
    $sql = "SELECT `id`, `name` FROM `hobbies`";
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
    }
?>
<!-- // Eksekusi query kemudian iterasi setiap loopnya yang melakukan echo dibawah ini
// echo  "<option value='$row->id'>$row->name</option>"; -->
