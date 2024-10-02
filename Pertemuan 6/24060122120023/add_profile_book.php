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
if (isset($_POST["submit"])) {
    $valid = TRUE;

    // Name Validation
    // Name tidak boleh kosong
    $name = test_input($_POST['name']);
    if ($name == '') {
        $error_name = "Name is required";
        $valid = FALSE;
    } 

    // Nickname Validation
    // Nickname tidak boleh kosong
    $nickname = test_input($_POST['nickname']);
    if ($nickname == '') {
        $error_nickname = "Nickname is required";
        $valid = FALSE;
    } 

    // Address Validation
    // Address tidak boleh kosong
    $address = test_input($_POST['address']);
    if ($address == '') {
        $error_address = "Address is required";
        $valid = FALSE;
    } 

    // Phone Number Validation
    // Phone Number tidak boleh kosong dan merupakan nomor yang valid (gunakan regex dari situs ini https://www.huzefril.com/posts/regex/regex-nomor-handphone/)
    // yang simpel dan yang kompleks ok, pilih salah satu
    $phone_number = test_input($_POST['phone_number']);
    if ($phone_number == '') {
        $error_phone_number = "Phone Number is required";
        $valid = FALSE;
    } 
    elseif (!preg_match('/^(\+62|62|0)8[1-9][0-9]{6,9}$/', $phone_number)) {
        $error_phone_number = "Format Nomor Telepon salah";
    } 

    // Blood Type
    // Blood Type id harus merupakan sebuah id yang valid di tabel blood_types 
    // (Hint 1: lakukan query id, dan cek apakah ada. Untuk query sekaligus gunakan fetch_all, ubah menjadi array menggunakan array_column, kemudian check menggunakan in_array)
    // https://www.w3schools.com/php/func_mysqli_fetch_all.asp
    // (Hint 2: Jika cara diatas sulit, lakukan query select dengan where, check banyak row yang diterima)
    $query = "SELECT id FROM blood_types";
    $result = $db->query($query);
    $blood_types = array_column($result->fetch_all(MYSQLI_ASSOC), 'id');
    if (!in_array($blood_type_id, $blood_types)) {
    danger("Blood Type ID is not valid");
    }
    exit;

    // Hobby Validation
    // Mirip dengan blood type, dengan tabel hobbies
    $query = "SELECT id FROM hobbies";
    $result = $db->query($query);
    $blood_types = array_column($result->fetch_all(MYSQLI_ASSOC), 'id');
    if (!in_array($hobby_id, $hobbies)) {
    danger("Hobby ID is not valid");
    }
    exit;

    // Best Three
    // Buat yang pertama required sementara yang kedua dan ketiga nullable
}




// TODO 5: INSERT DATA