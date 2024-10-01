<?php
require_once 'lib/db_login.php';

$query = "SELECT * FROM hobbies";
$result = $db->query($query);

if (!$result) {
    die("Query Error: " . $db->error);
}

echo '<option>--- Pilih Hobi ---</option>';

while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
}
