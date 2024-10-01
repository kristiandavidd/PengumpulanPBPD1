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
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_POST['submit'])) {
    $valid = TRUE;

// Name Validation
// Name tidak boleh kosong
    if ($name == '') {
        $message_id = "Name is required";
        $valid = FALSE;
    }
// Nickname Validation
// Nickname tidak boleh kosong
    if ($nickname == '') {
        $message_id = "Nickname is required";
        $valid = FALSE;
    }

// Address Validation
// Address tidak boleh kosong
    if ($address == '') {
        $message_id = "Address is required";
        $valid = FALSE;
    }

// Phone Number Validation
// Phone Number tidak boleh kosong dan merupakan nomor yang valid (gunakan regex dari situs ini https://www.huzefril.com/posts/regex/regex-nomor-handphone/)
// yang simpel dan yang kompleks ok, pilih salah satu
    if (!preg_match("/^(0[8][1-9][0-9]{7,10}|62[8][1-9][0-9]{8,11})$/", $phone_number)) {
        $message_id = "Phone number is not valid";
        $valid = FALSE;
    }

    


    if ($valid) {
        $query = "INSERT INTO  profile_books(name, nickname, address, phone_number, blood_type_id,hobby_id, best_three_1, best_three_2, best_three_3) VALUES ('$name', '$nickname', '$address', '$phone_number', '$blood_type', '$hobby', '$best_three_1', '$best_three_2', '$best_three_3')";
        echo $query; // Debug statement
        $result = $db->query($query);

        if (!$result) {
            die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
        } else {
            $db->close();
            header('Location: view_customer.php');
            exit;
        }
    }else{
        
    }
}









// Blood Type
// Blood Type id harus merupakan sebuah id yang valid di tabel blood_types 
// (Hint 1: lakukan query id, dan cek apakah ada. Untuk query sekaligus gunakan fetch_all, ubah menjadi array menggunakan array_column, kemudian check menggunakan in_array)
// https://www.w3schools.com/php/func_mysqli_fetch_all.asp
// (Hint 2: Jika cara diatas sulit, lakukan query select dengan where, check banyak row yang diterima)


// Hobby Validation
// Mirip dengan blood type, dengan tabel hobbies


// Best Three
// Buat yang pertama required sementara yang kedua dan ketiga nullable


// TODO 5: INSERT DATA
?>