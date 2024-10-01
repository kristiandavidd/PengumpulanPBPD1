<?php

require_once '../responsi-template-striped/lib/db_login.php';

// convert post data to php native assoc array
$data = file_get_contents("php://input");
$requestData = json_decode($data, true);

if (!$requestData) {
    echo "Invalid JSON data received";
    exit;
}

//ngecek ada isinya ga 
$name = $conn->real_escape_string($requestData['name']);
$nickname = $conn->real_escape_string($requestData['nickname']);
$address = $conn->real_escape_string($requestData['address']);
$phone_number = $conn->real_escape_string($requestData['phone_number']);
$blood_type_id = $conn->real_escape_string($requestData['blood_type_id']);
$hobby_id = $conn->real_escape_string($requestData['hobby_id']);
$best_three_1 = $conn->real_escape_string($requestData['best_three_1']);
$best_three_2 = $conn->real_escape_string($requestData['best_three_2']) ;
$best_three_3 = $conn->real_escape_string($requestData['best_three_3']);


function danger($message) {
    echo "<div class='alert alert-danger alert-dismissible'>".
    "<p class='text-danger'>$message</p>".
    "</div>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST['name']);
    $nickname = test_input($_POST['nickname']);
    $address = test_input($_POST['address']);
    $phone_number = test_input($_POST['phone_number']);
    $blood_type_id = test_input($_POST['blood_type_id']);
    $hobby_id = test_input($_POST['hobby_id']);
    $best_three_1 = test_input($_POST['best_three_1']);
    $best_three_2 = test_input($_POST['best_three_2']);
    $best_three_3 = test_input($_POST['best_three_3']);

    // Memastikan semua field terisi
    if (empty($name) || empty($nickname) || empty($address) || empty($phone_number)|| empty($blood_type_id)||empty($hobby_id)||empty($best_three_1 )) {
        $error = "Semua field harus diisi!";
    } else {
        // Menambahkan data
        $query = "INSERT INTO customers (name,nickname,address,phone_number,blood_type_id,hobby_id,best_three_1,best_three_2,best_three_3) VALUES (?, ?, ?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $name, $nickname, $address,$phone_number,$blood_type_id,$hobby_id,$best_three_1,$best_three_2,$best_three_3 );

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            $error = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
$conn->close();

// TODO 5: VALIDATION

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