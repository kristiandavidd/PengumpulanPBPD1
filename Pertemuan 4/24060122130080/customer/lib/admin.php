<!-- 
    Nama : Alfonso Clement Sutantio
    NIM : 24060122130080
    Tanggal : 21/09/2024
    File : admin.php
 -->
<?php
session_start();


if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

include('../../header.php');
echo '<script>
    setTimeout(function() {
        window.location.href = "../view/view_customer.php";
    }, 3000);
</script>';

?>
<br>
<div class="card">
    <div class="card-header">Admin Page</div>
    <div class="card-body">
        <p>Welcome...</p>
        <p>You are logged in as <b><?= $_SESSION['username']; ?></b></p>
        <br><br>
    </div>
</div>
<?php include('../../footer.php') ?>