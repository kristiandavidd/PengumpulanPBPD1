<!--
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pengerjaan  : Rabu, 2 Oktober 2024
    Nama File           : get_validate_phone_number.php
-->

<?php
    require_once 'lib/db_login.php';
    $phone_number = $_GET['phone_number'];

    if ($phone_number == '') {
        echo "";
        exit;
    }

    // TODO 6 : lakukan validasi dengan mengambil apakah phone_number sudah ada (hint: query select dengan where)
    // Assign A Query
    $query = " SELECT phone_number FROM profile_books WHERE phone_number=".$phone_number." ";

    // Execute the query
    $result = $db->query($query);

    if (!$result) { // Tampilkan pesan error jika query gagal dieksekusi
        die("Could not query the database: <br>" . $db->error);
    }

    // Fetch and display the result
    if ($result->num_rows > 0) {
        echo "Phone number is used by someone else!";
    } else {
        echo "Phone number is available!";
    }

    // Free the memory and close DB connection
    $result->free();
    $db->close();   
?>