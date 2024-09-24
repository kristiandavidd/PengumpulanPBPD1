<!-- Nama : Muhammad Naufal Izzudin -->
<!-- Nim : 24060122120018 -->
<!-- Tanggal Pengerjaan : 20 September 2024 -->

<?php
session_start();
require_once('../lib/db_login.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['email'];
$query = "SELECT * FROM admin WHERE email = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-black">Customers Data</div>
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
                    $query = "SELECT * FROM customers ORDER BY customerid";
                    $result = $db->query($query);
                    if (!$result) {
                        die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
                    }
                    $total_rows = $result->num_rows;
                    $i = 1;
                    while ($row = $result->fetch_object()) {
                        echo '<tr>';
                        echo '<td>' . $i . '</td>';
                        echo '<td>' . htmlspecialchars($row->name) . '</td>';
                        echo '<td>' . htmlspecialchars($row->address) . '</td>';
                        echo '<td>' . htmlspecialchars($row->city) . '</td>';
                        echo '<td>
                                <a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . htmlspecialchars($row->customerid) . '">Edit</a>&nbsp;&nbsp;
                                <a class="btn btn-danger btn-sm" href="delete_customer.php?id=' . htmlspecialchars($row->customerid) . '" onclick="return confirm(\'Are you sure you want to delete this customer?\');">Delete</a>
                              </td>';
                        echo '</tr>';
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
                <div class="footer">
                    <div>Total Rows = <?php echo $total_rows; ?></div>
                    <a class="btn btn-danger" href="logout.php">Logout</a>
                </div>
            </div> 
        </div> 
    </div> 
    <?php $db->close(); ?>
</body>
</html>
