<?php
session_start();

// Cek apakah user sudah login dan adalah admin
if (!isset($_SESSION['username']) && $_SESSION['is_admin'] !== true) {
    // Redirect ke halaman login jika tidak memiliki akses
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="card">
        <div class="card-header">Customer Data</div>
        <div class="card-body">
            <br>
            <a class="btn btn-primary" href="add_customer.php">+ Add Customer</a><br /><br />
            
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
                    require_once('./lib/db_login.php');
                    $query = "SELECT * FROM customers ORDER BY customerid";
                    $result = $db->query($query);
                    if (!$result) {
                        die("Could not query the database <br />" . $db->error . "<br>Query :" . $query);
                    }    

                    $i = 1;
                    while ($row = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>";
                        echo "<td>" . htmlspecialchars($row->name) . "</td>";
                        echo "<td>" . htmlspecialchars($row->address) . "</td>";
                        echo "<td>" . htmlspecialchars($row->city) . "</td>";
                        echo '<td>
                                <a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . ($row->customerid) . '">Edit</a>
                                &nbsp;&nbsp;
                                <a class="btn btn-danger btn-sm" href="delete_customer.php?id=' . ($row->customerid) . '" 
                                onclick="return confirm(\'Are you sure you want to delete this customer?\')">Delete</a>
                              </td>';
                        echo "</tr>";
                        $i++;
                    }

                    echo "</tbody>";
                    echo "</table>";
                    echo "<br />";
                    echo "Total rows = " . $result->num_rows;
                    $result->free();
                    $db->close();
                    ?>
                </tbody>
            </table>
            <br>
            <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
    </div>
    
</body>
</html>
