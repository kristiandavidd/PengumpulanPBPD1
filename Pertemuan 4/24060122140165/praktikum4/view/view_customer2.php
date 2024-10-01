<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="card mt-4">
        <div class="card-body">
            <a class="btn btn-primary mb-3" href="add_customer.php">+ Add Customer Data</a>
            
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
                // Include our login information 
                require_once('../lib/db_login.php');
                // Execute the query 
                $query = "SELECT customerid AS ID, name AS Nama, address AS Alamat, city AS Kota FROM customers ORDER BY customerid";
                $result = $db->query($query);
                if (!$result){
                    die("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
                }

                // Fetch and display the results 
                $i = 1;
                while ($row = $result->fetch_object()){
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$row->Nama.'</td>';
                    echo '<td>'.$row->Alamat.'</td>';
                    echo '<td>'.$row->Kota.'</td>';
                    echo '<td>
                            <a class="btn btn-warning btn-sm" href="edit_customer.php?id='.$row->ID.'">Edit</a>&nbsp;&nbsp;
                            <a class="btn btn-danger btn-sm" href="delete_customer.php?customerid='.$row->ID.'">Delete</a>
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