<?php

require_once('./lib/db_login.php');

// Check if 'id' is set
if (!isset($_GET['id'])) {
    die("Error: ID parameter is missing.");
}

$customerid = $_GET['id'];

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM customers WHERE customerid = ?");
$stmt->bind_param("s", $customerid); // Assuming customerid is a string; change "s" to "i" if it's an integer.

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Could not query the database: <br>" . $conn->error);
}

// Fetch and display the results
while ($row = $result->fetch_object()) {
    echo 'Name: ' . $row->name . '<br>';
    echo 'Email: ' . $row->address . '<br>';
    echo 'City: ' . $row->city . '<br>';
}

// Free result and close connection
$result->free();
$stmt->close(); // Close the prepared statement
$conn->close(); // Close the database connection
?>
