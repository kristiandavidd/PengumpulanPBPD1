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

// Koneksi dengan database
require_once('lib/db_login.php');

// Ambil $id dari query string (jika diperlukan)
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Memeriksa apakah form disubmit
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST") {

    $valid = TRUE;
    // Validasi terhadap field name --------------------------------------
    $name = test_input($_POST['name']);
    if ($name == '') {
        $error_name = "Name is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }
    // validasi nickname------------------------------------------------
    $nickname = test_input($_POST['nickname']);
    // Validasi terhadap field name
    if ($name == '') {
        $error_name = "Nickname is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $nickname)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }

    // validasi Phone Number------------------------------------------------
    $phone_number = test_input($_POST['phone_number']);
    // Validasi terhadap field name
    if ($phone_number == '') {
        $error_name = "Phone Number is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $phone_number)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }
    
    // Validasi terhadap field address ---------------------------------
    $address = test_input($_POST['address']);
    if ($address == '') {
        $error_address = "Address is required";
        $valid = FALSE;
    }

    // Validasi terhadap field blood type ------------------------------
    $blood_type_id = $_POST['blood_type_id'];
    if ($blood_type == '' || $blood_type == 'none') {
        $error_blood_type = "Blood Type is required";
        $valid = FALSE;
    }

    // Validasi terhadap field hobby-------------------------------------
    $hobby_id = $_POST['hobby'];
    if ($hobby_id == '' || $hobby_id == 'none') {
        $error_hobby = "Hobby Type is required";
        $valid = FALSE;
    }

    // validasi Phone Number------------------------------------------------
    $best_three_1 = test_input($_POST['best_three_1']);
    // Validasi terhadap field name
    if ($best_three_1 == '') {
        $error_name = "best three 1 Number is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }
    // validasi Phone Number------------------------------------------------
    $best_three_2 = test_input($_POST['best_three_2']);
    // Validasi terhadap field name
    if ($best_three_2 == '') {
        $error_name = "best three 2 Number is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }
    // validasi Phone Number------------------------------------------------
    $best_three_3 = test_input($_POST['best_three_3']);
    // Validasi terhadap field name
    if ($best_three_3 == '') {
        $error_name = "best three 1 Number is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }

    // Update data into database
    if ($valid) {
        $address = $db->real_escape_string($address);
        $query = "INSERT INTO  profile_books(name, nickname, address, phone_number, blood_type_id,hobby_id, best_three_1, best_three_2, best_three_3) VALUES ('$name', '$nickname', '$address', '$phone_number', '$blood_type', '$hobby', '$best_three_1', '$best_three_2', '$best_three_3')";
        echo $query; // Debug statement
        $result = $db->query($query);
        
        if (!$result) {
            die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
        } else {
            $db->close();
            header('Location: view_customer.php');
        }
    }
}
// Name Validation
// Name tidak boleh kosong

// Nickname Validation
// Nickname tidak boleh kosong

// Address Validation
// Address tidak boleh kosong

// Phone Number Validation
// Phone Number tidak boleh kosong dan merupakan nomor yang valid (gunakan regex dari situs ini https://www.huzefril.com/posts/regex/regex-nomor-handphone/)
// yang simpel dan yang kompleks ok, pilih salah satu

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
