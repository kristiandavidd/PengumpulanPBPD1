<?php

require_once('../lib/db_login.php');

if (isset($_GET['id'])) {
    $id = $db->real_escape_string($_GET['id']);
    $query = "SELECT * FROM customers WHERE customerid = '$id'";
    $result = $db->query($query);

    if (!$result) {
        echo "Error: " . $db->error;
    } else {
        $customer = $result->fetch_object();
        echo "<p>Customer Name: " . $customer->name . "<p>";
        echo "<p>Address: " . $customer->address . "</p>";
        echo "<p>City: " . $customer->city . "</p>";
    }
} else {
    echo "Invalid customer ID.";
}

$db->close();

?>