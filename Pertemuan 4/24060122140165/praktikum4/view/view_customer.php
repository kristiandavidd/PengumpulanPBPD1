<!-- Nama : Farrel Ardana Jati -->
<!-- Nim : 24060122140165 -->
<!-- Tanggal Pengerjaan : 21 September 2024 -->
<?php
session_start();

// Cek apakah admin sudah login atau belum
if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login
    header('Location: login.php');
    exit();
}
?>

<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="card mt-4">
        <div class="card-body">
            <a class="btn btn-primary mb-3" href="add_customer.php">+ Add Customer Data</a>
            <a class="btn btn-secondary mb-3" href="logout.php">Logout</a> <!-- Link Logout -->

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once('../lib/db_login.php');
                $query = "SELECT * FROM customers ORDER BY customerid";
                $result = $db->query($query);
                if (!$result){
                    die("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
                }

                $i = 1;
                while ($row = $result->fetch_object()){
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$row->name.'</td>';
                    echo '<td>'.$row->address.'</td>';
                    echo '<td>'.$row->city.'</td>';
                    echo '<td>
                            <a class="btn btn-warning btn-sm" href="edit_customer.php?id='.$row->customerid.'">Edit</a>&nbsp;&nbsp;
                            <a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id='.$row->customerid.'">Delete</a>
                          </td>';
                    echo '</tr>';
                    $i++;
                }

                echo '</tbody>';
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
