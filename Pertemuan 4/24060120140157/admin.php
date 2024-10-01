<!--Nama : Muhammad Naufal -->
<!--NIM : 24060120140157 -->
<!--Tanggal Pengerjaan : 24-09-2024 -->
<!DOCTYPE html>
<html>
    <head>
        <title>
            Admin Page
        </title>
    </head>
    <body>
        <?php
            session_start();
            if(!isset($_SESSION['username'])){
                header('Location: login.php');
            }
        ?>
        <br>
        <div class="card">
            <div class="card-header">Admin Page</div>
            <div class="card-body">
                <p>Welcome...</p>
                <p>You are logged in as</p><?php echo $_SESSION['username']; ?>
                <br> <br>
                <a class="btn btn-primary" href="view_customer.php">Manage Customer</a>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </body>
</html>