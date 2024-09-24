<!-- 
Nama                   : Alya Safina
NIM                    : 24060122140123
Tanggal pengerjaan     : 25 September 2024 
-->

<?php
    // Menghubungkan ke database
    require_once('../lib/db_login.php');
    if (isset($_GET['id'])) {
        $customerid = $_GET['id'];
    } 
    else {
        die("Error. ID not available.");
    }
    // Jika menekan tombol confirm, maka data customer akan terhapus
    if (isset($_POST['confirm'])) {
        // Menghapus data customer
        $query = "DELETE FROM customers WHERE customerid = $customerid";
        $result = $db->query($query);

        if ($result) {
            header('Location: view_customer.php');
            exit;
        } 
        else {
            die("Error deleting record: " . $db->error);
        }
    }
    // Jika menekan tombol cancel, maka akan kembali ke halaman vie_customer
    if (isset($_POST['cancel'])) {
        header('Location: view_customer.php');
        exit;
    }
    // Jika data yang mau dihapus tidak ada di database
    $query = "SELECT * FROM customers WHERE customerid = $customerid";
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error);
    }
    $customer = $result->fetch_object();
?>

<!-- Tampilan form konfirmasi sebelum menghapus data customer -->
<div class="container mt-5">
    <h3>Delete Customer</h3>
    <p>Are you sure you want to delete the following customer?</p>
    <p><strong>Name:</strong> <?php echo $customer->name; ?></p>
    <p><strong>Address:</strong> <?php echo $customer->address; ?></p>
    <p><strong>City:</strong> <?php echo $customer->city; ?></p>

    <form method="POST" action="">
        <button type="submit" name="confirm" class="btn btn-danger">Confirm</button>
        <button type="submit" name="cancel" class="btn btn-secondary">Cancel</button>
    </form>
</div>
