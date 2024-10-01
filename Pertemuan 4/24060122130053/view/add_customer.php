<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 25 September 2024
Lab : PBP D1
Tugas Pertemuan 4
-->
<?php
// File: add_customer.php
require_once('../lib/db_login.php'); // Sesuaikan dengan jalur koneksi database Anda

// Inisialisasi variabel untuk menyimpan error dan nilai input
$error_name = $error_address = $error_city = '';
$name = $address = $city = '';

if (isset($_POST['submit'])) {
    $valid = TRUE; // Flag untuk validasi form

    // Validasi nama
    $name = test_input($_POST['name']);
    if ($name == '') {
        $error_name = "Name is required";
        $valid = FALSE;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }

    // Validasi address
    $address = test_input($_POST['address']);
    if ($address == '') {
        $error_address = "Address is required";
        $valid = FALSE;
    }

    // Validasi city
    $city = $_POST['city'];
    if ($city == '' || $city == 'none') {
        $error_city = "City is required";
        $valid = FALSE;
    }

    // Jika validasi berhasil, simpan data ke database
    if ($valid) {
        // Escape input untuk keamanan
        $name = $db->real_escape_string($name);
        $address = $db->real_escape_string($address);
        $city = $db->real_escape_string($city);

        // Query untuk menambahkan customer baru
        $query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";

        // Eksekusi query
        $result = $db->query($query);

        if (!$result) {
            die("Could not query the database: <br>" . $db->error);
        } else {
            // Redirect ke halaman view_customer.php setelah berhasil menambahkan customer
            $db->close();
            header('Location: view_customer.php');
            exit;
        }
    }
}


?>

<?php include('../header.html'); ?>

<div class="card">
    <div class="card-header">Add New Customer</div>
    <div class="card-body">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                <div class="error"><?php echo $error_name; ?></div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" rows="5"><?php echo $address; ?></textarea>
                <div class="error"><?php echo $error_address; ?></div>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select name="city" id="city" class="form-control">
                    <option value="none" <?php if ($city == 'none') echo 'selected'; ?>> --Select a city--</option>
                    <option value="Airport West" <?php if ($city == 'Airport West') echo 'selected'; ?>>Airport West</option>
                    <option value="Box Hill" <?php if ($city == 'Box Hill') echo 'selected'; ?>>Box Hill</option>
                    <option value="Yarraville" <?php if ($city == 'Yarraville') echo 'selected'; ?>>Yarraville</option>
                </select>
                <div class="error"><?php echo $error_city; ?></div>
            </div> <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Add Customer</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<?php include('../footer.html'); ?>

<?php
// // Tutup koneksi database
// $db->close();
?>
