<?php
require_once 'lib/db_login.php';

// TODO 3 : Mengambil data hobi dari tabel 'hobbies'
        
// Eksekusi query kemudian iterasi setiap loopnya yang melakukan echo dibawah ini
// echo  "<option value='$row->id'>$row->name</option>";
if (!isset($_GET['id'])) {
    die("Error: ID parameter is missing.");
}

$id = $_GET['id'];

//statement sql nya 
$stmt = $conn->prepare("SELECT * FROM hobbies");

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