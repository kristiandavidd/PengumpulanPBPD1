<!-- Nama: Happy Desita W. -->
<!-- NIM: 24060122120023 -->
<!-- Tanggal Pengerjaan: 24 September 2024 -->
<!-- Nama File: admin.php -->

<?php 
    // Inisialisasi session
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
        exit;
    }

    include('../header.html');
    ?>
    <br>
    <div class="card">
        <div class="card-header">Admin Page</div>
        <div class="card-body">
            <p>Welcome...</p>
            <p>You are logged in as <b><?= $_SESSION['username']; ?></b></p>
            <br><br>
            <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
    </div>
<?php include('../footer.html') ?>