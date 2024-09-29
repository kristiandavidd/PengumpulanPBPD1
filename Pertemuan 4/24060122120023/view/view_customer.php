<!-- Nama: Happy Desita W. -->
<!-- NIM: 24060122120023 -->
<!-- Tanggal Pengerjaan: 18 September 2024 -->
<!-- Nama File: view_customer.php -->

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bookorama</title>
</head>
<body>
    <div  class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Customer Data</span>
            <a class="btn btn-danger btn-sm" href="logout.php">Logout</a>
        </div>
        <div class="card-body">
            <br>
            <a class="btn btn-primary" href="add_customer.php">+ Add Customer Data</a>

            <br />
            <br />

            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>

                <?php
                    // Inisialisasi session
                    session_start();

                    // Memeriksa apakah user sudah login sebagai admin
                    if (!isset($_SESSION['username'])) {
                        header('Location: login.php');
                        exit;
                    }

                    // Include our login information
                    require_once('../lib/db_login.php');

                    // Execute the query
                    $query = " SELECT * FROM customers ORDER BY customerid ";
                    $result = $db->query($query);
                    if (!$result){
                        die("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
                    }

                    // Fetch and display the results
                    $i = 1;
                    while ($row = $result->fetch_object()){
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$row->name.'</td>';
                        echo '<td>'.$row->address.'</td>';
                        echo '<td>'.$row->city.'</td>';
                        echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . $row->customerid . '">Edit</a>&nbsp;&nbsp;';
                        echo '<a class="btn btn-danger btn-sm" href="delete_customer.php?id=' . $row->customerid . '">Delete</a>';
                        echo '</tr>';
                        $i++;
                    }
                    echo '</table>';
                    echo '<br />';
                    echo 'Total Rows = '.$result->num_rows;
                    $result->free();
                    $db->close();
                ?>
            </table>
        </div>
    </div>
</body>
</html>