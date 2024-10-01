<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 25 September 2024
Lab : PBP D1
Tugas Pertemuan 4
-->

<?php
// File: view_books.php
require_once('../lib/db_login.php'); // Sesuaikan dengan koneksi database Anda

// Query untuk mengambil data buku dari database
$query = "SELECT * FROM books"; // Pastikan nama tabel sesuai dengan database Anda
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}

?>

<?php include('../header.html'); ?>

<div class="card">
    <div class="card-header">Books Data</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data buku dalam tabel
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['isbn'] . '</td>';
                    echo '<td>' . $row['author'] . '</td>';
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>$' . number_format($row['price'], 2) . '</td>';
                    echo '<td><a class="btn btn-primary" href="show_cart.php?id='.$row['isbn'].'">Add to Cart</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <?php
        // Menampilkan total jumlah baris
        echo '<p>Total Rows = ' . $result->num_rows . '</p>';
        ?>
    </div>
</div>

<?php include('../footer.html'); ?>

<?php
// Tutup koneksi database
$db->close();
?>
