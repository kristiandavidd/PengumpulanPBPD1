<?php
//Memulai sesi 
session_start();
require_once('../lib/db_login.php');
// ngecek usernya sudah login atau belum
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST['name']);
    $address = test_input($_POST['address']);
    $city = test_input($_POST['city']);

    // Memastikan semua field terisi
    if (empty($name) || empty($address) || empty($city)) {
        $error = "Semua field harus diisi!";
    } else {
        // Menambahkan data
        $query = "INSERT INTO customers (name, address, city) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("sss", $name, $address, $city);

        if ($stmt->execute()) {
            header("Location: view_customer.php");
            exit;
        } else {
            $error = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
$db->close();
?>
<!DOCTYPE HTML>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pelanggan Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    </select>
                    <div class="error"><?php if(isset($error_city)) echo $error_city;?></div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                <a href="../view/view_customer.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>