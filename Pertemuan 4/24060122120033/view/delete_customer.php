<!-- 
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pembuatan   : Minggu, 22 September 2024
    Nama File           : delete_customer.php
-->

<?php
    session_start();
    
    if (!isset($_SESSION['username'])){
        header('Location: ../lib/login.php');
    }

    require_once('../lib/db_login.php');
    $id = $_GET['id']; // Mendapatkan customerid yang dilewatkan ke URL

    // Mengecek apakah user menekan tombol submit
    if (!empty($id) && isset($id)){
        // Assign a query
        $query = " DELETE FROM customers WHERE customerid=".$id." ";
            
        // Execute the query
        $result = $db->query( $query );
        if (!$result){
            die ("Could not query the database: <br />".$db->error. '<br>Query:' .$query);
        } else {
            $db->close();
            header('Location: view_customer.php');
        }
    }
?>