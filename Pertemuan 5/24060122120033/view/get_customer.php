<!--
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pengerjaan  : Kamis, 26 September 2024
    Nama File           : get_customer.php
-->

<?php
    require_once('../lib/db_login.php');

    // Assign id column value using GET
    $customerid = $_GET['id'];
    
    // Assign a query
    $query = "SELECT * FROM customers WHERE customerid = " . $customerid;
    
    // Execute the query
    $result = $db->query($query);

    if (!$result) { // Tampilkan pesan error jika query gagal dieksekusi
        die("Could not query the database: <br>" . $db->error);
    }
    
    // Fetch and display the result
    while($row = $result->fetch_object()) {
        echo 'Name: ' . $row->name . '<br>';
        echo 'Email: ' . $row->address . '<br>';
        echo 'City: ' . $row->city . '<br>';
    }

    // Free the memory and close DB Connection
    $result->free();
    $db->close();
?>