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
    $valid = true;
    // Name Validation
    // Name tidak boleh kosong
    if($name == ''){
        danger("Nama tidak boleh kosong");
        $valid = false;
    }
    // Nickname Validation
    // Nickname tidak boleh kosong
    if($nickname == ''){
        danger("Nickname tidak boleh kosong");
        $valid = false;
    }
    // Address Validation
    // Address tidak boleh kosong
    if($address == ''){
        danger("Address tidak boleh kosong");
        $valid = false;
    }
    // Phone Number Validation
    // Phone Number tidak boleh kosong dan merupakan nomor yang valid (gunakan regex dari situs ini https://www.huzefril.com/posts/regex/regex-nomor-handphone/)
    // yang simpel dan yang kompleks ok, pilih salah satu
    if(!preg_match('/^(\+62|62|0)8[1-9][0-9]{6,9}$/',$phone_number)){
        danger("Phone number salah");
        $valid = false;
    }
    // Blood Type
    // Blood Type id harus merupakan sebuah id yang valid di tabel blood_types 
    // (Hint 1: lakukan query id, dan cek apakah ada. Untuk query sekaligus gunakan fetch_all, ubah menjadi array menggunakan array_column, kemudian check menggunakan in_array)
    // https://www.w3schools.com/php/func_mysqli_fetch_all.asp
    // (Hint 2: Jika cara diatas sulit, lakukan query select dengan where, check banyak row yang diterima)
    $query_blood_type =" SELECT * FROM blood_types WHERE id ='".$blood_type_id."' ";
    $result_blood_type = $db->query($query_blood_type);
    if(!$result_blood_type){
        die("Could not query the database: <br />". $db->error ."<br> Query: ".$query);
    }

    if($result_blood_type->num_rows == 0){
        danger("Blood type invalid");
        $valid = false;
    }
    $result_blood_type->free();

    // Hobby Validation
    // Mirip dengan blood type, dengan tabel hobbies
    $query_hobby =" SELECT * FROM hobbies WHERE id ='".$hobby_id."' ";
    $result_hobby = $db->query($query_hobby);
    if(!$result_hobby){
        die("Could not query the database: <br />". $db->error ."<br> Query: ".$query);
    }

    if($result_hobby->num_rows == 0){
        danger("Hobby invalid");
        $valid = false;
    }
    $result_hobby->free();

    // Best Three
    // Buat yang pertama required sementara yang kedua dan ketiga nullable
    if($best_three_1 == ''){
        danger("Best 3 pertama harus diisi");
        $valid = false;
    }

    // TODO 5: INSERT DATA
    if($valid){
        $query = " INSERT INTO profile_books (name, nickname, address, phone_number, blood_type_id, hobby_id, best_three_1, best_three_2, best_three_3)
        VALUES ('".$name."', '".$nickname."', '".$address."', '".$phone_number."', '".$blood_type_id."', '".$hobby_id."', '".$best_three_1."', '".$best_three_2."', '".$best_three_3."') ";
        $result = $db->query($query);
        if(!$result){
            die("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        } else {
            danger("Success!");
        }
    }

?>