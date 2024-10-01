<?php
    require_once('db_login.php');
    $customer_id = $_GET['id'];
    $query = " SELECT * FROM customers WHERE customerid=".$customer_id;
    $result = $db->query($query);
    if(!$result){
        die("Could not query the database: <br />". $db->error ."<br> Query: ".$query);
    }

    while($row = $result->fetch_object()){
        echo 'Name: '.$row->name.'<br />';
        echo 'Address: '.$row->address.'<br />';
        echo 'City: '.$row->city.'<br />';
    }

    $result->free();
    $db->close();
?>