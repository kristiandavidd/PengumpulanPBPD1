<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 23 September 2024-->
<?php
session_start();
require_once('../lib/db_login.php');

// ngecek diaa udh login blm
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Jika ada ID buku yang diterima
if (isset($_GET['id'])) {
    $isbn = $_GET['id'];
    if (isset($_SESSION['cart'][$isbn])) {
        $_SESSION['cart'][$isbn]++;
    } else {
        $_SESSION['cart'][$isbn] = 1;
    }
}

// Ambil data keranjang
$cart = $_SESSION['cart'];
$total = 0;

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFF4EA;
        }
        .card {
            margin: 50px auto;
            padding: 30px auto;
            max-width: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #227B94;
            color: #fff;
            font-size: 1.5rem;
        }
        .btn-primary {
            margin-bottom: 20px;
            background-color: #16325B;
            border-color: #16325B;
        }
        table th, table td {
            vertical-align: middle;
            text-align: center;
        }

        table thead th {
            border-color:  #227B94 !important;;
            background-color: #227B94 !important;
            color: #fff;
        }
        .btn-action {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Keranjang Belanja</h2>
    <br>
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
                $result = $conn->query($query);
                
                if (!$result) {
                    die("Could not query the database: <br>" . $conn->error . "<br>Query: " . $query);
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
            $conn->close();
        } else {
            echo '<tr><td colspan="5" align="center">There is no item in shopping cart</td></tr>';
        }
        ?>
    </table>
    Total items = <?php echo $sum_qty; ?><br><br>
    <a class="btn btn-primary" href="view_books.php">Lanjut berbelanja</a>
    <a class="btn btn-primary" href="delete_cart.php">Hapus Keranjang</a>
    <a class="btn btn-primary" href="bayar.php"><i class="bi bi-cart-check"></i> Beli Sekarang</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.js"></script>
</body>
</html>
