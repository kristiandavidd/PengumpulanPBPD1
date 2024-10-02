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

// Name Validation
// Name tidak boleh kosong
if (empty($name)) {
    danger("Name cannot be empty");
    exit;
}

// Nickname Validation
// Nickname tidak boleh kosong
if (empty($nickname)) {
    danger("Nickname cannot be empty");
    exit;
}

// Address Validation
// Address tidak boleh kosong
if (empty($address)) {
    danger("Address cannot be empty");
    exit;
}

// Phone Number Validation
// Phone Number tidak boleh kosong dan merupakan nomor yang valid (gunakan regex dari situs ini https://www.huzefril.com/posts/regex/regex-nomor-handphone/)
// yang simpel dan yang kompleks ok, pilih salah satu
$phonePattern = "/^(?:\+62|62|0)8[1-9][0-9]{6,9}$/";
if (empty($phone_number) || !preg_match($phonePattern, $phone_number)) {
    danger("Invalid or empty phone number. Make sure it's a valid phone number.");
    exit;
}

// Blood Type
// Blood Type id harus merupakan sebuah id yang valid di tabel blood_types 
// (Hint 1: lakukan query id, dan cek apakah ada. Untuk query sekaligus gunakan fetch_all, ubah menjadi array menggunakan array_column, kemudian check menggunakan in_array)
// https://www.w3schools.com/php/func_mysqli_fetch_all.asp
// (Hint 2: Jika cara diatas sulit, lakukan query select dengan where, check banyak row yang diterima)

// Fetch all valid blood type ids
$blood_type_query = $db->query("SELECT id FROM blood_types");
$blood_types = $blood_type_query->fetch_all(MYSQLI_ASSOC);
$valid_blood_type_ids = array_column($blood_types, 'id');

// Check if the given blood type id is in the list of valid ids
if (!in_array($blood_type_id, $valid_blood_type_ids)) {
    danger("Invalid Blood Type");
    exit;
}

// Hobby Validation
// Mirip dengan blood type, dengan tabel hobbies
$hobby_query = $db->query("SELECT id FROM hobbies WHERE id = $hobby_id");
if ($hobby_query->num_rows === 0) {
    danger("Invalid Hobby");
    exit;
}

// Best Three
// Buat yang pertama required sementara yang kedua dan ketiga nullable
if (empty($best_three_1)) {
    danger("Best Three 1 cannot be empty");
    exit;
}

// TODO 5: INSERT DATA
$query = "INSERT INTO profile_books (name, nickname, address, phone_number, blood_type_id, hobby_id, best_three_1, best_three_2, best_three_3) 
VALUES ('$name', '$nickname', '$address', '$phone_number', '$blood_type_id', '$hobby_id', '$best_three_1', '$best_three_2', '$best_three_3')";

if ($db->query($query)) {
    echo "Profile added successfully";
} else {
    danger("Error adding profile: " . $db->error);
}
?>