<?php

require_once 'lib/db_login.php';

// Convert POST data to PHP native assoc array
$data = file_get_contents("php://input");
$requestData = json_decode($data, true);

if (!$requestData) {
    danger("Invalid JSON data received");
    exit;
}

// Escape user inputs for security
$name = $db->real_escape_string($requestData['name']);
$nickname = $db->real_escape_string($requestData['nickname']);
$address = $db->real_escape_string($requestData['address']);
$phone_number = $db->real_escape_string($requestData['phone_number']);
$blood_type_id = $db->real_escape_string($requestData['blood_type_id']);
$hobby_id = $db->real_escape_string($requestData['hobby_id']);
$best_three_1 = $db->real_escape_string($requestData['best_three_1']);
$best_three_2 = !empty($requestData['best_three_2']) ? $db->real_escape_string($requestData['best_three_2']) : NULL;
$best_three_3 = !empty($requestData['best_three_3']) ? $db->real_escape_string($requestData['best_three_3']) : NULL;

function danger($message) {
    echo "<div class='alert alert-danger alert-dismissible'>".
    "<p class='text-danger'>$message</p>".
    "</div>";
}

// TODO 5: VALIDATION

$errors = [];

// Name Validation
if (empty($name)) {
    $errors[] = "Name tidak boleh kosong.";
}

// Nickname Validation
if (empty($nickname)) {
    $errors[] = "Nickname tidak boleh kosong.";
}

// Address Validation
if (empty($address)) {
    $errors[] = "Address tidak boleh kosong.";
}

// Phone Number Validation
$phone_regex = '/^(?:\+62|62|0)8[1-9][0-9]{6,9}$/'; // regex yang diambil dari referensi
if (empty($phone_number)) {
    $errors[] = "Phone number tidak boleh kosong.";
} elseif (!preg_match($phone_regex, $phone_number)) {
    $errors[] = "Phone number tidak valid.";
}

// Blood Type Validation
$blood_type_query = "SELECT id FROM blood_types";
$result = $db->query($blood_type_query);
$blood_type_ids = array_column($result->fetch_all(MYSQLI_ASSOC), 'id');

if (!in_array($blood_type_id, $blood_type_ids)) {
    $errors[] = "Blood type ID tidak valid.";
}

// Hobby Validation
$hobby_query = "SELECT id FROM hobbies";
$result = $db->query($hobby_query);
$hobby_ids = array_column($result->fetch_all(MYSQLI_ASSOC), 'id');

if (!in_array($hobby_id, $hobby_ids)) {
    $errors[] = "Hobby ID tidak valid.";
}

// Best Three Validation
if (empty($best_three_1)) {
    $errors[] = "Best three 1 tidak boleh kosong.";
}

// Jika ada error, tampilkan semua 
if (count($errors) > 0) {
    foreach ($errors as $error) {
        danger($error);
    }
    exit;
}

// TODO 5: INSERT DATA (Setelah validasi semua lolos)
$insert_query = "INSERT INTO profile_books (name, nickname, address, phone_number, blood_type_id, hobby_id, best_three_1, best_three_2, best_three_3)
                 VALUES ('$name', '$nickname', '$address', '$phone_number', '$blood_type_id', '$hobby_id', '$best_three_1', '$best_three_2', '$best_three_3')";

if ($db->query($insert_query)) {
    echo "Data berhasil disimpan!";
} else {
    echo "Error: " . $db->error;
}

?>