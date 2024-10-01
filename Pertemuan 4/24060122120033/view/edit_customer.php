<!-- 
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pembuatan   : Minggu, 22 September 2024
    Nama File           : edit_customer.php
-->

<?php
    session_start();
    
    if (!isset($_SESSION['username'])){
        header('Location: ../lib/login.php');
    }
    
    require_once('../lib/db_login.php');
    $id = $_GET['id']; // Mendapatkan customerid yang dilewatkan ke URL

    // Mengecek apakah user belum menekan tombol submit
    if (!isset($_POST["submit"])){
        $query = " SELECT * FROM customers WHERE customerid=".$id." ";

        // Execute the query
        $result = $db->query( $query );
        if(!$result){
            die ("Could not query the database: <br />".$db->error);
        } else {
            while ($row = $result->fetch_object()){
                $name = $row->name;
                $address = $row->address;
                $city = $row->city;
            }
        }
    } else {
        $valid = TRUE; // Flag validasi
        $name = test_input($_POST['name']);
        if ($name == ''){
            $error_name = "Name is required";
            $valid = FALSE;
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)){
            $error_name = "Only letters and white space allowed";
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

        // Update data info database
        if ($valid){
            // Escape inputs data
            $address = $db->real_escape_string($address);
            
            // Assign a query
            $query = " UPDATE customers SET name='".$name."', address='".$address."', city='".$city."' WHERE customerid=".$id." ";
            
            // Execute the query
            $result = $db->query( $query );
            if (!$result){
                die ("Could not query the database: <br />".$db->error. '<br>Query:' .$query);
            } else {
                $db->close();
                header('Location: view_customer.php');
            }
        }
    }
?>
<?php include('../header.html') ?>
<br>
<div class="card mt-4">
    <div class="card-header">Edit Customers Data</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id; ?>">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                <div class="error" style="color: red; font-size: 12px;"><?php if(isset($error_name)) echo $error_name; ?></div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address" id="address" rows="5"><?php echo $address; ?></textarea>
                <div class="error" style="color: red; font-size: 12px;"><?php if(isset($error_address)) echo $error_address; ?></div>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select name="city" id="city" class="form-control" required>
                    <option value="none" <?php if(!isset($city)) echo 'selected="true"' ?>>--Select a city--</option>
                    <option value="Airport West" <?php if(isset($city) && $city=="Airport West") echo 'selected="true"'; ?>>Airport West</option>
                    <option value="Box Hill" <?php if(isset($city) && $city=="Box Hill" ) echo 'selected="true"'; ?>>Box Hill</option>
                    <option value="Yarraville" <?php if(isset($city) && $city=="Yarraville" ) echo 'selected="true"'; ?>>Yarraville</option>
                </select>
                <div class="error" style="color: red; font-size: 12px;"><?php if(isset($error_city)) echo $error_city; ?></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
            </table>
        </form>
    </div>
</div>
<?php include('../footer.html') ?>
<?php $db->close(); ?>