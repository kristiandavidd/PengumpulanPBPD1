<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 25 September 2024
Lab : PBP D1
Tugas Pertemuan 4
-->

<?php 
session_start();
// Cek apakah user sudah login sebagai admin
if (!isset($_SESSION['username'])) {
    // Jika user belum login, arahkan ke halaman login
    header('Location: login.php');
    exit;
}
include('../header.html'); 
?>
<div class="card">
    <div class="card-header">Customers Data</div>
    <div class="card-body">
        <br>
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
            // Include our login information
            require_once('../lib/db_login.php');
            // Execute the query
            $query = "SELECT * FROM customers ORDER BY customerid ";
            $result = $db->query($query);
            if (!$result) {
                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
            }
            // Fetch and display the results
            $i = 1;
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row->name.'</td>';
                echo '<td>'.$row->address. '</td>';
                echo '<td>'.$row->city.'</td>';
                echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id='.$row->customerid. '">Edit</a>&nbsp; &nbsp;
                <a class="btn btn-danger btn-sm" href="delete_customer.php?id='.$row->customerid. '">Delete</a>
                </td>';
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
        <br><br><a class="btn btn-danger" href="logout.php">Logout</a><br /><br />
    </div>
</div>
<?php include('../footer.html'); ?>
