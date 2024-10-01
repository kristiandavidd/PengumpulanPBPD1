<!-- 
 Nama: Tirza Aurellia Wijaya
 NIM: 24060122130047
 Tanggal Pengerjaan: 24 Sept 2024 -->
<?php
session_start();
$id = $_GET['id'];

if ($id != "") {
    // Initialize the cart if not already set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add or update the quantity of the item in the cart
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}
?>

<!-- Menampilkan isi shopping cart -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <?php include('../header.php'); ?>
    <br>
    <div class="card">
        <div class="card-header">Shopping Cart</div>
        <div class="card-body">
        <br>
            <table class="table table-striped">
                <tr>
                    <th>ISBN</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Price * Qty</th>
                </tr>
                <?php
                    // Include login information
                    require_once('../lib/db_login.php');
                    $sum_qty = 0;   // Initialize total items in shopping cart
                    $sum_price = 0; // Initialize total price in shopping cart

                    if (is_array($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $id => $qty) {
                            $query = "SELECT * FROM books WHERE isbn = '".$id."'";
                            $result = $db->query($query);
                            if (!$result) {
                                die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
                            }

                            while ($row = $result->fetch_object()) {
                                $price_qty = $row->price * $qty; // Calculate price times quantity
                                echo '<tr>';
                                echo '<td>'.$row->isbn.'</td>';  // Corrected concatenation
                                echo '<td>'.$row->author.'</td>'; // Corrected concatenation
                                echo '<td>'.$row->title.'</td>';  // Corrected concatenation
                                echo '<td>$'.$row->price.'</td>'; // Corrected concatenation
                                echo '<td>'.$qty.'</td>';         // Show quantity
                                echo '<td>$'.$price_qty.'</td>';  // Price * Qty
                                echo '</tr>';

                                $sum_qty += $qty;            // Update total quantity
                                $sum_price += $price_qty;    // Update total price
                            }
                        }
                        echo '<tr><td></td><td></td><td></td><td></td><td>'.$sum_qty.'</td><td>$'.$sum_price.'</td></tr>';
                        $result->free();
                        $db->close();
                    } else {
                        echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>'; // Fixed align typo
                    }
                ?>
                </table>
                Total items = <?php echo $sum_qty; ?> <br><br>
                <a class="btn btn-primary" href="view_books.php">Continue Shopping</a>
                <a class="btn btn-danger" href="delete_cart.php">Empty Cart</a><br><br />
        </div>
    </div>
    <?php include('../footer.php'); ?>
</body>
</html>
