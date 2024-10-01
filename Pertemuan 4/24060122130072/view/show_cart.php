<?php 
// File       : show_cart.php
// Deskripsi  : untuk menambahkan item ke shopping cart dan menampilkan isi shopping cart

session_start();
$id = $_GET['id'];
// $id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
if ($id != "") {
  // if $_SESSION['cart'] not defined, then initialize with empty associative array
  // index : value -> isbn : book quantity
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

<!-- Show Shopping Cart Element -->
<?php include('../header.html'); ?>
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
        <Th>Price</Th>
        <Th>Qty</Th>
        <th>Price * Qty</th>
      </tr>
      <?php 
      // include login information
      require_once('../lib/db_login.php');
      $sum_qty = 0; // initialize total item in shopping cart
      $sum_price = 0; // initialize total price
      
      if (is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $qty) {
          $query = "SELECT * FROM books WHERE isbn='".$id."'";
          $result = $db->query($query);
          if (!$result) {
            die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
          }
          while ($row = $result->fetch_object()) {
            echo '<tr>';
            echo '<td>'.$row->isbn.'</td>';
            echo '<td>'.$row->author.'</td>';
            echo '<td>'.$row->title.'</td>';
            echo '<td>'.$row->price.'</td>';
            echo '<td>'.$_SESSION['cart'][$row->isbn].'</td>';
            echo '<td>'.$row->price*$qty.'</td>';
            $sum_price = $sum_price + ($row->price * $qty);
          }
          $sum_qty += $qty;
        }
        echo '<tr><td></td><td></td><td></td><td></td><td>'.$sum_qty.'</td><td>'.$sum_price.'</td></tr>';
        $result->free();
        $db->close();
      } else {
        echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>';
      }
       ?>
    </table>
    Total items = <?php echo $sum_qty; ?><br><br>
    <a href="view_books.php" class="btn btn-primary">Continue Shopping</a>
    <a href="delete_cart.php" class="btn btn-danger">Empty Cart</a>
  </div>
</div>

<?php include('../footer.html'); ?>