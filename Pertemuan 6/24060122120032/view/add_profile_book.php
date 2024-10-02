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
function test_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$is_valid = TRUE;
// Name Validation
// Name tidak boleh kosong
    if (empty($name)){
        danger("Nama tidak boleh kosong");
        $is_valid = FALSE;
    }

// Nickname Validation
// Nickname tidak boleh kosong
    if (empty($nickname)){
        danger("Nickname tidak boleh kosong");
        $is_valid = FALSE;
    }

// Address Validation
// Address tidak boleh kosong
    if (empty($address)){
        danger("Alamat tidak boleh kosong");
        $is_valid = FALSE;
    }
// Phone Number Validation
// Phone Number tidak boleh kosong dan merupakan nomor yang valid (gunakan regex dari situs ini https://www.huzefril.com/posts/regex/regex-nomor-handphone/)
// yang simpel dan yang kompleks ok, pilih salah satu
    $phone_regex = "/^(08)[0-9]{8,11}$/";
    if (empty($phone_number)) {
        danger("Nomor telepon tidak boleh kosong");
        $is_valid = false;
    } elseif (!preg_match($phone_regex, $phone_number)) {
        danger("Nomor telepon tidak valid");
        $is_valid = false;
    }
// Blood Type
// Blood Type id harus merupakan sebuah id yang valid di tabel blood_types 
// (Hint 1: lakukan query id, dan cek apakah ada. Untuk query sekaligus gunakan fetch_all, ubah menjadi array menggunakan array_column, kemudian check menggunakan in_array)
// https://www.w3schools.com/php/func_mysqli_fetch_all.asp
// (Hint 2: Jika cara diatas sulit, lakukan query select dengan where, check banyak row yang diterima)
    $query_blood_type = "SELECT id FROM blood_types WHERE id='$blood_type_id'";
    $result_blood_type = $conn->query($query_blood_type);
    if($result_blood_type->num_rows==0){
        danger("Golonga darah tidak valid");
        $is_result = FALSE;
    }
// Hobby Validation
// Mirip dengan blood type, dengan tabel hobbies
    $query_hobby = "SELECT id FROM hobby WHERE id='$hobby_id'";
    $result_hobby = $conn->query($query_hobby);
    if($result_blood_type->num_rows===0){
        danger("Hobby tidak valid");
        $is_result = FALSE;
    }

// Best Three
// Buat yang pertama required sementara yang kedua dan ketiga nullable
if (empty($best_three_1)){
    danger("Skill pertama harus diisi");
    $is_result = FALSE;
}

// TODO 5: INSERT DATA
if ($is_valid){
    $query = "INSERT INTO profile_books (name, nickname, adrress, phone_number, blood_type_id, hobby_id, best_three_1, best_three_2, best_three_3)
            VALUES ('$name', '$nickname', '$address', '$phone_number', '$blood_type_id', '$hobby_id', '$best_three_1', '$best_three_2', '$best_three_3')";
    if ($conn->query($query=== TRUE)){
        echo "Data berhasil disimpan";
    }else{
        danger("Terjadi kesalahan saat menyimpan data");
    }
}