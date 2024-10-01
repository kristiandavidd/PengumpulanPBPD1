<?php
// Nama : Bima Aditya Aryono / 24060122140113
// File : edit_customer.php
// Deskripsi : menampilkan form edit data customer dan mengupdate data ke database
session_start();

// Cek apakah user sudah login dan adalah admin
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] !== true) {
    // Redirect ke halaman login jika tidak memiliki akses
    header("Location: login.php");
    exit;
}
require_once('../lib/db_login.php');

// Mengecek apakah parameter 'id' ada di URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id']; // Mendapatkan customerid yang dilewatkan ke URL
} else {
    die("Error: Customer ID tidak ditemukan.");
}

// Mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])) {
    // Query untuk mengambil data berdasarkan customerid
    $query = "SELECT * FROM customers WHERE customerid=" . $id . ";";
    // Execute the query
    $result = $db->query($query);
    if (!$result) {
        die("Could not query the database: <br />" . $db->error);
    } else {
        while ($row = $result->fetch_object()) {
            $name = $row->name;
            $address = $row->address;
            $city = $row->city;
        }
    }
} else {
    $valid = TRUE; // flag validasi
    $name = test_input($_POST['name']);
    if ($name == '') {
        $error_name = "Name is required";
        $valid = FALSE;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }

    $address = test_input($_POST['address']);
    if ($address == '') {
        $error_address = "Address is required";
        $valid = FALSE;
    }

    $city = $_POST['city'];
    if ($city == '' || $city == 'none') {
        $error_city = "City is required";
        $valid = FALSE;
    }

    // Update data into database
    if ($valid) {
        // Escape input data
        $address = $db->real_escape_string($address);
        // Assign a query
        $query = "UPDATE customers SET name='" . $name . "', address='" . $address . "', city='" . $city . "' WHERE customerid='" . $id . "';";
        // Execute the query
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
<?php include('../view/header.html'); ?>

<div class="card">
    <div class="card-header">Edit Customers Data</div>
    <div class="card-body">
        <form method="post" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                <div class="error"><?php if (isset($error_name)) echo $error_name; ?></div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="5"><?php echo $address; ?></textarea>
                <div class="error"><?php if (isset($error_address)) echo $error_address; ?></div>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <select class="form-control" id="city" name="city" required>
                    <option value="none" <?php if (!isset($city)) echo 'selected="true"'; ?>>--Select a city--</option>
                    <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo 'selected="true"'; ?>>Airport West</option>
                    <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo 'selected="true"'; ?>>Box Hill</option>
                    <option value="Yarraville" <?php if (isset($city) && $city == "Yarraville") echo 'selected="true"'; ?>>Yarraville</option>
                </select>
                <div class="error"><?php if (isset($error_city)) echo $error_city; ?></div>
            </div>

            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<?php include('../view/footer.html'); ?>
<?php $db->close(); ?>
