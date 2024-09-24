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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php include ('../header.php'); ?>
<br>
<div class="card">
    <div class="card-header">Add Customers Data</div>
    <div class="card-body">
    <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table class="table table-bordered">
                <tr>
                    <td style="background-color: #f0f0f0; width: 30%;">
                        <label for="name">Name:</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
                        <div class="error"><?php if(isset($error_name)) echo $error_name;?></div>
                    </td>
                </tr>
                <tr>
                    <td style="background-color: #f0f0f0;">
                        <label for="address">Address:</label>
                    </td>
                    <td>
                        <textarea name="address" id="address" class="form-control" rows="5"><?php echo $address;?></textarea>
                        <div class="error"><?php if(isset($error_address)) echo $error_address;?></div>
                    </td>
                </tr>
                <tr>
                    <td style="background-color: #f0f0f0;">
                        <label for="city">City:</label>
                    </td>
                    <td>
                        <select name="city" id="city" class="form-control" required>
                            <option value="none" <?php if(!isset($city)) echo 'selected="true"';?>>--Select a city--</option>
                            <option value="Airport West" <?php if(isset($city) && $city=="Airport West") echo 'selected="true"';?>>Airport West</option>
                            <option value="Box Hill" <?php if(isset($city) && $city=="Box Hill") echo 'selected="true"';?>>Box Hill</option>
                            <option value="Yarraville" <?php if(isset($city) && $city=="Yarraville") echo 'selected="true"';?>>Yarraville</option>
                        </select>
                        <div class="error"><?php if(isset($error_city)) echo $error_city;?></div>
                    </td>
                </tr>
            </table>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php include('../footer.php') ?>
<?php
$db->close();
?>

</body>
</html>