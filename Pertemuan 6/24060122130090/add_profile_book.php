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

// Validasi input

// Name Validation
// Name tidak boleh kosong
if (empty($name)) {
    echo '<div class="alert alert-danger alert-dismissible"> <p class="text_danger"> Nama Harus Diisi! </p> </div>';
    exit;
}

// Nickname Validation
// Nickname tidak boleh kosong
if (empty($nickname)) {
    echo '<div class="alert alert-danger alert-dismissible"> <p class="text_danger"> Nickname Harus Diisi! </p> </div>';
    exit;
}

// Address Validation
// Address tidak boleh kosong
if (empty($address)) {
    echo '<div class="alert alert-danger alert-dismissible"> <p class="text_danger"> Alamat Harus Diisi! </p> </div>';
    exit;
}

// Phone Number Validation
// Phone Number tidak boleh kosong dan merupakan nomor yang valid (gunakan regex dari situs ini https://www.huzefril.com/posts/regex/regex-nomor-handphone/)
// yang simpel dan yang kompleks ok, pilih salah satu
if (empty($phone_number)) {
    echo '<div class="alert alert-danger alert-dismissible"> <p class="text_danger"> Nomor Telepon Harus Diisi! </p> </div>';
    exit;
}
if (!preg_match('/^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$/', $phone_number)) {
    echo '<div class="alert alert-danger alert-dismissible"> <p class="text_danger"> Nomor Telepon Tidak Valid! </p> </div>';
    exit;
}

// Blood Type
// Blood Type id harus merupakan sebuah id yang valid di tabel blood_types 
// (Hint 1: lakukan query id, dan cek apakah ada. Untuk query sekaligus gunakan fetch_all, ubah menjadi array menggunakan array_column, kemudian check menggunakan in_array)
// https://www.w3schools.com/php/func_mysqli_fetch_all.asp
// (Hint 2: Jika cara diatas sulit, lakukan query select dengan where, check banyak row yang diterima)
$query = "SELECT id FROM blood_types";
$result = $db->query($query);
$blood_type_ids = array_column(mysqli_fetch_all($result, MYSQLI_ASSOC), 'id');
if (!in_array($blood_type_id, $blood_type_ids)) {
    echo '<div class="alert alert-danger alert-dismissible"> <p class="text_danger"> Blood Type Tidak Valid! </p> </div>';
    exit;
}

// Hobby Validation
// Mirip dengan blood type, dengan tabel hobbies
$query = "SELECT id FROM hobbies";
$result = $db->query($query);
$hobby_ids = array_column(mysqli_fetch_all($result, MYSQLI_ASSOC), 'id');
if (!in_array($hobby_id, $hobby_ids)) {
    echo '<div class="alert alert-danger alert-dismissible"> <p class="text_danger"> Hobi Tidak Valid! </p> </div>';
    exit;
}

// Best Three
// Buat yang pertama required sementara yang kedua dan ketiga nullable
if (empty($best_three_1)){
    echo '<div class="alert alert-danger alert-dismissible"> <p class="text_danger">Isi minimal 1 best three pada nomor 1! </p> </div>';
    exit;
}


// Insert Data
$query = "INSERT INTO profile_books (name, nickname, address, phone_number, blood_type_id, hobby_id, best_three_1, best_three_2, best_three_3)
          VALUES ('$name', '$nickname', '$address', '$phone_number', '$blood_type_id', '$hobby_id', '$best_three_1', '$best_three_2', '$best_three_3')";
$result = $db->query($query);

if ($result) {
    echo '<div class="alert alert-success alert-dismissible"> <p class="text_danger"> Data sudah ditambahkan! </p> </div>';
} else {
    echo '<div class="alert alert-danger alert-dismissible"> <p class="text_danger"> Kesalahan saat menambahkan data! </p> </div>';
}

$db->close();
exit;