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
    # code...

// Name Validation
// Name tidak boleh kosong
$valid = TRUE;  //Flag Validasi
$name = test_input($_POST['name']);
if ($name == '') {
    # code...
    $error_name = "Name is Required";
    $valid = FALSE;
}


// Nickname Validation
// Nickname tidak boleh kosong
$nickname = test_input($_POST['nickname']);
if ($nickname == '') {
    # code...
    $error_nickname = "Nickname is Required";
    $valid = FALSE;
}

// Address Validation
// Address tidak boleh kosong
$address = test_input($_POST['address']);
if ($address == '') {
    $error_address = "Address is Required";
    $valid = FALSE;
}

// Phone Number Validation
// Phone Number tidak boleh kosong dan merupakan nomor yang valid (gunakan regex dari situs ini https://www.huzefril.com/posts/regex/regex-nomor-handphone/)
// yang simpel dan yang kompleks ok, pilih salah satu
$phone_number = test_input($_POST['phone_number']);
if ($phone_number == '') {
    # code...
    $error_phone_number = "Phone Number is Required";
    $valid = FALSE;
} elseif(!preg_match("^(\+62|62|0)8[1-9][0-9]{6,9}$", $phone_number)){
    # code...
    $error_phone_number = "Tidak sesuai format";
    $valid = FALSE;
}

// Blood Type
// Blood Type id harus merupakan sebuah id yang valid di tabel blood_types 
// (Hint 1: lakukan query id, dan cek apakah ada. Untuk query sekaligus gunakan fetch_all, ubah menjadi array menggunakan array_column, kemudian check menggunakan in_array)
// https://www.w3schools.com/php/func_mysqli_fetch_all.asp
// (Hint 2: Jika cara diatas sulit, lakukan query select dengan where, check banyak row yang diterima)
$sql = "SELECT id, name FROM blood_types ORDER BY id";
$result = $mysqli -> query($sql);

// Fetch all
$result -> fetch_all(MYSQLI_ASSOC);

// Free result set
$result -> free_result();


// Hobby Validation
// Mirip dengan blood type, dengan tabel hobbies

$sql = "SELECT id, name FROM hobbies ORDER BY id";
$result = $mysqli -> query($sql);

// Fetch all
$result -> fetch_all(MYSQLI_ASSOC);

// Free result set
$result -> free_result();


// Best Three
// Buat yang pertama required sementara yang kedua dan ketiga nullable
if ($best_three_1 == '') {
    $error_best_three1 = "Required";
    $valid = FALSE;
}


// TODO 5: INSERT DATA
if ($valid) {
    $name = $db->real_escape_string($name);
    $nickname = $db->real_escape_string($nickname);
    $address = $db->real_escape_string($address);
    $phone_number = $db->real_escape_string($phone_number);
    $blood_type_id = $db->real_escape_string($blood_type_id);
    $hobby_id = $db->real_escape_string($hobby_id);
    $best_three_1 = $db->real_escape_string($best_three_1);
    $best_three_2 = $db->real_escape_string($best_three_2);
    $best_three_3 = $db->real_escape_string($best_three_3);

    

    $query = "INSERT INTO profile_books (name, nickname, address, phone_number, blood_type_id, hobby_id, best_three_1, best_three_2, best_three_3) VALUES ($name, $nickname, $address, $phone_number, $blood_type_id, $hobby_id, $best_three_1, $best_three_2, $best_three_3)";

    $result = $db->query($query);
    if (!$result) {
        die ("Could not query the database: <br/>". $db->error . '<br>Query: '. $query);
    } else {
       $db->close();
       header('Location: view_profile_book.php');
       exit;
    }


}
}