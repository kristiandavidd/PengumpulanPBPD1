<!--Nama : Muhammad Naufal -->
<!--NIM : 24060120140157 -->
<!--Tanggal Pengerjaan : 24-09-2024 -->
<?php
    session_start();
    require_once('db_login.php');
    $id = $_GET['id'];

    $query = "DELETE FROM customers WHERE customerid=".$id." ";
    $result = $db->query($query);
    if(!$result){
        die("Could not query the database: <br />". $db->error);
    }
    $db->close();

    header('Location: view_customer.php');
?>