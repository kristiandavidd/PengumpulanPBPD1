<!-- Nama : Aldisar Gibran -->
<!-- NIM : 24060122130081 -->
<!-- Tanggal : 25-09-2024 -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card">
        <div class="card-header">Customers Data</div>
        <div class="card-body">
            <br />
            <a class="btn btn-primary" href="add_customer.php">+ Add Customer Data</a><br /><br />
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
                
                <?php
                    session_start(); 

                    if (!isset($_SESSION['username'])) {
                        header('Location: login.php');
                        exit;
                    }

                    require_once('lib/db_login.php');

                    $query = "SELECT * FROM customers ORDER BY customerid";
                    $result = $db->query($query);
                    if (!$result) {
                        die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
                    }

                    $i = 1;
                    echo '<table class="table table-striped">';
                    echo    '<tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>';

                    while ($row = $result->fetch_object()) {
                        echo '<tr>';
                        echo '<td>' . $i . '</td>';
                        echo '<td>' . $row->name . '</td>';
                        echo '<td>' . $row->address . '</td>';
                        echo '<td>' . $row->city . '</td>';
                        echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . $row->customerid . '">Edit</a>&nbsp;&nbsp;';
                        echo '<a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id=' . $row->customerid . '">Delete</a></td>';
                        echo '</tr>';
                        $i++;
                    }

                    echo '</table>';
                    echo '<br />';
                    echo 'Total Rows = ' . $result->num_rows;
                    $result->free();
                    $db->close();
                    ?>
            </table>
            <br><br>
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>