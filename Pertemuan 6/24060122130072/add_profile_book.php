<?php

require_once 'lib/db_login.php';

// convert post data to php native assoc array
$data = file_get_contents("php://input");
$requestData = json_decode($data, true);

if (!$requestData) {
    echo "Invalid JSON data received";
    exit;
}

$name = $db->real_escape_string($requestData['name']);
$nickname = $db->real_escape_string($requestData['nickname']);
$address = $db->real_escape_string($requestData['address']);
$phone_number = $db->real_escape_string($requestData['phone_number']);
$blood_type_id = $db->real_escape_string($requestData['blood_type_id']);
$hobby_id = $db->real_escape_string($requestData['hobby_id']);
$best_three_1 = $db->real_escape_string($requestData['best_three_1']);
$best_three_2 = $db->real_escape_string($requestData['best_three_2']) ;
$best_three_3 = $db->real_escape_string($requestData['best_three_3']);


function danger($message) {
    echo "<div class='alert alert-danger alert-dismissible'>".
    "<p class='text-danger'>$message</p>".
    "</div>";
}

// TODO 5: VALIDATION
$valid = TRUE; // validation flag
$error = "";
// Name Validation
// Name tidak boleh kosong
if ($name == "") {
    $error = "Name cannot be empty";
    $valid = FALSE;
}

// Nickname Validation
// Nickname tidak boleh kosong
if ($nickname == "") {
    $error = "Nickname cannot be empty";
    $valid = FALSE;
}

// Address Validation
// Address tidak boleh kosong
if ($address == "") {
    $error = "Address cannot be empty";
    $valid = FALSE;
}

// Phone Number Validation
// Phone Number tidak boleh kosong dan merupakan nomor yang valid (gunakan regex dari situs ini https://www.huzefril.com/posts/regex/regex-nomor-handphone/)
// yang simpel dan yang kompleks ok, pilih salah satu
if ($phone_number == "") {
    $error = "Phone Number cannot be empty";
    $valid = FALSE;
} else {
    $regex = "/^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$/";
    if (!preg_match($regex, $phone_number)) {
        $error = "Phone Number format is invalid. Example: +62 897 123456, +62-897-123456";
        $valid - FALS;
    }
}

// Blood Type
// Blood Type id harus merupakan sebuah id yang valid di tabel blood_types 
// (Hint 1: lakukan query id, dan cek apakah ada. Untuk query sekaligus gunakan fetch_all, ubah menjadi array menggunakan array_column, kemudian check menggunakan in_array)
// https://www.w3schools.com/php/func_mysqli_fetch_all.asp
// (Hint 2: Jika cara diatas sulit, lakukan query select dengan where, check banyak row yang diterima)
$query = "SELECT * FROM blood_types";
$result = $db->query($query);

if (!$result) {
    die("Could not query to the database: <br>".$db->error);
} else {
    $valid_blood = array();
    $result->fetch_all();
    $valid_blood = array_column($result, 'name', 'id');
    if (!in_array($blood_type_id, $valid_blood)) {
        $error = "Blood type invalid";
        $valid = FALSE;
    }
}
$result->free();


// Hobby Validation
// Mirip dengan blood type, dengan tabel hobbies
$query = "SELECT * FROM hobbies";
$result = $db->query($query);

if (!$result) {
    die("Could not query to the database: <br>".$db->error);
} else {
    $valid_hobby = array();
    $result->fetch_all();
    $valid_hobby = array_column($result, 'name', 'id');
    if (!in_array($hobby_id, $valid_hobby)) {
        $error = "Hobby is not in database";
        $valid = FALSE;
    }
}
$result->free();


// Best Three
// Buat yang pertama required sementara yang kedua dan ketiga nullable
if ($best_three_1 == "") {
    $error = "Must have at least one hobby";
    $valid = FALSE;
}


// TODO 5: INSERT DATA
$query = "INSERT INTO profile_books (name, nickname, address, phone_number, blood_type_id, hobby_id, best_three_1, best_three_2, best_three_3)
            VALUES (".$name.",".$nickname.","."$address".",".$phone_number.",".$blood_type_id.",".$hobby_id.","
            .$best_three_1.",".$best_three_2.",".$best_three_3.")";

$result = $db->query($query);
if (!$result) {
    die("Could not query to the database: <br>".$db->error);
}