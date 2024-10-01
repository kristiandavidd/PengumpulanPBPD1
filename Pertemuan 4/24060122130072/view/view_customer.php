<?php  
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>

<?php require '../header.html'; ?>

<div class="card col-11 mx-auto">
    <div class="card-header">Customer Data</div>
    <div class="card-body">
        <a href="add_customer.php" class="btn btn-primary">Add Customer Data</a><br><br>
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Action</th>
            </tr>
            <?php 
            // include our login information
            require_once('../lib/db_login.php');

            // execute query
            $query = " SELECT * FROM customers ORDER BY customerid ";
            $result = $db->query($query);
            if (!$result) {
                die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
            }

            // fetch and display the result
            $i = 1;
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row->name.'</td>';
                echo '<td>'.$row->address.'</td>';
                echo '<td>'.$row->city.'</td>';
                echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id='.
                $row->customerid.'">Edit</a>&nbsp;&nbsp;
                <a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id='.
                $row->customerid.'">Delete</a></td>';
                echo '</tr>';
                $i++;
            }
            echo '</table>';
            echo '<br>';
            echo 'Total Rows = '.$result->num_rows;
            $result->free();
            $db->close();
             ?>
        <!-- </table> -->
        <br><br>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>

<?php require '../footer.html'; ?>