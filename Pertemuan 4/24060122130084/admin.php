<?php 
// Nama/NIM Pembuat  : Nashwan Adenaya / 24060122130084
// Tanggal Pembuatan : 20 September 2024
// File              : admin.php
// Deskripsi         : tampilan khusus admin



session_start();

if(!isset($_SESSION['username'])){
    header('Location: index.php');
}

include('./header.html');
?>
<br>
<div class="card">
    <div class="card-header">Admin Page</div>
    <div class="card-body">
        <p>Welcome...</p>
        <p>You are logged in as <b><?= $_SESSION['username']; ?></b></p>
        <br>
        <a class="btn btn-primary" href="view_customer.php">View Customer</a>
        <a class="btn btn-primary" href="view_books.php">View Book</a>
        <a class="btn btn-danger" href="logout.php">Logout</a>
    </div>
</div>
<?php include('./footer.html') ?>