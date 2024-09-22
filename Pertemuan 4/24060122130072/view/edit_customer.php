<?php 
require '../header.html';
require_once('../lib/db_login.php');

if (isset($_GET['id'])) {
    $id = $_GET['id']; // mendapatkan customerid yang dilewatkan ke url
} else {
    
}

// check if user haven't submit
if (!isset($_POST['submit'])) {
    $query = " SELECT * from  customers where customerid = ".$id." ";
    // execute query
    $result = $db->query($query);
    if (!$result) {
        die ("Could not query the database: <br>".$db->error);
    } else {
        while ($row = $result -> fetch_object) {
            $name = $row->name;
            $address = $row->address;
            $city = $row->city;
        }
    }
} else {
    $valid = TRUE; // validation flag
    $name = test_input($_POST['name']);
    if ($name == '') {
        $error_name = "Name is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }

    $address = test_input($_POST['address']);
    if ($address == '') {
        $error_address = "Address is required";
        $valid = FALSE;
    }

    $city = test_input($_POST['city']);
    if ($city == '' || $city == 'none') {
        $error_city = "City is required";
        $valid = FALSE;
    }

    // update data to database
    if ($valid) {
        // asign a query
        $query = " UPDATE customers set name'".$name."', address='".$address."',
        city='".$city."' where customerid=".$id." ";
        // execute query
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
        } else {
            $db->close();
        }
    }
}
 ?>