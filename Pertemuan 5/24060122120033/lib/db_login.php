<!--
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pengerjaan  : Kamis, 26 September 2024
    Nama File           : db_login.php
-->

<?php 
    $db_host = 'localhost';
    $db_database = 'bookorama';
    $db_username = 'root';
    $db_password = '';

    //  Connect database
    $db = new mysqli($db_host, $db_username, $db_password, $db_database);
    if ($db->connect_errno) {
        die('Could not connect to the database: <br/>' . $db->connect_error);
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>