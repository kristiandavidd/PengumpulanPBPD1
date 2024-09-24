<!-- Nama : Muhammad Naufal Izzudin -->
<!-- Nim : 24060122120018 -->
<!-- Tanggal Pengerjaan : 20 September 2024 -->

<?php 
session_start();
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">Shopping Cart</div>
        <div class="card-body">
            <table class="table table-striped">
				<thead>
					<tr>
						<th colspan="6" style="height: 10px; background-color: white; border: none;"></th>
					</tr>
				</thead>
                <tbody>
				    <tr>
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Price * Qty</th>
                    </tr>
                    <?php
                    require_once('../lib/db_login.php');

                    $sum_qty = 0;
                    $sum_price = 0;

                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = array();
                    }

                    if (is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $id => $qty) {
                            $query = "SELECT * FROM books WHERE isbn='".$id."'";
                            $result = $db->query($query);
                            if (!$result) {
                                die ("Could not query the database: <br>". $db->error ."<br>Query: ".$query);
                            }
                            while ($row = $result->fetch_object()) {
                                $total_price = $row->price * $qty;
                                $sum_qty += $qty;
                                $sum_price += $total_price;
                                echo '<tr>';
                                echo '<td>'.$row->isbn.'</td>';
                                echo '<td>'.$row->author.'</td>';
                                echo '<td>'.$row->title.'</td>';
                                echo '<td>$'.number_format($row->price, 2).'</td>';
                                echo '<td>'.$qty.'</td>';
                                echo '<td>$'.number_format($total_price, 2).'</td>';
                                echo '</tr>';
                            }
                        }
                        echo '<tr>';
                        echo '<td colspan="4"></td>';
                        echo '<td><strong>'.$sum_qty.'</strong></td>';
                        echo '<td><strong>$'.number_format($sum_price, 2).'</strong></td>';
                        echo '</tr>';
                        $result->free();
                        $db->close();
                    } else {
                        echo '<tr><td colspan="6" class="text-center">There is no item in the shopping cart</td></tr>';
                    }
                    ?>
                </tbody>
            </table>

            <p>Total items = <?php echo $sum_qty; ?></p>
			<div class="d-flex">
				<a class="btn btn-primary mr-2" href="view_books.php">Continue Shopping</a>
				<a class="btn btn-danger" href="delete_cart.php" onclick="return confirm('Are you sure you want to empty the cart?');">Empty Cart</a> 	
			</div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
