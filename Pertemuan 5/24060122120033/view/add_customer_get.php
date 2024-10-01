<!--
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pengerjaan  : Kamis, 26 September 2024
    Nama File           : add_customer_get.php
-->

<?php
    require_once('../lib/db_login.php');

    // Assign column value using GET
    $name = $db->real_escape_string($_GET['name']);
    $address = $db->real_escape_string($_GET['address']);
    $city = $db->real_escape_string($_GET['city']);

    // Assign a query
    $query = "INSERT INTO customers (name, address, city) VALUES ('" . $name . "', '" . $address . "', '" . $city . "')";
    
    // Execute the query
    $result = $db->query($query);

    if (!$result) { // Tampilkan pesan error jika query gagal dieksekusi
        echo 'div class="alert alert-danger alert-dismissible"><strong>Error! </strong> Could not query the database <br>'.$db->error.'<br></div>';
    } else { // Tampilkan pesan sukses dan data customer jika query berhasil dieksekusi
        echo '<div class="alert alert-success alert-dismissible"><strong>Success! </strong> Data has been added.<br>
        Name: '.$_GET['name'].'<br>
        Address: '.$_GET['address'].'<br>
        City: '.$_GET['city'].'<br></div>';
    }

    // Close DB Connection
    $db->close();
?>