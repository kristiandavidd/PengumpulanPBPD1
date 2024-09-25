<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 25 September 2024
Lab : PBP D1
Tugas Pertemuan 4
-->

<?php
//File : edit_customer.php
//Deskripsi : menampilkan form edit data customer dan mengupdate data ke database
require_once('../lib/db_login.php');
$id = $_GET['id']; //mendapatkan customerid yang dilewatkan ke url

//mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])) {
        $query = "SELECT * FROM customers WHERE customerid=".$id." "; // Execute the query
        $result = $db->query($query);
        if (!$result) {
        die ("Could not query the database: <br />". $db->error); }
        else{
            while ($row = $result->fetch_object()) {
            $name = $row->name;
            $address = $row->address;
            $city = $row->city;
            }
        }
}
else{
    $valid = TRUE; //flag validasi
    $name = test_input ($_POST['name']); 
    if ($name == ''){
        $error_name = "Name is required";
        $valid = FALSE;
    }elseif (!preg_match("/^[a-zA-Z\s'-]*$/", $name)) { 
        $error_name = "Only letters and white space allowed"; 
        $valid = FALSE;
    }
    $address = test_input($_POST['address']);
    if ($address == '') {
    $error_address = "Address is required";
    $valid = FALSE;
    
    $city = $_POST['city'];
    if ($city =='' || $city=='none') {
    $error_city = "city is required";
    $valid = FALSE;
    }
    //update data into database
    if ($valid) {
        //Asign a query
        //escape inputs data
        $address=$db->real_escape_string($address);
        //Asign a query
        $query = "UPDATE customers SET name= '".$name."', address='".$address."', city='".$city."' WHERE customerid=".$id." ";
        // Execute the query
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br />". $db->error. '<br>Query: ' . $query
            );
        }else{
        $db->close();
        header('Location: view_customer.php');
        }
    }
    }
}
?>

<?php include('../header.html'); ?>
<br>
<div class="card">
<div class="card-header">Edit Customers Data</div>
<div class="card-body">
<form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER[ "PHP_SELF"]).'?id='.$id; ?>">
<div class="form-group">
<label for="name">Nama: </label>
<input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
<div class="error"><?php if (isset($error_name)) echo $error_name; ?></div> </div>
<div class="form-group">
<label for="address">Address:</label>
<textarea class="form-control" id="address" name="address" rows="5"><?php echo $address; ?></textarea>
<div class="error"><?php if (isset($error_address)) echo $error_address; ?></div> </div>
<div class="form-group">
<label for="city">City:</label>
<select name="city" id="city" class="form-control" required>
<option value="none" <?php if (!isset($city)) echo 'selected="true"'; ?>> --Select a city--</option>
<option value="Airport West" <?php if (isset($city) && $city=="Airport West") echo 'selected="true"'; ?>>Airport West</option>
<option value="Box Hill" <?php if (isset($city) && $city=="Box Hill") echo 'selected="true"'; ?>>Box Hill</option>
<option value="Yarraville" <?php if (isset($city) && $city=="Yarraville") echo 'selected="true"'; ?>>Yarraville</option>
</select>
<div class="error"><?php if (isset($error_city)) echo $error_city; ?></div> </div> <br>
<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit </button>
<a href="view_customer.php" class="btn btn-secondary">Cancel</a>
</table>
</form>
</div>
</div>
<?php include('../footer.html') ?>
<?php
$db->close();