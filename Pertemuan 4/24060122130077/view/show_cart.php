<!-- 
Nama          : Fendi Ardianto
NIM           : 24060122130077
Tgl Pembuatan : 24 September 2024
-->

<?php
// file     : show_cart.php
// deskripsi: untuk menambahkan inte ke shopping cart dan menampilkan isi shopping cart

session_start();

$id = isset($_GET['id']) ? $_GET['id'] : '';

if($id != ''){
  // jika $_SESSION['cart'] belum ada, maka inisialisasi dengan array kosong
  // indeks: isbn, value: jml buku tsb
  if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
  }
  // jika $_SESSION['cart'] dgn isbn yg dipilih sudah ada maka tambah valuenya dgn 1
  // jika belum ada maka buat elm baru lalu isinya di set 1
  if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id] += 1;
  }else{
    $_SESSION['cart'][$id] = 1;
  }
}
?>

<!-- Menampilkan isi shopping cart -->
<?php include('../header.html') ?>

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
      // include our login information
      require_once('../lib/db_login.php');
      $sum_qty = 0;
      $sum_price = 0;
      if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $id => $qty){
          $query = "SELECT * FROM books WHERE isbn='".$id."'";
          $result = $db->query($query);
          if(!$result){
            die("Could not query the database: <br>" . $db->error.
                "<br>Query: " . $query);
          }
          while($row = $result->fetch_object()){
            echo '<tr>';
            echo '<td>' . $row->isbn . '</td>';
            echo '<td>' . $row->author . '</td>';
            echo '<td>' . $row->title . '</td>';
            echo '<td>' . $row->price . '</td>';
            echo '<td>' . $qty . '</td>';
            echo '<td>' . ($row->price * $qty) . '</td>';
            $sum_price += ($row->price * $qty);
            $sum_qty += $qty;
          }
        }
        echo '<tr><td></td><td></td><td></td><td></td><td>' . $sum_qty . '</td><td>' . $sum_price . '</td></tr>';
        $result->free();
        $db->close();
      }else{
        echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>';
      }
      ?>
    </table>
    Total items = <?= $sum_qty;?><br><br>
    <a href="view_books.php" class="btn btn-primary">Continue Shopping</a>
    <a href="delete_cart.php" class="btn btn-danger" onclick="return confirm('Do you want to clear your cart?')" >Empty Cart</a>
  </div>
</div>
<?php include('../footer.html') ?>