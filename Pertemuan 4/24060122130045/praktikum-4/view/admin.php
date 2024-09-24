<!-- Nama : Muhammad Naufal Rifqi Setiawan -->
<!-- NIM : 24060122130045 -->
<!-- Tanggal : 24-09-2024 -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])){
        header('Location : login.php');
    }

    // include('../header.html')
    ?>

    <br>
    <div class="card">
        <div class="card-header">Admin Page</div>
        <div class="card-body">
            <p>Welcome ...</p>
            <p>You are logged in as <b><?php echo $_SESSION['username'];?></p>
            <br><br>
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </div>

    <?php
        // include('../footer.html')
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


