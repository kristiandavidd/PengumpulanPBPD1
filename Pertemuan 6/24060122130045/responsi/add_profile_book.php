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
?>

<?php
require_once('./lib/db_login.php');
$errors = [];
$success = false;

if (isset($_POST['submit'])) {

    $name = test_input($_POST['name']);
    if ($name == '') {
        $errors[] = "Nama tidak boleh kosong";
    }

    $nickname = test_input($_POST['nickname']);
    if ($nickname == '') {
        $errors[]  = "Nickname tidak boleh kosong";
    }

    $address = test_input($_POST['address']);
    if ($address == '') {
        $errors[]  = "Alamat tidak boleh kosong";
    }
    
    $phone_number = test_input($_POST['phone_number']);
    if (($phone_number == '') || !preg_match("/^(\+62|62|0)8[1-9][0-9]{6,9}$/", $_POST['phone_number'])){
        $errors[]  = "Nomor Telepon tidak valid";
    }

    // if ($is_valid) {
    //     $address = $db->real_escape_string($address);

    //     $query = "INSERT INTO `profile_books` (`name`, `nickname`, `address`, `phone_number`, `blood_type_id', 'hobby_id', 'best_three_1', 'best_three_2', 'best_three_3' ) VALUES (NULL, '" . $name . "', '" . $address . "', '" . $city . "')";

    //     $result = $db->query($query);
    //     if (!$result) {
    //         die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
    //     } else {
    //         $db->close();
    //         header('Location: index.php');
    //     }
    // }

    if (empty($errors)) {
        $name = $_POST['name'];
        $nickname = $_POST['nickname'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone_number'];

        $sql = "INSERT INTO `profile_books` (`id`, `name`, `nickname`, `address`, `phone_number``blood_type_id', 'hobby_id', 'best_three_1', 'best_three_2', 'best_three_3' )
                VALUES ('$name', '$nickname', '$address', '$phone_number')";

        if ($db->query($sql) === TRUE) {
            $success = true;
        } else {
            $errors[] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

?>
<!-- // TODO 5: VALIDATION

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


// TODO 5: INSERT DATA -->