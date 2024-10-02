<?php
 
// TODO 1: Lakukan koneksi dengan database
require_once('db_login.php');
// TODO 2: Buat variabel $id yang diambil dari query string parameter
$id = $_GET['id'];
// Memeriksa apakah user belum menekan tombol submit
if (!isset($_POST["submit"])) {
    // TODO 3: Tulislah dan eksekusi query untuk mengambil informasi customer berdasarkan id
    $query = 'SELECT * FROM customers WHERE customerid ='.$id.'';
    $result = $db->query($query);
 
 
    if (!$result) {
        die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
    } else {
        while ($row = $result->fetch_object()) {
            $name = $row->name;
            $address = $row->address;
            $city = $row->city;
        }
    }
 
} else {
    $valid = TRUE;
    // Update data into database
    if ($valid) {
        $query = "DELETE FROM customers WHERE customerid = ".$id;
        $result = $db->query($query);
 
        if (!$result) {
            die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
        } else {
            $db->close();
            header('Location: view_customer.php');
        }
    }
}
?>
<?php include('./header.php') ?>
<br>
<div class="card mt-4">
    <div class="card-header">DELETE Customers Data</div>
    <div class="card-body">
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $id ?>" method="POST" autocomplete="on">
            <div class="form-group">
                <H3>Anda Yakin?</H3>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php include('./footer.php') ?>
<?php
$db->close();
?>