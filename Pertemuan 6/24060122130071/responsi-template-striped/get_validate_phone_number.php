<?php
require_once 'lib/db_login.php';
$phone_number = $_GET['phone_number'];

if ($phone_number == '') {
    echo "harus diisi";
    exit;
}

if (!isset($_GET['id'])) {
    die("Error: ID parameter is missing.");
}

$id = $_GET['id'];

//statement sql nya 
$stmt = $conn->prepare("SELECT phone_number FROM profile_books WHERE phone_number = $phone_number");

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Could not query the database: <br>" . $conn->error);
}

while ($row = $result->fetch_object()) {
    echo "<option value='$row->id'>$row->name</option>";
}


$result->free();
$stmt->close(); // Close the prepared statement
$conn->close(); // Close the database connection

// Eksekusi query dengan setiap loopnya melakukan echo dibawah ini
// echo "<option value='$row->id'>$row->name</option>"

?>


