<?php
// Nama : Bima Aditya Aryono / 24060122140113
// File: get_customer.php
// Deskripsi: Menampilkan detail customer
    require_once('./lib/db_login.php');
    $customerid=$_GET['id'];

    $query = "SELECT * FROM customers where customerid=".$customerid;
    $result = $db->query($query);
    if(!$result){
        die ("Could not query the database: <br />". $db->error);
    }
    while($row = $result->fetch_object()){
        echo 'Name: '.$row->name.'<br />';
        echo 'Address: '.$row->address.'<br />';
        echo 'City: '.$row->city.'<br />';
    }
    $result->free();
    $db->close();
?>