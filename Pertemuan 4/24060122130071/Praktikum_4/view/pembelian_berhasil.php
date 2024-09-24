<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 23 September 2024-->
<?php
session_start();
require_once('../lib/db_login.php');

// Mengecek apakah ada item di keranjang
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: view_books.php");
    exit();
}

// Proses pembelian
$total_price = 0;
foreach ($_SESSION['cart'] as $isbn => $qty) {
    $query = "SELECT * FROM BOOKS WHERE ISBN='" . $isbn . "'";
    $result = $conn->query($query);

    if ($result && $row = $result->fetch_object()) {
        $subtotal = $row->price * $qty;
        $total_price += $subtotal;
    }
}

// Mengosongkan keranjang setelah pembelian
$_SESSION['cart'] = array();

// Tampilkan notifikasi sukses
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Sukses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFF4EA;
        }
        .notification {
            margin: 50px auto;
            padding: 30px;
            max-width: 600px;
            text-align: center;
            border: 1px solid #227B94;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="notification">
        <h2>Pembelian Sukses!</h2>
        <p>Terima kasih telah melakukan pembelian. <br> Total yang sudah dibayar adalah: <strong><?php echo number_format($total_price, 2); ?> IDR</strong></p>
        <a class="btn btn-primary" href="view_books.php">Kembali ke Daftar Buku</a>
    </div>
</div>
</body>
</html>
