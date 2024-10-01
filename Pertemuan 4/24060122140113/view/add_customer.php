<?php
// Nama : Bima Aditya Aryono / 24060122140113
// File: add_customer.php
// Deskripsi: Menampilkan form untuk menambah customer baru dan menyimpan data ke database

// File: add_customer.php

require_once('../lib/db_login.php');
// Mulai sesi
session_start();
// Cek apakah user sudah login dan adalah admin
if (!isset($_SESSION['username']) || $_SESSION['is_admin'] !== true) {
    // Redirect ke halaman login jika tidak memiliki akses
    header("Location: login.php");
    exit;
}
// Mengecek apakah user sudah menekan tombol submit
if (isset($_POST["submit"])) {
    $valid = TRUE; // flag validasi
    
    // Validasi name
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

    // Jika validasi sukses, simpan data ke database
    if ($valid) {
        // Menentukan ID baru biar ID pada database tidak bolong misal id 5 terus langsung 12 karena customer id 6-11 dihapus
        $result = $db->query("SELECT MIN(customerid) AS min_id FROM customers WHERE customerid NOT IN (SELECT customerid FROM customers)");
        $min_id_row = $result->fetch_assoc();
        $new_id = $min_id_row['min_id'] ? $min_id_row['min_id'] : $db->query("SELECT MAX(customerid) FROM customers")->fetch_row()[0] + 1;

        // Escape input data
        $name = $db->real_escape_string($name);
        $address = $db->real_escape_string($address);

        // Assign a query
        $query = "INSERT INTO customers (customerid, name, address, city) VALUES ('$new_id', '$name', '$address', '$city')";
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
}

?>

<?php include('../view/header.html') ?>

<div class="card">
    <div class="card-header">Add Customer</div>
    <div class="card-body">
        <form method="post" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($name)) echo $name;?>">
                <div class="error"><?php if(isset($error_name)) echo $error_name;?></div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="5"><?php if(isset($address)) echo $address;?></textarea>
                <div class="error"><?php if(isset($error_address)) echo $error_address;?></div>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <select class="form-control" id="city" name="city" required>
                    <option value="none" <?php if (!isset($city) || $city == 'none') echo 'selected';?>>--Select a city--</option>
                    <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo 'selected';?>>Airport West</option>
                    <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo 'selected';?>>Box Hill</option>
                    <option value="Yarraville" <?php if (isset($city) && $city == "Yarraville") echo 'selected';?>>Yarraville</option>
                </select>
                <div class="error"><?php if(isset($error_city)) echo $error_city;?></div>
            </div>

            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<?php include('../view/footer.html') ?>

<?php

$db->close();
?>
a