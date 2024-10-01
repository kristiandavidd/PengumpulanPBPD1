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

// Menghitung total harga dari keranjang belanja
$total_price = 0;
foreach ($_SESSION['cart'] as $isbn => $qty) {
    $query = "SELECT * FROM BOOKS WHERE ISBN='" . $isbn . "'";
    $result = $conn->query($query);

    if ($result && $row = $result->fetch_object()) {
        $subtotal = $row->price * $qty;
        $total_price += $subtotal;
    }
}

// Proses ketika form pembayaran dikirimkan
if (isset($_POST['submit'])) {
    // Simpan data pembayaran, misalnya metode pembayaran
    $payment_method = $_POST['payment_method'];

    // Lanjutkan ke halaman pembelian sukses
    header("Location: pembelian_berhasil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFF4EA;
        }
        .payment-form {
            margin: 50px auto;
            padding: 30px;
            max-width: 600px;
            border: 1px solid #227B94;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="payment-form">
        <h2>Konfirmasi Pembayaran</h2>
        <p>Total yang harus dibayar: <strong><?php echo number_format($total_price, 2); ?> IDR</strong></p>
        
        <form method="POST" action="pembelian_berhasil.php">
            <div class="mb-3">
                <label for="payment_method" class="form-label">Metode Pembayaran:</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="credit_card">Kartu Kredit</option>
                    <option value="bank_transfer">Transfer Bank</option>
                    <option value="ewallet">E-Wallet</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Bayar Sekarang</button>
        </form>
    </div>
</div>
</body>
</html>
