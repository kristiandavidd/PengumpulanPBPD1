<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 25 September 2024
Lab : PBP D1
Tugas Pertemuan 4
-->

<?php
    session_start();
    // error_reporting(0); // Tidak menampilkan pesan warning akibat array key id dan cart yang tidak terdefinisi 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // Lakukan sesuatu dengan $id, misalnya tambahkan ke cart
    } else {
        $id = null; // atau berikan nilai default
    }
    
    if ($id != ''){
        /** Jika $_SESSION['cart'] belum ada, maka inisialisasi dengan array kosong
         *  $_SESSION['cart'] merupakan array asosiatif indeksnya berisi ISBN buku 
         *  yang dipilih dan value-nya berisi jumlah (qty) dari buku dengan ISBN
         *  tersebut 
        */
        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }

        /** Jika $_SESSION['cart'] dengan indeks ISBN buku yang dipilih sudah ada, 
         *  tambahkan value-nya dengan 1. Jika belum ada, buat elemen baru dengan 
         *  indeks tersebut dan set nilainya dengan 1
        */
        if (isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]++;
        } else{
            $_SESSION['cart'][$id] = 1;
        }
    }
?>
<!-- Menampilkan isi shopping cart -->
<?php include('../header.html') ?>
<br>
<div class="card">
    <div class="card-header">Shopping Cart</div>
    <div class="card-body">
        <br>
        <table class="table table-stripped">
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Price * Qty</th>
            </tr>
            <?php
                // Include our login information
                require_once('../lib/db_login.php');
                $sum_qty = 0; // Inisialisasi total item di shopping cart
                $sum_price = 0; // Inisialisasi total price di shopping cart
                if (isset($_SESSION['cart'])) {
                    // Akses cart
                    if (is_array($_SESSION['cart'])){
                        foreach ($_SESSION['cart'] as $id => $qty){
                            $query = " SELECT * FROM books WHERE isbn='".$id."' ";
                            $result = $db->query( $query );
                            if (!$result){
                                die ("Could not query the database: <br>". $db->error ."<br>Query: ".$query);
                            }
                            while ($row = $result->fetch_object()){
                                echo '<tr>';
                                echo '<td>'.$row->isbn.'</td>';
                                echo '<td>'.$row->author.'</td>';
                                echo '<td>'.$row->title.'</td>';
                                echo '<td>'.$row->price.'</td>';
                                echo '<td>'.$qty.'</td>';
                                echo '<td>'.$row->price * $qty.'</td>';
                                echo '</tr>';
    
                                $sum_qty = $sum_qty + $qty;
                                $sum_price = $sum_price + ($row->price * $qty);
                            }
                        }
                } else {
                    $cart = []; // Inisialisasi cart sebagai array kosong jika tidak ada
                }
                
                

                    echo '<tr><td></td><td></td><td></td><td></td><td>'.$sum_qty.'</td><td>'.$sum_price.'</td><tr>';
                    $result->free();
                    $db->close();
                } else{
                    echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>';
                }
            ?>
        </table>
        Total items = <?php echo $sum_qty; ?><br><br>
        <a class="btn btn-primary" href="view_books.php">Continue Shopping</a>
        <a class="btn btn-danger" href="delete_cart.php">Empty Cart</a><br /><br />
    </div>
</div>
<?php include('../footer.html') ?>