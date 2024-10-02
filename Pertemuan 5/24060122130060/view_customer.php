<!-- 
Nama : Tara Tirzandina
NIM : 24060122130060
Tanggal : 24 September 2024
-->

<html>
    <head>
        <title>View Customer</title>
    </head>
    <body>
        <?php include('header.php')?>
        <div class="card">
            <div class="card-header">Customers Data</div>
            <a class="btn btn-primary" href="add_customer.php">Add Customers</a>
            <div class="card-body">
            <br>
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            
            <?php
            //include login information
            require_once('db_login.php');

            if(isset($_POST["logout"])){
                header('logout.php');
                exit;
            }

            //execute the query
            $query = " SELECT * FROM customers ORDER BY customerid ";
            $result = $db->query($query);
            if(!$result){
                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
            }
            //fetch and display the result
            $i = 1;
            while($row = $result->fetch_object()){
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row->name.'</td>';
                echo '<td>'.$row->address.'</td>';
                echo '<td>'.$row->city.'</td>';
                echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id='.$row->customerid.'">Edit</a>&nbsp;&nbsp;
                <a class="btn btn-danger btn-sm" href="delete_customer.php?id='.$row->customerid.'">Delete</a>
                </td>';
                echo '</tr>';
                $i++;
            }

            echo '</table>';
            echo '<br>';
            echo 'Total Rows = '.$result->num_rows;
            echo '<br>';
            echo '<a href="logout.php" class="btn btn-danger">Logout</a>';
            $result->free();
            $db->close();

            ?>
            </table>
        </div>
        </div>
        <?php include('footer.php')?>
    </body>
</html>