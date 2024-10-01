<?php 
  // File       : admin.php
  // Deskripsi  : halaman hanya ditampilkan jika user telah login, jika belum akan diarahkan ke halaman login

session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}
?>


<?php include('../header.html'); ?>
<br>
<div class="card">
  <div class="card-header">Admin Page</div>
  <div class="card-body">
    <p>Welcome... </p>
    <p>You are logged in as <b><?php echo $_SESSION['username']; ?></b></p>
    <br><br>
    <a href="logout.php" class="btn btn-primary">Logout</a>
  </div>
</div>
<?php include('../footer.html') ?>