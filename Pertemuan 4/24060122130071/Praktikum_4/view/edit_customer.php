<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 20 September 2024-->
<?php
require_once('../lib/db_login.php');
if (isset($_GET['id'])) {
    $id = $_GET['id']; // mendapatkan customerid yang dilewatkan ke url
} else {
    die("ID is required.");
}
// Memeriksa apakah user belum menekan tombol submit
if (!isset($_POST["submit"])) {
    $query = "SELECT * FROM customers WHERE customerid=".$id." ";
    // Execute the query
    $result = $conn->query($query);
    if (!$result) {
        die ("Could not query the database: <br />". $conn->error);
    } else {
        while ($row = $result->fetch_object()) {
            $name = $row->name;
            $address = $row->address;
            $city = $row->city;
        }
    }
} else {
    $valid = TRUE; 
    $name = test_input($_POST['name']);
    if (empty($name)) {
        $error_name = "Name is required";
        $valid = FALSE;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }

    $address = test_input($_POST['address']);
    if (empty($address)) {
        $error_address = "Address is required";
        $valid = FALSE;
    }

    $city = $_POST['city'];
    if ($city == "" || $city == "none") {
        $error_city = "City is required";
        $valid = FALSE;
    }

    //update data ke database
    if ($valid) {
        $address = $conn->real_escape_string(($address));
        $query = "UPDATE customers SET name='".$name."', address='".$address."', city='".$city."' WHERE customerid=".$id." ";
        // Eksekusi query
        $result = $conn->query($query);
        if (!$result) {
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        } else {
            $_SESSION['message'] = "Data Customer Berhasil di Edit.";
            $conn->close();
            header('Location: ../view/view_customer.php');
            exit();
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Customers Data</title>
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
        <div class="card-header">Edit Data Pelanggan</div>
        <div class="card-body">
            <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id; ?>">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
                    <div class="error"><?php if(isset($error_name)) echo $error_name;?></div>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address" rows="5"><?php echo $address;?></textarea>
                    <div class="error"><?php if(isset($error_address)) echo $error_address;?></div>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <select name="city" id="city" class="form-control" required>
                        <option value="none" <?php if (isset($city) && $city == "") echo "selected";?>>--Select a city--</option>
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
                <button  type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                <br>
                <a href="../view/view_customer.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
$conn->close();
?>