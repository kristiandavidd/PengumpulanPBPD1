<?php
include ('header.php');
?>

<?php
// Mulai session
session_start(); // Inisialisasi session
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<div class="card">
    <div class="card-header">Customer Data</div>
    <div id="card-body">
        <br>
        <a class="btn btn-primary" href="add_customer.php">+ Add Customer Data</a><br>
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
             require_once('db_login.php');

            //  execute the query
            $query = "SELECT customerid AS ID, name AS Nama, address AS Alamat, city AS Kota FROM customers ORDER BY ID";
            $result = $db->query($query);
            if (!$result){
                die ("could not query the database: <br>". $db->error. "<br>Query: ".$query);
            }

            $i = 1;
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<td>' . $i . '</td>'; // Menampilkan nomor urut
                echo '<td>' . $row->Nama . '</td>'; // Menampilkan kolom nama
                echo '<td>' . $row->Alamat . '</td>'; // Menampilkan kolom alamat
                echo '<td>' . $row->Kota . '</td>'; // Menampilkan kolom kota
                // Tombol untuk edit dan delete berdasarkan id customer
                echo '<td>
                        <a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . $row->ID . '">Edit</a>&nbsp;&nbsp;
                        <a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id=' . $row->ID . '">Delete</a>
                      </td>';
                echo '</tr>';
                $i++; // Increment nomor urut
            }
            echo '</table>';
            echo '</br>';
            echo 'Total Rows = '.$result->num_rows;
            echo '<br>';
            echo '<a class="btn btn-danger btn-sm" href="logout.php">Log out</a>';
            $result->free();
            $db->close();
            ?>
        </table>
    </div>
</div>

<?php
include ('footer.php');
?>