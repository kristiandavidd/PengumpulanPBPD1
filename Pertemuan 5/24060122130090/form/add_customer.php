<!DOCTYPE HTML>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pelanggan Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="ajax.js"></script>
</head>
<body>
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">Tambah Pelanggan Baru</div>
        <div class="card-body">
            <form method="GET" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                <button type="button" class="btn btn-primary" onclick="add_customer_post()">Submit</button>
                <a href="../view/view_customer.php" class="btn btn-secondary">Cancel</a>
            </form>
            <br>
            <div id="add_response"></div>
        </div>
    </div>
</div>
</body>
</html>