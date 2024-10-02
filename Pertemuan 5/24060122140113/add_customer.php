<?php
// Nama : Bima Aditya Aryono / 24060122140113
// File: add_customer.php
// Deskripsi: Menampilkan form untuk menambah customer baru dan menyimpan data ke database

?>
<?php


require_once('./lib/db_login.php');

if (isset($_POST['submit'])) {
    $is_valid = TRUE;

    // Lakukan validasi terhadap isi form name
    $name = test_input($_POST['name']);
    if ($name == '') {
        $name_error = "Name field is required";
        $is_valid = FALSE;
    }

    // Lakukan validasi terhadap isi form address
    $address = test_input($_POST['address']);
    if ($address == '') {
        $address_error = "Address field is required";
        $is_valid = FALSE;
    }

    // Lakukan validasi terhadap isi form city
    $city = $_POST['city'];
    if ($city == '' || $city == 'none') {
        $city_error = "City field is required";
    }


    // Jika valid maka masukkan ke database
    if ($is_valid) {
        // Escape inputs data
        $address = $db->real_escape_string($address);

        $query = "INSERT INTO customers (`customerid`, `name`, `address`, `city`) VALUES (NULL, '" . $name . "', '" . $address . "', '" . $city . "')";

        // Execute the query
        $result = $db->query($query);
        if (!$result) {
            die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
        } else {
            $db->close();
            header('Location: view_customer.php');
        }
    }
}
?>
<?php include('header.html') ?>

<div class="card">
    <div class="card-header">Add Customer</div>
    <div class="card-body">
        <form method="POST" autocomplete="on">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($name)) echo $name;?>">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="5"><?php if(isset($address)) echo $address;?></textarea>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <select class="form-control" id="city" name="city" required>
                    <option value="none" <?php if (!isset($city) || $city == 'none') echo 'selected';?>>--Select a city--</option>
                    <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo 'selected';?>>Airport West</option>
                    <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo 'selected';?>>Box Hill</option>
                    <option value="Yarraville" <?php if (isset($city) && $city == "Yarraville") echo 'selected';?>>Yarraville</option>
                </select>
            </div>

            <button type="button" class="btn btn-primary" onclick="add_customer_get()">Add(GET)</button>
            <button type="button" class="btn btn-primary" onclick="add_customer_post()">Add(POST)</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<div id="add_response"></div>

<?php include('footer.html') ?>

