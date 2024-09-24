<?php
// Nama/NIM Pembuat  : Nashwan Adenaya / 24060122130084
// Tanggal Pembuatan : 20 September 2024
// File              : edit_customer.php
// Deskripsi         : untuk mengedit/mengubah info customer

require_once('lib/db_login.php');
$id = $_GET['id'];

// Mengecek apakah user belum menekan tombol submit
if (!isset($_POST['submit'])){
  $query = "SELECT * FROM customers WHERE customerid=".$id." ";
  $result = $db->query($query);
  if(!$result){
    die("Could not query the database: <br/>". $db->error);
  }else{ 
    while ($row = $result->fetch_object()) {
      $name = $row->name;
      $address = $row->address;
      $city = $row->city;
    }
  }
}else{
  $valid = TRUE;

  // name valid
  $name = test_input($_POST['name']);
  if ($name == ''){
    $error_name = "Name is required!";
    $valid = FALSE;
  }elseif(!preg_match("/^[a-zA-Z ]*$/",$name)){
    $error_name = "Only letters and white space allowed";
    $valid = FALSE;
  }

  // address valid
  $address = test_input($_POST['address']);
  if ($address == ''){
    $error_address = "Address is required!";
    $valid = FALSE;
  }

  // city valid
  $city = $_POST['city'];
  if ($city == ''){
    $error_city = "City is required!";
    $valid = FALSE;
  }

  if ($valid){
    $address = $db->real_escape_string($address);
    $query = "UPDATE customers SET name='".$name."',address='".$address."',city='".$city."' WHERE customerid=".$id." ";
    $result = $db->query($query);
    if (!$result){
      die ("Could not query the database: <br/>".$db->error. '<br>Query:'.$query);
    } else{
      $db->close();
      header('Location: view_customer.php');
    }
  }
}

?>
<?php include('header.html');?>
<br>
<div class="card">
  <div class="card-header">Edit Customers Data</div>
  <div class="card-body">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>" method="POST">
      <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>">
        <div class="error"><?php if (isset($error_name)){echo $error_name;}?></div>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <textarea class="form-control" id="address" name="address" rows="5"><?php echo $address;?></textarea>
        <div class="error"><?php if (isset($error_address)){echo $error_address;}?></div>
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <select type="text" class="form-control" id="city" name="city" value="<?php echo $city;?>">
          <option value="" disabled selected value>-- Select a city --</option>
          <option value="Airport West" <?php if(isset($city) && $city=="Airport West"){echo'selected';}?>>Airport West</option>
          <option value="Box Hill" <?php if(isset($city) && $city=="Box Hill"){echo'selected';}?>>Box Hill</option>
          <option value="Yarraville" <?php if(isset($city) && $city=="Yarraville"){echo'selected';}?>>Yarraville</option>
        </select>
        <div class="error"><?php if (isset($error_city)){echo $error_city;}?></div>
      </div>
      <br>
      <input type="submit" class="btn btn-primary" name="submit" value="Submit"></input>
      <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</div>
<?php include('footer.html')?>
<?php
  $db->close();
?>