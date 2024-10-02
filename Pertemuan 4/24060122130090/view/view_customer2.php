<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-header">Customers Data</div>
        <div class="card-body">
            <br>
            <a class="btn btn-primary" href="add_customer.php">+Add Customer Data</a><br><br>
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>

                <?php
                    require_once('../lib/db_login.php');
                    $query = "SELECT customerid AS ID, name AS Nama, address AS Alamat, city AS Kota FROM customers ORDER BY customerid";
                    $result = $db->query($query);
                    if (!$result){
                        echo $result;
                        die("Could not query the database: <br>". $db->error. "<br> Query: ".$query);
                    }

                    $i = 1;
                    while ($row = $result->fetch_object()) {
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$row->Nama.'</td>';
                        echo '<td>'.$row->Alamat.'</td>';
                        echo '<td>'.$row->Kota.'</td>';
                        echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . $row->ID . '">Edit</a>&nbsp;&nbsp;
                            <a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id=' . $row->ID . '">Delete</a>
                            </td>';
                        echo '</tr>';
                        $i++;
                    }
                    echo '</table>';
                    echo '<br>';
                    echo 'Total Rows = '.$result->num_rows;
                    $result->free();
                    $db->close();
                ?>
            </table>
        </div>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
</body>
</html>