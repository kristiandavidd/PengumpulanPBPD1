<!-- Nama : Aldisar Gibran -->
<!-- NIM : 24060122130081 -->
<!-- Tanggal : 25-09-2024 -->
<?php 
require_once('lib/db_login.php');

if(isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM books b LEFT JOIN categories c ON b.categoryid = c.categoryid WHERE title LIKE '%$keyword%' LIMIT 1";
    $result = $db->query($query);
} else {
    echo "Masukkan kata kunci pencarian di atas.";
    exit; 
}
?>
<?php include('../header.html') ?>
<h3>Hasil Pencarian Buku</h3>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_object()) {
        echo '<strong>ISBN: '. $row->isbn . '</strong><br>';
        echo 'title: '. $row->title . '<br>';
        echo 'Author: '. $row->author . '<br>';
        echo 'Category: '. $row->name . '<br>';
        echo 'Price: '. $row->price . '<br>';
    }
} else {
    echo "Tidak ada hasil yang ditemukan.";
}

$result->free();
$db->close();
?>
<?php include('../footer.html') ?>
