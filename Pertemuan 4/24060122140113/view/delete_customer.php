<?php
// Nama : Bima Aditya Aryono / 24060122140113
// File: delete_customer.php
// Deskripsi: Menghapus customer dari database

require_once('../lib/db_login.php');

// Mengecek apakah ada ID yang dikirim untuk dihapus
if (isset($_GET['id'])) {
    $valid = TRUE; // flag validasi

    // Ambil ID dan validasi
    $customer_id = test_input($_GET['id']);
    if (!filter_var($customer_id, FILTER_VALIDATE_INT)) {
        $valid = FALSE;
        $error_id = "Invalid customer ID";
    }

    // Jika validasi sukses, hapus data dari database
    if ($valid) {
        // escape input data
        $customer_id = $db->real_escape_string($customer_id);

        // Assign a query
        $query = "DELETE FROM customers WHERE customerid = '$customer_id'";
        // Execute the query
        $result = $db->query($query);
        if (!$result) {
            die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
        } else {
            $db->close();
            header('Location: view_customer.php'); // redirect ke halaman view_customer setelah berhasil
            exit();
        }
    }
} else {
    header('Location: view_customer.php'); // Jika tidak ada ID, redirect ke halaman view_customer
    exit();
}

?>
<?php
session_start();

// Cek apakah user sudah login dan adalah admin
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] !== true) {
    // Redirect ke halaman login jika tidak memiliki akses
    header("Location: login.php");
    exit;
}
?>
<?php include('../view/header.html') ?>

<div class="card">
    <div class="card-header">Delete Customer</div>
    <div class="card-body">
        <p>Are you sure you want to delete this customer?</p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($customer_id); ?>">
            <button type="submit" class="btn btn-danger" name="confirm_delete" value="confirm">Delete</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
        <?php if (isset($error_id)) echo '<div class="error">' . $error_id . '</div>'; ?>
    </div>
</div>

<?php include('../view/footer.html') ?>

<?php

$db->close();
?>
