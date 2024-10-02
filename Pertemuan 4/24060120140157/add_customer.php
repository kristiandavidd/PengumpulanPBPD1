<!--Nama : Muhammad Naufal -->
<!--NIM : 24060120140157 -->
<!--Tanggal Pengerjaan : 24-09-2024 -->
<!DOCTYPE html>
<html>
    <head>
        <title>Add Customer</title>
        <style>
            .card-header{
                width: 500px;
                background-color: lightgray;
                padding-top: 5px;
                padding-left: 10px;
                padding-bottom: 5px;
                border: 1px solid black;
            }
            .card-body{
                width: 500px;
                background-color: lightgray;
                padding-top: 5px;
                padding-left: 10px;
                padding-bottom: 5px;
                border: 1px solid black;
            }
            .btn.btn-primary{
                border-color: white;
                background-color: greenyellow;
                color: white;
                padding: 5px;
                border-radius: 8px;
                margin: 20px;
            }
            .btn.btn-secondary{
                border-color: white;
                background-color: red;
                color: white;
                padding: 5px;
                border-radius: 8px;
                margin: 20px;
            }
            #nama{
                margin-left: 50px;
            }
            #address{
                margin-left: 36px;
            }
            #city{
                margin-left: 61px;
            }
        </style>
    </head>
    <body>
         <?php
            require_once('db_login.php');

            if(isset($_POST['submit'])){
                $valid = TRUE;
                $name = test_input($_POST['nama']);
                if($name == ''){
                    $error_name = "Name is required";
                    $valid = FALSE;
                } elseif (!preg_match("/^[a-zA-Z ]*$/",$name)){
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
                    $address = $db->real_escape_string($address);
                    $id_query = " SELECT customerid FROM customers ORDER BY customerid DESC LIMIT 1 ";
                    $id_result = $db->query($id_query);
                    if(!$id_result){
                        die("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
                    }
                    while($row = $id_result->fetch_object()){
                        $id = $row->customerid;
                    }
                    $id = $id + 1;
                    $query = " INSERT INTO customers
                    VALUES ('".$id."','".$name."', '".$address."', '".$city."') ";
                    $result = $db->query($query);
                    if(!$result){
                        die("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
                    } else {
                        $db->close();
                        header('Location: view_customer.php');
                    }
                }        
            }
        ?>

        <br>
        <div class="card">
            <div class="card-header">Add Customer</div>
            <div class="card-body">
                <form method="POST" autocomplete="on" action="">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="">
                    <div class="error"><?php if(isset($error_name)) echo $error_name;?></div>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                    <div class="error"><?php if(isset($error_address)) echo $error_address;?></div>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <select name="city" id="city" class="form-control" required>
                        <option value="none" <?php if (!isset($city)) echo 'selected="true"';?>>--Select a city--</option>
                        <option value="Airpost West" <?php if (isset($city) && $city == 'Airport West') echo 'selected="true"';?>>Airport West</option>
                        <option value="Box Hill" <?php if (isset($city) && $city == 'Box Hill') echo 'selected="true"';?>>Box Hill</option>
                        <option value="Yarraville" <?php if (isset($city) && $city == 'Yarraville') echo 'selected="true"';?>>Yarraville</option>
                    </select>
                    <div class="error"><?php if(isset($error_city)) echo $error_city;?></div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>

        <?php
        $db->close();
        ?>
    </body>
</html>