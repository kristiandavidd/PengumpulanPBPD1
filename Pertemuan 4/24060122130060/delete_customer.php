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
            $address = $row->address;
            $city = $row-> city;
        }
    }
} else {
    $valid = TRUE;

    //update data into database
    if($valid){
        //assign query
        $query = "  DELETE FROM customers WHERE customerid='".$id."' ";
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
    <div class="card-header">Delete Customers Data</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>">
            <div class="form-group">
                <h2>Yakin ingin menghapus data?:</h2>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value ="submit">Delete</button>
            <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php include('footer.php') ?>
<?php
$db->close();
?>