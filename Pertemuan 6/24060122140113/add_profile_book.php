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

if(isset($_GET["submit"])){
    $is_valid = TRUE;

    // validasi nama : tdak boleh kosong, hanya dapat berisi huruf dan spasi
        if(empty($name)){
            $error_name = "Nama harus diisi";
            $is_valid = FALSE;

        }
        elseif (!preg_match("/^[a-zA-Z ]*$/", $_GET["name"])) {
            $error_name= "Nama hanya boleh berisi huruf dan spasi.\n";
            $is_valid = FALSE;

        }
        // validasi email
        $nickname = test_input($_GET['nickname']);
        if(empty($nickname)){
            $error_nickname = "nickname harus diisi";
            $is_valid = FALSE;

        }

        // validasi alamat
        $address = test_input($_GET['address$address']);
        if(empty($address)){
            $error_address = "address harus diisi";
            $is_valid = FALSE;

        }
               
        // validasi nomor hp
        if(empty($phone_number)){
            $error_phone_number = "Phone number harus diisi";
            $is_valid = FALSE;

        }
        elseif(!preg_match("^(\+62|62|0)8[1-9][0-9]{6,9}$",$_GET["phone_number"])){
            $error_phone_number = "Nomor tidak sesuai format";
            $is_valid = FALSE;

            }
        // validasi darah
        $queryblood = "SELECT * FROM blood_types where id =".$_GET["blood_types_id"];
        $resultblood = $db->query($queryblood);
        if($blood_type_id ==''){
                $blood_type_error = "blood harus diisi";
                $is_valid = FALSE;

            }
        elseif ($resultblood->num_rows<1) {
                $blood_type_error = "blood harus diisi";
                $is_valid = FALSE;

        }


        // validasi hobby
        if(empty($hobby)){
            $error_hobby = "Pehobbyan harus dipilih";
                        $is_valid = FALSE;

            }

            if ($is_valid) {
                // Escape inputs data
                $address = $db->real_escape_string($address);
            
                $query = "INSERT INTO profile_books (`id`, `name`, `nickname`, `phone_number`, 'blood_type_id', 'hobby_id', 'best_three_1', 'best_three_2', 'best_three_3') VALUES (NULL, '" . $name . "', '" . $nickname . "', '" . $phone_number . "' , '" . $blood_type_id . "', '" . $hobby_id . "' , '" . $best_three_1 . "' , '" . $best_three_2 . "', '" . $best_three_3 . "')";
            
                // Execute the query
                $result = $db->query($query);
                if (!$result) {
                    die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
                } else {
                    $db->close();
                    header('Location: view_customer.php');
                }
            }

    }
?>
<?php
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


?>
