<!-- 
Nama          : Fendi Ardianto
NIM           : 24060122130077
Tgl Pembuatan : 24 September 2024
Edited        : 27 September 2024
-->

<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: login.php');
  exit();
}
require_once('../lib/db_login.php');

$name = '';
$address = '';


if(isset($_POST["submit"])){
  $valid = TRUE; //flag validasi
  $name = test_input($_POST['name']);
  if($name == ''){
    $error_name = "Name is required";
    $valid = FALSE;
  }elseif(!preg_match("/^[a-zA-Z ]*$/", $name)){
    $error_name = "Only letters and white space allowed";
    $valid = FALSE;
  }

  $address = test_input($_POST['address']);
  if($address == ''){
    $error_address = "Address is required";
    $valid = FALSE;
  }

  $city = $_POST['city'];
  if($city == '' || $city == 'none'){
    $error_city = "City is required";
    $valid = FALSE;
  }

  if($valid){
    $address = $db->real_escape_string(($address));

    $query = "INSERT INTO customers
              VALUES
              ('', '$name',  '$address', '$city')";

    $result = $db->query($query);
    if(!$result){
      die("Could not query the database: <br>"
          .$db->error.'<br>
          Query:'.$query);
    }else{
      echo "<script>
            alert('Data has been added successfully');
            document.location.href='view_customer.php';
            </script>";
      $db->close();
      // header("Location: view_customer.php");
    }
  }
}

?>


<?php include('../header.html') ?>
  <br>
  <div class="card mt-5">
    <div class="card-header">Add Customer Data</div>
    <div class="card-body">
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Nama:</label>
          <input type="text" class="form-control" name="name" id="name" value="<?= $name; ?>">
          <div class="error"><?php if(isset($error_name)) echo $error_name; ?></div>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <textarea name="address" id="address" rows="5" class="form-control"><?= $address; ?></textarea>
          <div class="error"><?php if(isset($error_address)) echo $error_address ?></div>

        </div>
        <div class="form-group">
          <label for="city">City:</label>
          <select name="city" id="city" class="form-control" required>
          <option value="none" <?php if(!isset($city)) echo 'selected="true"'; ?>>--Select a city--</option>
            <option value="Airport West" <?php if(isset($city) && $city == "Airport West") echo 'selected="true"'; ?>>Airport West</option>
            <option value="Box Hill" <?php if(isset($city) && $city == "Box Hill") echo 'selected="true"'; ?>>Box Hill</option>
            <option value="Yarraville" <?php if(isset($city) && $city == "Yarraville") echo 'selected="true"' ?>>Yarraville</option>
          </select>
          <div class="error"><?php if(isset($error_city)) echo $error_city; ?></div>
        </div>
        <br>
        <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button> -->
        <!-- <a href="view_customer.php" class="btn btn-secondary">Cancel</a> -->
        <!-- add get -->
        <!-- <button type="button" class="btn btn-primary" onclick="add_customer_get()" >Add</button> -->
        <!-- add post -->
        <!-- <button type="button" class="btn btn-primary" onclick="add_customer_post()" >Add</button> -->

        <button type="button" class="btn btn-primary" onclick="add_customer_get()">Add Customer (GET)</button>
        <button type="button" class="btn btn-secondary" onclick="add_customer_post()">Add Customer (POST)</button>
      </form>
    </div>
  </div>
  <br>
  <div id="add_response"></div>
  <?php include('../footer.html') ?>
  <?php $db->close();?>

