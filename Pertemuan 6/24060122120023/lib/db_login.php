<!-- Nama: Happy Desita W. -->
<!-- NIM: 24060122120023 -->
<!-- Tanggal Pengerjaan: 2 Oktober 2024 -->
<!-- Nama File: db_login.php -->

<?php
    // TODO 1 : SETUP & CONNECT DATABASE
        $db_host = 'localhost';
        $db_database = 'db_profile_book';
        $db_username = 'root';
        $db_password = '';

        // Connect database
        $db = new mysqli($db_host, $db_username, $db_password, $db_database);
        if ($db -> connect_errno){
            die ("Tidak bisa terhubung ke database: <br />". $db -> connect_error);
        }


    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
