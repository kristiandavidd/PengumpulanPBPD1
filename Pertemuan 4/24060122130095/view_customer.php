<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <title>Document</title>
</head>
<body>
    
    <div class="card">
        <div class="card-header">Customers Data</div>
        <div class="card-body">
            <br>
            <a class="btn btn-primary" href="add_customer.php">+ Add Customer Data</a><br /><br />
            <table id = "customer" class="table table-striped">
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
                require_once('db_login.php');


                if (!isset($_SESSION['username'])) {
                    header('Location: login.php');

                }
    
                $query = "SELECT * FROM customers ORDER BY customerid";
                $result = $db->query($query);
                if (!$result) {
                    die("Could not query the database: <br />". $db->error . "<br>Query: " . $query);
                }
    
                $i = 1;
                while ($row = $result->fetch_object()) {
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$row->name.'</td>';
                    echo '<td>'.$row->address.'</td>';
                    echo '<td>'.$row->city.'</td>';
                    echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id='.$row->customerid.'">Edit</a>&nbsp;&nbsp;
                          <a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id='.$row->customerid.'">Delete</a></td>';
                    echo '</tr>';
                    $i++;
                }
                echo '</table>';
                echo '<br />';
                echo 'Total Rows = '.$result->num_rows;
                $result->free();
                $db->close();
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#customer').DataTable();
        });
    </script>
</body>
</html>