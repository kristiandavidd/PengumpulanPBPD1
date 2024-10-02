<?php
session_start(); 
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
// include('../header.html');
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<br>
<div class="card">
    <div class="card-header">Admin Page</div>
    <div class="card-body">
        <p>Welcome ... </p>
        <p>You are logged in as <b><?php echo $_SESSION['username']; ?></b></p>
        <br>
        <a class="btn btn-primary" href="logout.php">Logout</a>
    </div>
</div>
<!-- <?php include('../footer.html'); ?> -->
