<!-- Nama: Happy Desita W. -->
<!-- NIM: 24060122120023 -->
<!-- Tanggal Pengerjaan: 20 September 2024 -->
<!-- Nama File: delete_customer.php -->

<?php
    require_once('../lib/db_login.php');

    // Memeriksa apakah ada parameter ID yang dikirimkan
    if (!isset($_GET['id'])) {
        die("Error: No customer ID provided.");
    }

    $id = $db->real_escape_string($_GET['id']);

    // Mengambil data pelanggan yang akan dihapus
    $query = "SELECT * FROM customers WHERE customerid = '$id'";
    $result = $db->query($query);

    if (!$result) {
        die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_object();
    } 
    else {
        die("Customer not found.");
    }

    // Memeriksa apakah user sudah menekan tombol confirm
    if (isset($_POST["confirm"])) {
        // Delete data from database
        $query = "DELETE FROM customers WHERE customerid = '$id'";
        $result = $db->query($query);
        
        if (!$result) {
            die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
        }
        else {
            $db->close();
            header('Location: view_customer.php');
            exit;
        }
    }
?>

<?php include('../header.html') ?>
<br>
<div class="card mt-4">
    <div class="card-header">Delete Customer</div>
    <div class="card-body">
        <h5>Are you sure you want to delete this customer?</h5>
        <table class="table">
            <tr>
                <td>Name:</td>
                <td><?php echo $row->name; ?></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><?php echo $row->address; ?></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><?php echo $row->city; ?></td>
            </tr>
        </table>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $id ?>" method="POST">
            <button type="submit" class="btn btn-danger" name="confirm" value="confirm">Delete</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php include('../footer.html') ?>

<?php
    $db->close();
?>