<!-- Nama: Happy Desita W. -->
<!-- NIM: 24060122120023 -->
<!-- Tanggal Pengerjaan: 20 September 2024 -->
<!-- Nama File: add_customer.php -->

<?php
    require_once('./lib/db_login.php');

    $name = $address = $city = '';

    // Memeriksa apakah user sudah menekan tombol submit
    if (isset($_POST["submit"])) {
        $valid = TRUE;
        $name = test_input($_POST['name']);

        // Validasi terhadap field name
        if ($name == '') {
            $error_name = "Name is required";
            $valid = FALSE;
        } 
        elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $error_name = "Only letters and white space allowed";
            $valid = FALSE;
        }

        // Validasi terhadap field address
        $address = test_input($_POST['address']);
        if ($address == '') {
            $error_address = "Address is required";
            $valid = FALSE;
        }

        // Validasi terhadap field city
        $city = $_POST['city'];
        if ($city == '' || $city == 'none') {
            $error_city = "City is required";
            $valid = FALSE;
        }

        // Insert data into database
        if ($valid) {
            // Escape input data
            $name = $db->real_escape_string($name);
            $address = $db->real_escape_string($address);
            $city = $db->real_escape_string($city);
            
            // Assign a query
            $query = "INSERT INTO customers (name, address, city) VALUES ('" . $name . "', '" . $address . "', '" . $city . "')";
            $result = $db->query($query);
            if (!$result) {
                die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
            } 
            else {
                $db->close();
                header('Location: view_customer.php');
            }
        }
    }
?>

<?php include('./header.html') ?>
<br>
<div class="card mt-4">
    <div class="card-header">Add New Customer</div>
    <div class="card-body">
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" autocomplete="on">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $name; ?>">
                <div class="error"><?php if (isset($error_name)) echo $error_name ?></div>
            </div>
            <div class="form-group">
                <label for="name">Address:</label>
                <textarea class="form-control" name="address" id="address" rows="5"><?php echo $address; ?></textarea>
                <div class="error"><?php if (isset($error_address)) echo $error_address ?></div>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="none" <?php if (!isset($city)) echo 'selected' ?>>--Select a city--</option>
                    <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo 'selected' ?>>Airport West</option>
                    <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo 'selected' ?>>Box Hill</option>
                    <option value="Yarraville" <?php if (isset($city) && $city == "Yarraville") echo 'selected' ?>>Yarraville</option>
                </select>
                <div class="error"><?php if (isset($error_city)) echo $error_city ?></div>
            </div>
            <br>
            <button type="button" class="btn btn-primary" onclick="add_customer_post()">Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
        <div id="add_response"></div>
    </div>
</div>
<?php include('./footer.html') ?>

<?php
    $db->close();
?>