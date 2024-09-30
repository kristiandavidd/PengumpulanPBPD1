<!-- Nama : Farrel Ardana Jati -->
<!-- Nim : 24060122140165 -->
<!-- Tanggal Pengerjaan : 21 September 2024 -->
<?php
// file     : show_cart.php
// deskripsi: untuk menambahkan item ke shopping cart dan menampilkan isi shopping cart

session_start();

$id = isset($_GET['id']) ? $_GET['id'] : '';



if($id != ''){
  // jika $_SESSION['cart'] belum ada, maka inisialisasi dengan array kosong
  if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
  }
  // Tambah jumlah buku jika sudah ada, atau tambahkan buku baru jika belum ada
  if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id] += 1;
  } else {
    $_SESSION['cart'][$id] = 1;
  }
}

// Menampilkan isi shopping cart
?>

<?php include('./header.php'); ?>

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
        <th>Total Price</th>
      </tr>
      <?php
      // Include koneksi database
      require_once('../lib/db_login.php');
      $sum_qty = 0;
      $sum_price = 0;

      // Cek apakah keranjang belanja memiliki item
      if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $id => $qty){
          // Ambil detail buku berdasarkan ISBN
          $query = "SELECT * FROM books WHERE isbn='".$id."'";
          $result = $db->query($query);
          
          // Cek apakah query berhasil
          if(!$result){
            die("Could not query the database: <br>" . $db->error);
          }
          
          // Tampilkan item buku di keranjang
          while($row = $result->fetch_object()){
            echo '<tr>';
            echo '<td>' . $row->isbn . '</td>';
            echo '<td>' . $row->author . '</td>';
            echo '<td>' . $row->title . '</td>';
            echo '<td>$' . $row->price . '</td>';
            echo '<td>' . $qty . '</td>';
            echo '<td>$' . ($row->price * $qty) . '</td>';
            echo '</tr>';
            $sum_price += ($row->price * $qty);
            $sum_qty += $qty;
          }
        }

        // Tampilkan total quantity dan harga
        echo '<tr><td colspan="4"></td><td>Total: ' . $sum_qty . '</td><td>$' . $sum_price . '</td></tr>';
        
        // Bersihkan hasil query
        $result->free();
        // Tutup koneksi
        $db->close();
      } else {
        echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>';
      }
      ?>
    </table>
    Total items = <?= $sum_qty; ?><br><br>
    <a href="view_books.php" class="btn btn-primary">Continue Shopping</a>
    <a href="delete_cart.php" class="btn btn-danger" onclick="return confirm('Do you want to clear your cart?')">Empty Cart</a>
  </div>
</div>
<?php include('./footer.php'); ?>
