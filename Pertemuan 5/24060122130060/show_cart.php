<!-- 
Nama : Tara Tirzandina
NIM : 24060122130060
Tanggal : 24 September 2024
-->

<?php
//File : show_cart.php
//Desk : Menambahkan item ke shopping cart dan menampilkan isinya

session_start();
$id = $_GET['id'];
if($id != ""){
    //
    //
    //
    //
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    //
    if (isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}
?>
<!-- Menampilkan isi shopping cart -->
 <?php include ('header.php')?>
 <br>
 <div class="card">
    <div class="card-header">Shoppin Cart</div>
    <div class="class-body">
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
//include our logi information
require_once('db_login.php');
$sum_qty = 0;
$sum_price = 0;
if (is_array($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $id => $qty){
        $query = " SELECT * FROM books WHERE isbn = '".$id."' ";
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database: <br>". $db->error ."<br>Query: ".$query);
        }
        while ($row= $result->fetch_object()){
            echo '<tr>';
            echo '<td>'.$row->isbn.'</td>';
            echo '<td>'.$row->author.'</td>';
            echo '<td>'.$row->title.'</td>';
            echo '<td>'.$row->price.'</td>';
            echo '<td>'.$qty.'</td>';
            $sum_qty = $sum_qty + $qty;
            $sum_price = $sum_price + ($row->price * $qty);
        }
    }
    echo'<tr><td></td><td></td><td></td><td></td><td>'.$sum_qty.'</td><td>'.$sum_price.'</td><td>';
    $result->free();
    $db->close();
} else {
    echo '<tr><td colspan="6" align="center"> There is no item in shopping art</td></tr>';
}
?>
</table>
Total items = <?php echo $sum_qty; ?><br><br>
<a class="btn btn-primary" href="view_book.php">Continue Shopping</a>
<a class="btn btn-danger" href="delete_cart.php">Empty Cart</a>
</div>
</div>
<?php include('footer.php') ?>