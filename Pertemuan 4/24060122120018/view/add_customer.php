<!-- Nama : Muhammad Naufal Izzudin -->
<!-- Nim : 24060122120018 -->
<!-- Tanggal Pengerjaan : 20 September 2024 -->

<?php 
require_once('../lib/db_login.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = TRUE;
    $name = test_input($_POST['name']);
    if ($name == '') {
        $error_name = "Name is required";
        $valid = FALSE;
    } elseif (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }
    $address = test_input($_POST['address']);
    if ($address == '') {
        $error_address = "Address is required";
        $valid = FALSE;
    }
    $city = test_input($_POST['city']);
    if ($city == '' || $city == 'none') {
        $error_city = "City is required";
        $valid = FALSE;
    }
    if ($valid) {
        $address = $db->real_escape_string($address);
        $query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        } else {
            $db->close();
            header('Location: view_customer.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
            <div class="card">
                <div class="card-header text-black">Add Customer</div>
                <div class="card-body">
                    <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($name)) echo $name; ?>">
                            <div class="text-danger"><?php if (isset($error_name)) echo $error_name; ?></div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address" rows="5"><?php if (isset($address)) echo $address; ?></textarea>
                            <div class="text-danger"><?php if (isset($error_address)) echo $error_address; ?></div>
                        </div>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <select name="city" id="city" class="form-control" required>
                                <option value="none" <?php if (!isset($city)) echo 'selected="true"'; ?>>--Select a city--</option>
                                <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo 'selected="true"'; ?>>Airport West</option>
                                <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo 'selected="true"'; ?>>Box Hill</option>
                                <option value="Yarraville" <?php if (isset($city) && $city == "Yarraville") echo 'selected="true"'; ?>>Yarraville</option>
                            </select>
                            <div class="text-danger"><?php if (isset($error_city)) echo $error_city; ?></div>
                        </div>
						<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
						<a href="view_customer.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
$db->close(); 
?>
