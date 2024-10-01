<?php
//Nama: Sarah Teguh Kinanti Situmeang
//NIM: 24060122120032
//File: get_customer.php
require_once('../lib/db_login.php');
$customerid = $_GET['id'];
//asign query
$query = "SELECT * FROM customer where customerid=".$customerid;
$result = $db->query( $query);
if (!$result){
    die ("COuld not query the database: <br />". $db->error);
}
//fetch and display the results
while ($row = $result->fetch_object()){
    echo 'Name: '.$row->name.'<br />';
    echo 'Address: '.$row->address.'<br />';
    echo 'City: '.$row->city.'<br />';
}
$result->free();
$db->close();
?>