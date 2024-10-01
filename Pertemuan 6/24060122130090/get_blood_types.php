<?php
require_once 'lib/db_login.php';

$query = "SELECT * FROM blood_types";
$result = $db->query($query);

if (!$result) {
    die("Query Error: " . $db->error);
}

echo '<option>--- Pilih Golongan Darah ---</option>';

while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
}
