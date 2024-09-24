<!-- 
Nama : Tara Tirzandina
NIM : 24060122130060
Tanggal : 24 September 2024
-->

<?php
session_start();
if (isset($_POST["submit"])){
    $valid = TRUE;

    
}
?>

<?php include('header.php')?>
<div class="card">
    <div class="card-header">Empty Cart</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>">
            <div class="form-group">
                <h2>Yakin ingin mengosongkan keranjang?</h2>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value ="submit">Delete</button>
            <a href="show_cart.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<?php include('footer.php')?>