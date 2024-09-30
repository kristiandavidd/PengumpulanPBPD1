<?php 
require_once('../lib/db_login.php');

// if (isset($_GET['id'])) {
//     $id = (int) $_GET['id']; // mendapatkan customerid yang dilewatkan ke url
// } else {
    
// }

$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
$name = $address = $city ="";

// check if user haven't submit
if (!isset($_POST["submit"])) {
    $query = "SELECT * FROM  customers WHERE customerid=".$id;
    // execute query
    $result = $db->query($query);
    if (!$result) {
        die ("Could not query the database: <br>".$db->error);
    } else {
        while ($row = $result -> fetch_object()) {
            $name = $row->name;
            $address = $row->address;
            $city = $row->city;
        }
    }
} else {
    $valid = TRUE; // validation flag
    $name = test_input($_POST['name']);
    if ($name == '') {
        $error_name = "Name is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
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

    // update data to database
    if ($valid) {
        $address = $db->real_escape_string($address);
        // asign a query
        $query = " UPDATE customers SET name='".$name."', address='".$address."',
        city='".$city."' where customerid=".$id." ";
        // execute query
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
        } 
        // else {
        //     $db->close();
        // }
    }
}
 ?>

 <?php include('../header.html'); ?>
 <br>
 <div class="card col-md-4 mx-auto">
    <div class="card-header">Edit Customer Data</div>
    <div class="card-body">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id; ?>" 
    method="post" autocomplete="on">
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control"
            value="<?php echo $name; ?>">
            <div class="error"><?php if(isset($error_name)) echo $error_name; ?></div>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea rows="5" class="form-control" id="address" name="address"><?php echo $address; ?></textarea>
            <div class="error"><?php if(isset($error_address)) echo $error_address; ?></div>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <select name="city" id="city" class="form-control" required>
                <option value="none" <?php if(!isset($city)) echo 'selected="true"'; ?>>
                --Select a city--</option>
                <option value="Airport West" <?php if(isset($city) && $city=="Airport West") 
                echo 'selected="true"'; ?>>Airport West</option>
                <option value="Box Hill" <?php if(isset($city) && $city=="Box Hill") 
                echo 'selected="true"'; ?>>Box Hill</option>
                <option value="Yarraville" <?php if(isset($city) && $city=="Yarraville") 
                echo 'selected="true"'; ?>>Yarraville</option>
            </select>
            <div class="error"><?php if(isset($error_city)) echo $error_city; ?></div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
    </form>
    </div>
 </div>
 <?php include('../footer.html'); ?>
 <?php 
 $db->close();
  ?>