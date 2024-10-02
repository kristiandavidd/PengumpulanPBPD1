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

if (isset($_POST['submit'])) {
    $is_valid = TRUE;

    // Name Validation
    // Name tidak boleh kosong
    $name = test_input($_POST['name']);
    if ($name == '') {
        $name_error = "Name field is required";
        $is_valid = FALSE;
    }

    // Nickname Validation
    // Nickname tidak boleh kosong
    $nickame = test_input($_POST['nickame']);
    if ($nickame == '') {
        $nickame_error = "Nickame field is required";
        $is_valid = FALSE;
    }

    // Address Validation
    // Address tidak boleh kosong
    if ($address == '') {
        $address_error = "Address field is required";
        $is_valid = FALSE;
    }

    // Phone Number Validation
    // Phone Number tidak boleh kosong dan merupakan nomor yang valid (gunakan regex dari situs ini https://www.huzefril.com/posts/regex/regex-nomor-handphone/)
    // yang simpel dan yang kompleks ok, pilih salah satu
    if (preg_match("/(^(\+62|62|0)8[1-9][0-9]{6,9}$)/", $phone_number) == false) {
        $address_error = "Phone number field is required";
        $is_valid = FALSE;
    }

    // Blood Type
    // Blood Type id harus merupakan sebuah id yang valid di tabel blood_types 
    // (Hint 1: lakukan query id, dan cek apakah ada. Untuk query sekaligus gunakan fetch_all, ubah menjadi array menggunakan array_column, kemudian check menggunakan in_array)
    // https://www.w3schools.com/php/func_mysqli_fetch_all.asp
    // (Hint 2: Jika cara diatas sulit, lakukan query select dengan where, check banyak row yang diterima)
    $mysqli = new mysqli("localhost","my_user","my_password","my_db");
    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }
    $sql = "SELECT Lastname, Age FROM Persons ORDER BY Lastname";
    $result = $mysqli -> query($sql);
    // Fetch all
    $result -> fetch_all(MYSQLI_ASSOC);
    // Free result set
    $result -> free_result();
    $mysqli -> close();

    // Hobby Validation
    // Mirip dengan blood type, dengan tabel hobbies
    $mysqli = new mysqli("localhost","my_user","my_password","my_db");
    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }
    $sql = "SELECT Lastname, Age FROM Persons ORDER BY Lastname";
    $result = $mysqli -> query($sql);
    // Fetch all
    $result -> fetch_all(MYSQLI_ASSOC);
    // Free result set
    $result -> free_result();
    $mysqli -> close();

    }
    // Best Three
    // Buat yang pertama required sementara yang kedua dan ketiga nullable
    $best_three_1 = test_input($_POST['best_three_1']);
    if ($nickame == '') {
        $nickame_error = "Best Three 1 field is required";
        $is_valid = FALSE;
    }


// TODO 5: INSERT DATA
// Update data into database
if ($valid) {
    // Escape inputs data
    $name = $db->real_escape_string($name);
    $nickname = $db->real_escape_string($nickame);
    $address = $db->real_escape_string($address);
    $phone_number = $db->real_escape_string($phone_number);
    $blood_type_id = $db->real_escape_string($blood_type_id);
    $hobby_id = $db->real_escape_string($hobby_id);
    $top_three_1 = $db->real_escape_string($top_three_1);
    $top_three_2 = $db->real_escape_string($top_three_2);
    $top_three_3 = $db->real_escape_string($top_three_3);

    // Asign a query
    $query = "INSERT INTO profile_books (id, name, nickname, address, phone_number, blood_type_id, hobby_id, best_three_1,  best_three_2,  best_three_3) VALUES ('$name', '$address', '$city')";

    // Execute the query
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
    } else {
        $db->close();
        exit;
    }
}
