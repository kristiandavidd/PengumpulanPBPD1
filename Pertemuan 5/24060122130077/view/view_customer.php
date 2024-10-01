<!-- 
Nama          : Fendi Ardianto
NIM           : 24060122130077
Tgl Pembuatan : 24 September 2024
-->

<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">

    <div class="card">
        <div class="card-body">
            <h1>Welcome ... </h1>
            <p>You are logged in as <b><?php echo $_SESSION['username'];?></b></p>
            <br><br>
            <a class="btn btn-danger" href="logout.php">Logout</a>
        </div>
    </div>

        <div class="card mt-5">
            <div class="card-header">Customer Data</div>
        <div class="card-body">
            <br>
            <a href="add_customer.php" class="btn btn-primary">+ Add Customer Data</a>
            <br><br>
            <table class="table table-stripped">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
                <?php
                    //include our login information
                    require_once('../lib/db_login.php');
                    //execute the query
                    $query = "SELECT * FROM customers ORDER BY customerid";
                    $result = $db->query($query);
                    if(!$result){
                        die("Could not query the database: <br>". $db->error."<br>Query: ".$query);
                    }
                    //fetch and display the results
                    $i = 1;
                    while($row = $result->fetch_object()){
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$row->name.'</td>';
                        echo '<td>'.$row->address.'</td>';
                        echo '<td>'.$row->city.'</td>';
                        echo '<td>
                                <a class="btn btn-warning btn-sm" href="edit_customer.php?id='.$row->customerid.'">Edit</a>&nbsp;&nbsp;
                                <a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id='.$row->customerid.'" onclick="return confirm(\'Are you sure want to delete this data?\');">Delete</a>
                            </td>';
                
                        echo '<tr>';
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
</div>
</body>
</html>