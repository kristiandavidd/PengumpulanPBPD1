<?php
require_once 'lib/db_login.php';
$query = "SELECT id, name FROM hobbies";
$result = $db->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        echo "<option value='$row->id'>$row->name</option>";
    }
} else {
    echo "<option value=''>Tidak ada data hobbies</option>";
}
?>
