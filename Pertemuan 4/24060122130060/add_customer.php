<!-- 
Nama : Tara Tirzandina
NIM : 24060122130060
Tanggal : 24 September 2024
-->

<?php

require_once('db_login.php');
$id = $_GET['id'];

//cek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])){
    $query = " SELECT * FROM customers WHERE customerid='".$id."' ";
    //execute query
    $result = $db->query( $query );
    if (!$result){
        die ("Could not query the database: <br />". $db->error);
    } else {
        while ($row = $result->fetch_object()){
            $name = $row->name;
            $address = $row->addres;
            $city = $row->city;
        }
    }
} else {
    $valid = TRUE;
    $name = test_input($_POST['name']);
    if ($name == ''){
        $error_name = "Name is required";
        $valid = FALSE;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)){
        $error_name = "Only letters and white spaces allowed";
        $valid = FALSE;
    }

    $address = test_input($_POST['address']);
    if ($address == ''){
        $error_address = "Address is required";
        $valid = FALSE;
    }

    $city = $_POST['city'];
    if ($city == '' || $city == 'none'){
        $error_city = "City is required";
        $valid = FALSE;
    }

    //update data into database
    if($valid){
        $address = $db->real_escape_string($address);
        //assign query
        $query = " INSERT INTO customers VALUES ('".$name."', '".$name."', '".$address."','".$city."') ";
        //Execute query
        $result = $db->query ( $query );
        if (!$result){
            die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
        } else {
            $db->close();
            header('Location: view_customer.php');
        }
    }
}

?>
<?php include('header.php'); ?>
<br>
<div class="card">
    <div class="card-header">Edit Customers Data</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>">
            <div class="form-group">
                    <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name">
                <div class="error"><?php if (isset($error_name)) echo $error_name;?></div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" rows="5">
                </textarea>
                <div class="error"><?php if (isset($error_address)) echo $error_address;?></div>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="none" <?php if (!isset($city)) echo 'selected="true"';?>>--Select a city--</option>
                    <option value="Airport West" <?php if (!isset($city)) echo 'selected="true"';?>>Airport West</option>
                    <option value="Box Hill" <?php if (!isset($city)) echo 'selected="true"';?>>Box Hill</option>
                    <option value="Yarraville" <?php if (!isset($city)) echo 'selected="true"';?>>Yarraville</option>
                </select>
                <div class="error"><?php if (isset($error_city)) echo $error_city;?></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value ="submit">Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">cancel</a>
        </table>
</form>
</div>
</div>
<?php include('footer.php') ?>
<?php
$db->close();
?>