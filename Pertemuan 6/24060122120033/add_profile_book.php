<!--
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pengerjaan  : Rabu, 2 Oktober 2024
    Nama File           : add_profile_books.php
-->

<?php
    require_once 'lib/db_login.php';

    // convert GET data to php native assoc array
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

    // Mengecek apakah user menekan tombol submit
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])){
        $valid = TRUE; // Flag validasi
        
        // Name Validation
        // Name tidak boleh kosong
        $name = test_input($_GET['name']);
        if ($name == ''){
            denger("Nama tidak boleh kosong");
            $valid = FALSE;
        }
        
        // Nickname Validation
        // Nickname tidak boleh kosong
        $nickname = test_input($_GET['nickname']);
        if ($nickname == ''){
            denger("Nickname tidak boleh kosong");
            $valid = FALSE;
        }

        // Address Validation
        // Address tidak boleh kosong
        $address = test_input($_GET['address']);
        if ($address == '' || $address == 'none'){
            denger("Address tidak boleh kosong");
            $valid = FALSE;
        }

        // Phone Number Validation
        // Phone Number tidak boleh kosong dan merupakan nomor yang valid (gunakan regex dari situs ini https://www.huzefril.com/GETs/regex/regex-nomor-handphone/)
        // yang simpel dan yang kompleks ok, pilih salah satu
        $phone_number = $_GET['phone_number'];
        if ($phone_number == ''){
            denger("Nomor Telepon tidak boleh kosong");
            $valid = FALSE;
        } elseif (!preg_match("/^(\+62|62|0)8[1-9][0-9]{6,9}$/", $phone_number)){
            denger("Format Nomor Telepon salah");
            $valid = FALSE;
        }

        // Blood Type
        // Blood Type id harus merupakan sebuah id yang valid di tabel blood_types 
        // (Hint 1: lakukan query id, dan cek apakah ada. Untuk query sekaligus gunakan fetch_all, ubah menjadi array menggunakan array_column, kemudian check menggunakan in_array)
        // https://www.w3schools.com/php/func_mysqli_fetch_all.asp
        // (Hint 2: Jika cara diatas sulit, lakukan query select dengan where, check banyak row yang diterima)
        $query_blood_type = "SELECT id FROM blood_types";
        $result_blood_type = $db->query($query_blood_type);
        $valid_blood_type_ids = array_column($result_blood_type->fetch_all(MYSQLI_ASSOC), 'id');

        if (!in_array($blood_type_id, $valid_blood_type_ids)) {
            danger("Unknown Blood Type");
            $valid = FALSE;
        }

        // Hobby Validation
        // Mirip dengan blood type, dengan tabel hobbies
        $query_hobby = "SELECT id FROM hobbies";
        $result_hobby = $db->query($query_hobby);
        $valid_hobbies = array_column($result_hobby->fetch_all(MYSQLI_ASSOC), 'id');
        if (!in_array($hobby_id, $valid_hobbies)) {
            danger("Unknown hobi");
            $valid = FALSE;
        }

        // Best Three
        // Buat yang pertama required sementara yang kedua dan ketiga nullable
        // Best Three Validation
        $best_three_1 = $_GET['best_three_1'];
        $best_three_2 = isset($_GET['best_three_2']) ? $_GET['best_three_2'] : NULL;
        $best_three_3 = isset($_GET['best_three_3']) ? $_GET['best_three_3'] : NULL;
        if ($best_three_1 == '') {
            danger("Best Three 1 tidak boleh kosong");
            $valid = FALSE;
        }


        // TODO 5: INSERT DATA
        // Update data info database
        if ($valid){
            // Assign a query
            $query = "INSERT INTO profile_books (name, nickname, address, phone_number, blood_type_id, hobby_id, best_three_1, best_three_2, best_three_3) VALUES ('$name', '$nickname', '$address', '$phone_number', '$blood_type_id', '$hobby_id', '$best_three_1', '$best_three_2', '$best_three_3')";
            
            // Execute the query
            $result = $db->query( $query );
            if (!$result){
                die ("Could not query the database: <br />".$db->error. '<br>Query:' .$query);
            } else {
                $db->close();
            }
        }
    }
?>