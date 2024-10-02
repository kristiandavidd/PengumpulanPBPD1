<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 2 Oktober 2024
Lab : PBP D1
Responsi
-->
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


if (isset($_POST['submit'])) {
    $is_valid = TRUE;

    // Lakukan validasi terhadap isi form name
    $name = test_input($_POST['name']);
    if ($name == '') {
        $name_error = "Name field is required";
        $is_valid = FALSE;
    }

    // Lakukan validasi terhadap isi form nickname
    $nickname = test_input($_POST['nickname']);
    if ($nickname == '') {
        $nickname_error = "Nickname field is required";
        $is_valid = FALSE;
    }

    // Lakukan validasi terhadap isi form address
    $address = test_input($_POST['address']);
    if ($address == '') {
        $address_error = "Address field is required";
        $is_valid = FALSE;
    }

    $phone_number = test_input($_POST['phone_number']);
    if ($phone_number == '') {
        $phone_number_error = "Phone number field is required";
        $is_valid = FALSE;
    }

    $blood_type_id = $_POST['blood_type_id'];
    if ($blood_type_id == '' || $blood_type_id == 'none') {
        $blood_type_id_error = "Blood type is required";
    }

    $hobby_id = $_POST['hobby_id'];
    if ($hobby_id == '' || $hobby_id == 'none') {
        $hobby_id_error = "Hobby is required";
    }


    // Jika valid maka masukkan ke database
    if ($is_valid) {
        // Escape inputs data
        $address = $db->real_escape_string($address);

        $query = "INSERT INTO profile_books (id, name, nickname, address, blood_type_id, hobby_id) VALUES (NULL, '" . $name . "','" . $nickname . "', '" . $address . "', '" . $blood_type_id . "','" . $hobby_id . "')";

        // Execute the query
        $result = $db->query($query);
        if (!$result) {
            die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
        } else {
            $db->close();
            header('Location: index.php');
        }
    }
}
?>
