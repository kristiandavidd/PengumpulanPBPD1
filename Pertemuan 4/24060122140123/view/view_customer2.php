<!-- 
Nama                   : Alya Safina
NIM                    : 24060122140123
Tanggal pengerjaan     : 25 September 2024 
-->

<div  class="card">
    <div class="card-header">View Customer</div>
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
                // Menghubungkan ke database
                require_once('../lib/db_login.php');
                $query = "SELECT customerid AS ID, name AS Nama, address AS Alamat, city AS Kota FROM customers ORDER BY customerid";
                $result = $db->query($query);
                if (!$result) {
                    die("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
                }

                $i = 1;
                while ($row = $result->fetch_object()) {
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    echo '<td>'.$row->Nama.'</td>'; 
                    echo '<td>'.$row->Alamat.'</td>'; 
                    echo '<td>'.$row->Kota.'</td>'; 
                    echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . $row->ID . '">Edit</a>&nbsp;&nbsp;';
                    echo '<a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id=' . $row->ID . '">Delete</a>';
                    echo '</tr>';
                    $i++;
                }
                echo '</table>';
                echo '<br />';
                echo 'Total Rows = '.$result->num_rows;
                $result->free();
                $db->close();
            ?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Customer Data</title>
</head>
<body>
    <div  class="card">
        <div class="card-header">Customer Data</div>
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
                        echo '<td>'.$row->Nama.'</td>'; // Ubah ke Nama
                        echo '<td>'.$row->Alamat.'</td>'; // Ubah ke Alamat
                        echo '<td>'.$row->Kota.'</td>'; // Ubah ke Kota
                        echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . $row->ID . '">Edit</a>&nbsp;&nbsp;';
                        echo '<a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id=' . $row->ID . '">Delete</a>';
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
