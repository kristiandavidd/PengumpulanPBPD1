<!-- 
Nama                   : Alya Safina
NIM                    : 24060122140123
Tanggal pengerjaan     : 25 September 2024 
-->

<?php
    // Menghubungkan ke database
    require_once('../lib/db_login.php');
    $id = $_GET['id']; 

    // Mengecek bila form belum di-submit
    if (!isset($_POST["submit"])) {
        $query = "SELECT * FROM customers WHERE customerid = ".$id." ";
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br />".$db->error);
        }
        else {
            while ($row = $result->fetch_object()) {
                $name = $row->name;
                $address = $row->address;
                $city = $row->city;
            }
        }
    }
    else {
        // Validasi input
        $valid = TRUE; 
        // Validasi nama
        $name = test_input($_POST['name']);
        if ($name =='') {
            $error_name = "Name is Required";
            $valid = FALSE;
        }
        elseif (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
            $error_name = "Only letters and white space allowed";
            $valid = FALSE;
        }
        // Validasi alamat
        $address = test_input($_POST['address']);
        if ($address =='') {
            $error_address = "Address is Required";
            $valid = FALSE;
        }
        // Validasi kota
        $city = $_POST['city'];
        if ($city == '' || $city == 'none') {
            $error_city = "City is Required";
            $valid = FALSE;
        }
        // Jika seluruh input valid, maka akan mengedit isi yang ada pada database
        if ($valid) {
            $address = $db->real_escape_string($address);
            $query = "UPDATE customers SET name = '".$name."', address = '".$address."', city = '".$city."' WHERE customerid = ".$id." ";
            $result = $db->query($query);
            if (!$result) {
                die ("Could not query the database: <br />". $db->error. '<br>Query: '.$query);
            }
            else {
                $db->close();
                header('Location: view_customer.php');
            }
        }
    }

?>

<!-- Tampilan form edit customer -->
<?php include ('../header.php'); ?>
<br>
<div class="card">
    <div class="card-header">Edit Customer</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>">
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
// Menutup kembali koneksi database
$db->close();
?>