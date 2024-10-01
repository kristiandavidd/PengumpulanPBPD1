<!-- Nama : Aldisar Gibran -->
<!-- NIM : 24060122130081 -->
<!-- Tanggal : 25-09-2024 -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    if($id != ""){

        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]++;
        } else {
            $_SESSION['cart'][$id] = 1;
        }
        header('Location: show_cart.php');  
        exit();
    }
    ?>

    <div class="card">
        <div class="card-header">Shopping Cart</div>
        <div class="card-body">
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
    require_once('lib/db_login.php');

    $sum_qty = 0;
    $sum_total_price = 0; 

    if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $qty){
            $query = "SELECT * FROM books WHERE isbn='".$id."'";
            $result = $db->query($query);
            if (!$result){
                die ("Could not query the database: <br>". $db->error ."<br>Query: ".$query);
            }

            while ($row = $result->fetch_object()){
                $total_price_per_item = $row->price * $qty; 

                echo '<tr>';
                echo '<td>'.$row->isbn.'</td>';
                echo '<td>'.$row->author.'</td>';
                echo '<td>'.$row->title.'</td>';
                echo '<td>'.$row->price.'</td>';
                echo '<td>'.$qty.'</td>';
                echo '<td>'.number_format($total_price_per_item, 2).'</td>';
                echo '</tr>';

                $sum_total_price += $total_price_per_item;
                $sum_qty += $qty;
            }
            $result->free();
        }
        $db->close();
    } else {
        echo '<tr><td colspan="6" align="center">There is no item in the shopping cart</td></tr>';
    }
    ?>
            </table>
        </div>
    </div>

    <br>
    <div class="card">
        <div class="card-body">
            Total items = <?php echo $sum_qty; ?><br>
            Total price = <?php echo number_format($sum_total_price, 2); ?><br><br>
            <a class="btn btn-primary" href="view_books.php">Continue Shopping</a>
            <a class="btn btn-danger" href="delete_cart.php">Empty Cart</a><br><br>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>