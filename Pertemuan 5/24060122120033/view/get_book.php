<!--
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pengerjaan  : Kamis, 26 September 2024
    Nama File           : get_book.php
-->

<?php 
    require_once('../lib/db_login.php');

    // Memeriksa apakah kata kunci sudah dimasukkan
    if(isset($_GET["keyword"])) { // Kata kunci sudah dimasukkan
        $keyword = $_GET["keyword"];

        // Assign a query
        $query = "SELECT * FROM books WHERE title LIKE '%$keyword%' LIMIT 1";
        
        // Execute the query
        $result = $db->query($query);
    } else { // Kata kunci belum dimasukkan
        echo "Masukkan kata kunci pencarian di atas.";
        exit; 
    }
?>
<?php include('../header.html') ?>
<h3>Hasil Pencarian Buku</h3>
<?php
    if ($result->num_rows > 0) {
        // Fetch and display the result
        while($row = $result->fetch_object()) {
            echo '<strong>ISBN: '. $row->isbn . '</strong><br>';
            echo 'Title: '. $row->title . '<br>';
            echo 'Author: '. $row->author . '<br>';
            echo 'Price: '. $row->price . '<br>';
        }
    } else { // Tampilkan pesan berikut jika buku tidak ditemukan
        echo "Tidak ada hasil yang ditemukan.";
    }

    // Free the memory and close DB connection
    $result->free();
    $db->close();
?>
<?php include('../footer.html') ?>
