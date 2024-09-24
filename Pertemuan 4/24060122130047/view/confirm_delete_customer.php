<!-- 
 Nama: Tirza Aurellia Wijaya
 NIM: 24060122130047
 Tanggal Pengerjaan: 24 Sept 2024 -->
<?php
    // Include login information
    require_once('../lib/db_login.php');

    // Ambil customerid dari parameter URL
    if (isset($_GET['id'])) {
        $customerid = $_GET['id'];
    } else {
        die("Error. ID not available.");
    }

    // Cek apakah user sudah mengonfirmasi penghapusan
    if (isset($_POST['confirm'])) {
        // Jika user menekan tombol Confirm, hapus data dari database
        $query = "DELETE FROM customers WHERE customerid = $customerid";
        $result = $db->query($query);

        if ($result) {
            header('Location: view_customer.php');
            exit;
        } else {
            die("Error deleting record: " . $db->error);
        }
    }

    // Jika user membatalkan, kembali ke halaman view_customer.php
    if (isset($_POST['cancel'])) {
        header('Location: view_customer.php');
        exit;
    }

    // Fetch data pelanggan untuk ditampilkan di halaman konfirmasi
    $query = "SELECT * FROM customers WHERE customerid = $customerid";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error);
    }
    $customer = $result->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Delete</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3>Confirm Delete Customer</h3>
        <p>Are you sure you want to delete the following customer?</p>
        <p><strong>Name:</strong> <?php echo $customer->name; ?></p>
        <p><strong>Address:</strong> <?php echo $customer->address; ?></p>
        <p><strong>City:</strong> <?php echo $customer->city; ?></p>
        
        <form method="POST" action="">
            <button type="submit" name="confirm" class="btn btn-danger">Confirm</button>
            <button type="submit" name="cancel" class="btn btn-secondary">Cancel</button>
        </form>
    </div>
</body>
</html>
