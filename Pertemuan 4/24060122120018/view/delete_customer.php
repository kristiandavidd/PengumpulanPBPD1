<!-- Nama : Muhammad Naufal Izzudin -->
<!-- Nim : 24060122120018 -->
<!-- Tanggal Pengerjaan : 20 September 2024 -->

<?php
require_once('../lib/db_login.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM customers WHERE customerid = $id";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
    } else {
        $db->close();
        header('Location: view_customer.php');
        exit();
    }
} else {
    header('Location: view_customer.php');
    exit();
}
?>
