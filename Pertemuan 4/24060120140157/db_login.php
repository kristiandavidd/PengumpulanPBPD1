<!--Nama : Muhammad Naufal -->
<!--NIM : 24060120140157 -->
<!--Tanggal Pengerjaan : 24-09-2024 -->
<?php
    $db_host = 'localhost';
    $db_database = 'bookorama';
    $db_username = 'root';
    $db_password = '';

    $db = new mysqli($db_host, $db_username, $db_password, $db_database);
    if($db->connect_errno){
        die("Could not connect to database: <br />". $db->connect_error);
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>