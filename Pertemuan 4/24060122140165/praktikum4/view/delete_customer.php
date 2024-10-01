<!-- Nama : Farrel Ardana Jati -->
<!-- Nim : 24060122140165 -->
<!-- Tanggal Pengerjaan : 21 September 2024 -->
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="card mt-4">
        <div class="card-body">
            <h2>Delete Customer</h2>

            <?php
    // Include koneksi database
require_once('../lib/db_login.php');

// Ambil ID dari query string
if (isset($_GET['customerid'])) {
    $id = $_GET['customerid'];

    // Query untuk menghapus customer
    $query = "DELETE FROM customers WHERE customerid = $id";
    $result = $db->query($query);

    // Periksa hasil query
    if ($result) {
        // Jika berhasil, redirect ke halaman view_customer.php
        header("Location: view_customer2.php");
        exit;
    } else {
        // Jika gagal, tampilkan pesan error
        echo "<div class='alert alert-danger'>Failed to delete customer: " . $db->error . "</div>";
    }

    // Tutup koneksi database
    $db->close();
} else {
    // Jika tidak ada ID di URL
    echo "<div class='alert alert-danger'>Customer ID is missing.</div>";
}
?>


            
            

            <a href="view_customer2.php" class="btn btn-primary">Back to Customer List</a>
        </div>
    </div>
</body>
</html>
