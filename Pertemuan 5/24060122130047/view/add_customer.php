<!-- 
 Nama: Tirza Aurellia Wijaya
 NIM: 24060122130047
 Tanggal Pengerjaan: 24 Sept 2024 -->
<?php
    require_once('../lib/db_login.php');

    // Mengecek apakah user belum menekan tombol submit
    if (!isset($_POST["submit"])) {
        // Hapus logika SELECT jika ini adalah halaman untuk menambah data baru
    } else {
        $valid = TRUE; // Flag validasi
        $name = test_input($_POST['name']);
        if ($name == '') {
            $error_name = "Name is Required";
            $valid = FALSE;
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) { // Mengizinkan huruf dan spasi
            $error_name = "Only letters and white space allowed";
            $valid = FALSE;
        }

        $address = test_input($_POST['address']);
        if ($address == '') {
            $error_address = "Address is Required";
            $valid = FALSE;
        }

        $city = $_POST['city'];
        if ($city == '' || $city == 'none') {
            $error_city = "City is Required";
            $valid = FALSE;
        }

        // Update data into database
        if ($valid) {
            // Escape inputs data
            $name = $db->real_escape_string($name);
            $address = $db->real_escape_string($address);
            $city = $db->real_escape_string($city);

            // Asign a query
            $query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";

            // Execute the query
            $result = $db->query($query);
            if (!$result) {
                die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
            } else {
                $db->close();
                header('Location: view_customer.php');
                exit;
            }
        }
    }
?>


<?php include ('./header.php'); ?>
<br>
<div class="card">
    <div class="card-header">Add Customers Data</div>
    <div class="card-body">
    <form method="GET" autocomplete="on">
        <div class = "form-group">
            <label for="name">Name:</label>
            <input type="text" class = "form-control" id = "name" name = "name">
        </div>
        <div class = "form-group">
            <label for="address">Address:</label>
            <textarea name="address" id="address" class = "form-control" rows = "5"></textarea>
        </div>
        <div class = "form-group">
            <label for="city">City</label>
            <select name="city" id="city" class="form-control" required>
                <option value="Airport West" <?php if(isset($city) && $city=="Airport West") echo 'selected="true"';?>>Airport West</option>
                <option value="Box Hill" <?php if(isset($city) && $city=="Box Hill") echo 'selected="true"';?>>Box Hill</option>
                <option value="Yarraville" <?php if(isset($city) && $city=="Yarraville") echo 'selected="true"';?>>Yarraville</option>
            </select>
        </div><br>
        <button type = "button" class = "btn btn-primary" onclick = "add_customer_get()">Add(Get)</button>
        <button type = "button" class = "btn btn-danger" onclick = "add_customer_post()">Add(Post)</button>
    </form>
    <br>
    <div id = "add_response"></div>
    </div>
</div>
<?php include('./footer.php') ?>
<?php
$db->close();
?>
