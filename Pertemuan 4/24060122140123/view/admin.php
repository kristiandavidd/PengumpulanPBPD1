<!-- 
Nama                   : Alya Safina
NIM                    : 24060122140123
Tanggal pengerjaan     : 25 September 2024 
-->

<?php
    // Memulai sesi
    session_start();    
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
    }

    include('./header.php') ?>
<br>
<!-- Tampilan admin -->
<div class = "card">
    <div class = "card-header text-center">Admin</div>
    <div class = "card-body text-center">
        <p>Welcome...</p>
        <p>You are logged in as <b><?php echo $_SESSION['username']; ?></p>
        <br><br>
        <a class = "btn btn-primary" href="view_customer.php">Lihat Customer</a>&nbsp;&nbsp;
        <a class = "btn btn-danger" href="logout.php">Logout</a>
    </div>
</div>
<?php include('./footer.php') ?>
