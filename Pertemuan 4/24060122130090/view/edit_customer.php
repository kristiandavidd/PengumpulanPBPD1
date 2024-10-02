<?php

require_once('../lib/db_login.php');
$id = $_GET['id'];

if (!isset($_POST['submit'])){
    $query = "SELECT * FROM customers WHERE customerid=". $id." ";
    $result = $db->query($query);
    if (!$result){
        die("Could not query the database: <br>".$db->error);
    } else {
        while ($row = $result->fetch_object()){
            $name = $row->name;
            $address = $row->address;
            $city = $row->city;
        }
    }
} else {
    $valid = true;
    $name = test_input($_POST['name']);
    if ($name == ''){
        $error_name = "Name is required";
        $valid = false;
    } elseif (!preg_match("/^[azA-Z ]*/", $name)){
        $error_name = "Only letters and white space allowed";
    }

    $address = test_input($_POST['address']);
    if ($address == ''){
        $error_address = "Address is required";
        $valid = false;
    }

    $city = $_POST['city'];
    if ($city == '' || $city == 'none'){
        $error_city = "City is required";
        $valid = false;
    }

    if ($valid){
        $address = $db->real_escape_string($address);
        $query = "UPDATE customers SET name='".$name."', address='".$address."', city='".$city."' WHERE customerid=".$id;
        $result =  $db->query($query);
        if (!$result){
            die("Could not query the database <br>".$db->error.'<br>Query:'.$query);
        } else {
            $db->close();
            header('Location: view_customer.php');
        }
    }
}
?>
<!-- <?php include('../header.html') ?> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<br>
<div class="card">
    <div class="card-header">Edit Customers Data</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id; ?>">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
                <div class="error"><?php if (isset($error_name)) echo $error_name; ?></div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" rows="5"><?php echo $address; ?></textarea>
                <div class="error"><?php if (isset($error_address)) echo $error_address; ?></div>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="none" <?php if (!isset($city)) echo 'selected="true"'; ?>> --Select a city-- </option>
                    <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo 'selected="true"'; ?>> Airport West </option>
                    <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo 'selected="true"'; ?>> Box Hill </option>
                    <option value="Yarraville" <?php if (isset($city) && $city == "Yarraville") echo 'selected="true"'; ?>> Yarraville </option>
                </select>
                <div class="error"><?php if (isset($error_city)) echo $error_city; ?></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<!-- <?php include('../footer.html') ?> -->
<?php $db->close() ?>