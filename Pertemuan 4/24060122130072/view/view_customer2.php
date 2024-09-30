<?php require '../header.html'; ?>

<div class="card">
    <div class="card-header">Customer Data</div>
    <div class="card-body">
        <a href="add_customer.php" class="btn btn-primary">Add Customer Data</a><br><br>
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Action</th>
            </tr>
            <?php 
            // include our login information
            require_once('../lib/db_login.php');

            // execute query
            $query = " SELECT customerid as ID, name as Nama, address as Alamat, city as Kota FROM customers order by customerid ";
            $result = $db->query($query);
            if (!$result) {
                die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
            }

            // fetch and display the result
            $i = 1;
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row->Nama.'</td>';
                echo '<td>'.$row->Alamat.'</td>';
                echo '<td>'.$row->Kota.'</td>';
                echo '<td><a href="edit_customer.php" class="btn btn-warning btn-sm" id='.$row->ID.'>Delete</a></td>';
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
</div>

<?php require '../footer.html'; ?>