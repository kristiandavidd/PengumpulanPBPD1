<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 23 September 2024-->
<?php
// Mulai Sesi
session_start();

require_once('../lib/db_login.php');

// query untuk dapetin semuua buku
$query = "SELECT * FROM books";
$result = $conn->query($query); //ini buat naro hasilnya

if (!$result) {
    die ("Could not query the database: <br />". $conn->error);
}//kl kosonng brati gagal
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
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
    <div class="container mt-5">
        <h1>Daftar Buku</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_object()){ ?>
                    <tr>
                        <td><?php echo $row->isbn; ?></td>
                        <td><?php echo $row->title; ?></td>
                        <td><?php echo $row->author; ?></td>
                        <td>Rp <?php echo number_format($row->price, 0, ",", "."); ?></td>
                        <td>
                            <a href="show_cart.php?id=<?php echo $row->isbn; ?>" class="btn btn-primary btn-sm">
                                Tambah ke Keranjang
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="show_cart.php" class="btn btn-success">Lihat Keranjang</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$result->free();
$conn->close();
?>