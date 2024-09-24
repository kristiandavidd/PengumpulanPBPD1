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
        require_once('../lib/db_login.php');
        $id = $_GET['id'];

        if (isset($_POST['delete'])) {
            $query = "DELETE FROM customers WHERE customerid = $id";
            $result = $db->query($query);

            if (!$result) {
                die("Could not query the database: <br />" . $db->error);
            } else {
                $db->close();
                header('Location: view_customer.php');
                exit();
            }
        }
    ?>

    <?php 
        // include('../header.html'); 
    ?>
    <br>
    <div class="card">
        <div class="card-header">Delete Customer</div>
        <div class="card-body">
            <p>Are you sure you want to delete this customer?</p>
            <form method="POST">
                <button type="submit" class="btn btn-danger" name="delete" value="delete">Delete</button>
                <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
    <?php 
        // include('../footer.html'); 
    ?>
    <?php $db->close(); ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>