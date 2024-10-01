<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 23 September 2024-->
<?php
// Memulai sesi
session_start();
// ngecek user nya udah loginn belom
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFF4EA;
        }
        .card {
            margin: 50px auto;
            padding: 30px;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #227B94;
            color: #fff;
            font-size: 1.5rem;
        }
        .btn-action {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .btn-primary {
            margin-bottom: 20px;
            background-color: #16325B;
            border-color: #16325B;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Beranda Admin 
            </div>
            <br>
            <div class="card-body">
                <h5 class="card-title">Selamat Datang <?php echo htmlspecialchars($_SESSION['username']); ?></h5>
                <br>
                <div class="btn-action">
                    <a href="view_customer.php" class="btn btn-primary">Lihat Daftar Pelanggan</a>
                    <br>
                    <a href="logout.php" class="btn btn-primary">Keluar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
