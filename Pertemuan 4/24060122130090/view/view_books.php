<?php
require_once('../lib/db_login.php'); 

$sql = "SELECT * FROM books";
$result = $db->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <td>$<?php echo number_format($row->price, 2, ",", "."); ?></td>
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
</body>
</html>