<!-- 
Nama                   : Alya Safina
NIM                    : 24060122140123
Tanggal pengerjaan     : 25 September 2024 
-->

<?php
// Menghubungkan ke database
require_once('../lib/db_login.php');

// Inisialisasi variabel
$name = '';
$address = '';
$city = 'none'; 

// Memeriksa apakah form sudah dikirim
if (!isset($_POST["submit"])) {
} 
else {
    $valid = TRUE;
    // Validasi input nama
    $name = test_input($_POST['name']);
    if ($name == '') {
        $error_name = "Name is Required";
        $valid = FALSE;
    } 
    elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) { 
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }
    // Validasi input alamat
    $address = test_input($_POST['address']);
    if ($address == '') {
        $error_address = "Address is Required";
        $valid = FALSE;
    }
    // Validasi input kota
    $city = $_POST['city'];
    if ($city == '' || $city == 'none') {
        $error_city = "City is Required";
        $valid = FALSE;
    }
    // Jika validasi berhasil, maka simpan data ke database
    if ($valid) {
        $name = $db->real_escape_string($name);
        $address = $db->real_escape_string($address);
        $city = $db->real_escape_string($city);
        $query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";
        // Jika eksekusi query gagal, tampilkan pesan
        $result = $db->query($query);
        if (!$result) {
            die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
        } 
        // Jika eksekusi query berhasil, ganti halaman
        else {
            $db->close();
            header('Location: view_customer.php');
            exit;
        }
    }
}
?>

<!-- Tampilan untuk form  -->
<?php include ('./header.php'); ?>
<br>
<div class="card">
    <div class="card-header">Add Customer</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                <div class="error"><?php if(isset($error_name)) echo $error_name; ?></div>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" id="address" class="form-control" rows="5"><?php echo htmlspecialchars($address); ?></textarea>
                <div class="error"><?php if(isset($error_address)) echo $error_address; ?></div>
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="none" <?php if($city == 'none') echo 'selected="true"';?>>--Select a city--</option>
                    <option value="Airport West" <?php if($city == "Airport West") echo 'selected="true"';?>>Airport West</option>
                    <option value="Box Hill" <?php if($city == "Box Hill") echo 'selected="true"';?>>Box Hill</option>
                    <option value="Yarraville" <?php if($city == "Yarraville") echo 'selected="true"';?>>Yarraville</option>
                </select>
                <div class="error"><?php if(isset($error_city)) echo $error_city; ?></div>
            </div>

            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php 
// Menutup kembali koneksi database
include('./footer.php'); ?>
<?php
$db->close();
?>
