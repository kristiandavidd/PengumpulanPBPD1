<?php
// Nama : Bima Aditya Aryono / 24060122140113
// FILE :show_cart.php
// Deskripsi: Untuk menambahkan item ke shopping cart dan menampilkan isi shopping cart


    // Jika $_SESSION['cart'] belum ada, maka inisialisasi dengan array kosong
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array(); // Array untuk menyimpan ISBN buku yang ada di shopping cart
    }

    // Menambahkan item ke shopping cart dari buku dengan isbn tersebut
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Jika di $_SESSION['cart'] sudah ada ISBN buku yang dipilih, maka update jumlahnya
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]++; // Menambah jumlah item dari buku yang ada
        } else {
            $_SESSION['cart'][$id] = 1; // Menambahkan buku baru ke shopping cart
        }
    }
?>

<!-- Menampilkan isi shopping cart -->
<?php include('header.html'); ?>

<div class="container">
    <div class="header">Shopping Cart</div>
    <div class="body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Inisialisasi total harga
                    $total_price = 0;

                    // Menampilkan semua item yang ada di shopping cart
                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $id => $qty) {
                            require_once('../lib/db_login.php');

                            // Ambil detail buku berdasarkan ISBN
                            $query = "SELECT * FROM books WHERE isbn='".$id."'";
                            $result = $db->query($query);

                            if (!$result) {
                                die("Could not query the database <br>".$db->error."<br>Query: ".$query);
                            }

                            while ($row = $result->fetch_object()) {
                                echo "<tr>";
                                echo "<td>".$row->isbn."</td>";
                                echo "<td>".$row->title."</td>";
                                echo "<td>$".$qty."</td>";

                                // Hitung total harga
                                $item_price = $row->price * $qty;
                                echo "<td>".$item_price."</td>";

                                echo "</tr>";

                                // Tambahkan item ke total harga
                                $total_price += $item_price;
                            }

                            $result->free();
                        }
                    } else {
                        echo "<tr><td colspan='4' align='center'>There is no item in shopping cart</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <hr>
        <?php
            echo "<b>Total: </b>".$total_price."<br>";
        ?>
        <a href="view_book.php" class="btn btn-primary">Continue Shopping</a>
        <a href="delete_cart.php" class="btn btn-danger">Empty Cart</a>
    </div>
</div>

<?php include('footer.html'); ?>
