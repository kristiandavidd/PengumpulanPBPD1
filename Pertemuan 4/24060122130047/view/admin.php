<!-- 
 Nama: Tirza Aurellia Wijaya
 NIM: 24060122130047
 Tanggal Pengerjaan: 24 Sept 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <?php
        session_start();    //inisialisasi session
        if (!isset($_SESSION['username'])) {
            # code...
            header('Location: login.php');
        }

        include('../header.php') ?>
    <br>
    <div class = "card">
        <div class = "card-header text-center">Admin Page</div>
        <div class = "card-body text-center">
            <p>Welcome...</p>
            <p>You are logged in as <b><?php echo $_SESSION['username']; ?></p>
            <br><br>
            <a class = "btn btn-primary" href="view_customer.php">Lihat Customer</a>&nbsp;&nbsp;
            <a class = "btn btn-danger" href="logout.php">Logout</a>
        </div>
    </div>
    <?php include('../footer.php') ?>
</body>
</html>