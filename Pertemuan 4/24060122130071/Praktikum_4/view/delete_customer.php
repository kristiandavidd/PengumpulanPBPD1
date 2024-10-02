<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 23 September 2024-->
<?php
session_start();
require_once('../lib/db_login.php');
// ngecek udah login belom
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
$error = "";
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = test_input($_GET['id']);
    
    $query = "DELETE FROM customers WHERE customerid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $success = "Customer berhasil dihapus.";
    } else {
        $error = "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    $error = "ID customer tidak valid.";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .btn-primary {
            margin-bottom: 20px;
            background-color: #16325B;
            border-color: #16325B;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Hapus Customer</h2>
        <?php if (!empty($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <?php if (!empty($success)) { ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php } ?>
        <a href="view_customer.php" class="btn btn-primary">Kembali ke Daftar Customer</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>