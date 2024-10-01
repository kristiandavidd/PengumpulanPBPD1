<!-- 
    Nama : Alfonso Clement Sutantio
    NIM : 24060122130080
    Tanggal : 21/09/2024
    File : delete_customer.php
 -->
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../lib/login.php');
    exit;
}


require_once('../lib/db_login.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: view_customer.php');
    exit;
}

$query = "DELETE FROM customers WHERE customerid=" . $id . " ";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
} else {
    $db->close();
    header('Location: view_customer.php');
    exit;
}
?>