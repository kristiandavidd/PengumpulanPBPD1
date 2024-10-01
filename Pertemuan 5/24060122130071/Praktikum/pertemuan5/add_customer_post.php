<?php
require_once('./lib/db_login.php');

// Check if the form fields are set and not empty
$name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
$address = isset($_POST['address']) ? $conn->real_escape_string($_POST['address']) : '';
$city = isset($_POST['city']) ? $conn->real_escape_string($_POST['city']) : '';

// Ensure none of the fields are empty
if ($name !== '' && $address !== '' && $city !== '') {
    // Assign a query
    $query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";
    $result = $conn->query($query);

    if (!$result) {
        // Display error message if the query fails
        echo '<div class="alert alert-danger alert-dismissible"><strong>Error! </strong> Could not query the database <br>'.$conn->error.'<br></div>';
    } else {
        // Display success message if the query was successful
        echo '<div class="alert alert-success alert-dismissible"><strong>Success! </strong> Data has been added.<br>
        Name: '.$name.'<br>
        Address: '.$address.'<br>
        City: '.$city.'<br></div>';
    }
} else {
    // Display a warning message if any of the fields are empty
    echo '<div class="alert alert-warning alert-dismissible"><strong>Warning! </strong> Please fill out all fields.<br></div>';
}

// Close connection
$conn->close();
?>
?>
<!DOCTYPE HTML>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pelanggan Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFF4EA;
        }
        .card {
            margin: 50px auto;
            padding: 30px auto;
            max-width: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #227B94;
            color: #fff;
            font-size: 1.5rem;
        }
        .btn-primary {
            margin-bottom: 20px;
            background-color: #16325B;
            border-color: #16325B;
        }
        table th, table td {
            vertical-align: middle;
            text-align: center;
        }
        table thead th {
            border-color:  #227B94 !important;
            background-color: #227B94 !important; 
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">Tambah Pelanggan Baru</div>
        <div class="card-body">
            <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>">
                    <div class="error"><?php if(isset($error_name)) echo $error_name;?></div>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address" rows="5"><?php echo isset($address) ? $address : ''; ?></textarea>
                    <div class="error"><?php if(isset($error_address)) echo $error_address;?></div>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <select name="city" id="city" class="form-control" required>
                        <option value="none" <?php if (!isset($city) || $city == "") echo "selected";?>>--Select a city--</option>
                        <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo "selected";?>>Airport West</option>
                        <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo "selected";?>>Box Hill</option>
                        <option value="Yarraville" <?php if (isset($city) && $city == "Yarraville") echo "selected";?>>Yarraville</option>
                        <option value="Jakarta" <?php if (isset($city) && $city == "Jakarta") echo "selected";?>>Jakarta</option>
                        <option value="Bandung" <?php if (isset($city) && $city == "Bandung") echo "selected";?>>Bandung</option>
                        <option value="Surabaya" <?php if (isset($city) && $city == "Surabaya") echo "selected";?>>Surabaya</option>
                        <option value="Yogyakarta" <?php if (isset($city) && $city == "Yogyakarta") echo "selected";?>>Yogyakarta</option>
                        <option value="Medan" <?php if (isset($city) && $city == "Medan") echo "selected";?>>Medan</option>
                        <option value="Semarang" <?php if (isset($city) && $city == "Semarang") echo "selected";?>>Semarang</option>
                        <option value="Malang" <?php if (isset($city) && $city == "Malang") echo "selected";?>>Malang</option>
                        <option value="Makassar" <?php if (isset($city) && $city == "Makassar") echo "selected";?>>Makassar</option>
                        <option value="Denpasar" <?php if (isset($city) && $city == "Denpasar") echo "selected";?>>Denpasar</option>
                        <option value="Palembang" <?php if (isset($city) && $city == "Palembang") echo "selected";?>>Palembang</option>
                        <option value="Pontianak" <?php if (isset($city) && $city == "Pontianak") echo "selected";?>>Pontianak</option>
                        <option value="Pekanbaru" <?php if (isset($city) && $city == "Pekanbaru") echo "selected";?>>Pekanbaru</option>
                        <option value="Banjarmasin" <?php if (isset($city) && $city == "Banjarmasin") echo "selected";?>>Banjarmasin</option>
                    </select>
                    <div class="error"><?php if(isset($error_city)) echo $error_city;?></div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                <br>
                <a href="../view/view_customer.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
