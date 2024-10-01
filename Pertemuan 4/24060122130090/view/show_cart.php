<?php
session_start();
require_once('../lib/db_login.php'); 

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_GET['id'])) {
    $isbn = $_GET['id'];
    if (isset($_SESSION['cart'][$isbn])) {
        $_SESSION['cart'][$isbn]++;
    } else {
        $_SESSION['cart'][$isbn] = 1;
    }
}

// include('../header.html');
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="card">
    <div class="card-header">Shopping Cart</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <?php
            $sum_qty = 0;
            $sum_price = 0;

            if (is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $isbn => $qty) {
                    $query = "SELECT * FROM BOOKS WHERE ISBN='" . $isbn . "'";
                    $result = $db->query($query);
                    
                    if (!$result) {
                        die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
                    }

                    while ($row = $result->fetch_object()) {
                        $subtotal = $row->price * $qty;
                        echo '<tr>';
                        echo '<td>' . $row->isbn . '</td>';
                        echo '<td>' . $row->title . '</td>';
                        echo '<td>' . number_format($row->price, 2) . '</td>';
                        echo '<td>' . $qty . '</td>';
                        echo '<td>' . number_format($subtotal, 2) . '</td>';
                        echo '</tr>';

                        $sum_qty += $qty;
                        $sum_price += $subtotal;
                    }
                    
                    $result->free(); 
                }
                echo '<tr><td colspan="3"><strong>Total</strong></td><td><strong>' . $sum_qty . '</strong></td><td><strong>' . number_format($sum_price, 2) . '</strong></td></tr>';
                $db->close();
            } else {
                echo '<tr><td colspan="5" align="center">There is no item in shopping cart</td></tr>';
            }
            ?>
        </table>
        Total items = <?php echo $sum_qty; ?><br><br>
        <a class="btn btn-primary" href="view_books.php">Lanjut berbelanja</a>
        <a class="btn btn-primary" href="delete_cart.php">Hapus Keranjang</a>
        </table>
        <br>
    </div>
</div>

<!-- <?php include('../footer.html'); ?> -->