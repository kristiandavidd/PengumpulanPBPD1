<?php
require_once 'lib/db_login.php';

$sql = "SELECT * FROM blood_types";
$result = $conn->query($sql);

$bloodTypes = array();
while($row = $result->fetch_assoc()) {
    $bloodTypes[] = $row;
}

header('Content-Type: application/json');
echo json_encode($bloodTypes);

$conn->close();
?>