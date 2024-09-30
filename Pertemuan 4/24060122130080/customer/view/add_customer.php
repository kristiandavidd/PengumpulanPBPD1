<!-- 
    Nama : Alfonso Clement Sutantio
    NIM : 24060122130080
    Tanggal : 21/09/2024
    File : add_customer.php
 -->
<?php



session_start();


if (!isset($_SESSION['username'])) {
    header('Location: ../lib/login.php');
    exit;
}

require_once('../lib/db_login.php');


$name = '';
$address = '';
$city = '';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $valid = TRUE;


    $name = $db->real_escape_string($_POST['name']);
    $address = $db->real_escape_string($_POST['address']);
    $city = $db->real_escape_string($_POST['city']);


    if ($name == '') {
        $error_name = "Name is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }


    if ($address == '') {
        $error_address = "Address is required";
        $valid = FALSE;
    }


    if ($city == '' || $city == 'none') {
        $error_city = "City is required";
        $valid = FALSE;
    }


    if ($valid) {
        $query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";
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
<?php include('../../header.php') ?>
<br>
<div class="card mt-4">
    <div class="card-header">Add Customers Data</div>
    <div class="card-body">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="on">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $name; ?>">
                <div class="error"><?php if (isset($error_name)) echo $error_name ?></div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address" id="address" rows="5"><?= $address; ?></textarea>
                <div class="error"><?php if (isset($error_address)) echo $error_address ?></div>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="none" <?php if ($city == '' || $city == 'none') echo 'selected' ?>>--Select a city--</option>
                    <option value="Airport West" <?php if ($city == "Airport West") echo 'selected' ?>>Airport West</option>
                    <option value="Box Hill" <?php if ($city == "Box Hill") echo 'selected' ?>>Box Hill</option>
                    <option value="Yarraville" <?php if ($city == "Yarraville") echo 'selected' ?>>Yarraville</option>
                </select>
                <div class="error"><?php if (isset($error_city)) echo $error_city ?></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php include('../../footer.php') ?>
<?php $db->close(); ?>