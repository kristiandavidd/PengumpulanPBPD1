<!-- Nama : Farrel Ardana Jati -->
<!-- Nim : 24060122140165 -->
<!-- Tanggal Pengerjaan : 21 September 2024 -->
<?php include('./header.php'); ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">Books Data</div>
    <div class="card-body">
      <br>
      <table class="table table-striped">
        <tr>
          <th>ISBN</th>
          <th>Author</th>
          <th>Title</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
        <?php
          require_once('../lib/db_login.php');

          $query = "SELECT * FROM books";
          $result = $db->query($query);
          if(!$result){
            die("Could not query the database: <br>". $db->error."<br>Query: ".$query);
          }
          while($row = $result->fetch_object()){ ?>
            <tr>
              <td> <?php echo $row->isbn; ?> </td>
              <td> <?php echo $row->author; ?> </td>
              <td> <?php echo $row->title; ?> </td>
              <td> <?php echo $row->price; ?> </td>
              <td> <a class="btn btn-primary" href="show_cart.php?id=<?php echo $row->isbn; ?>">Add to Cart</a></td>
            </tr>
          <?php }?>
      </table>
      <br>
      Total Rows = <?= $result->num_rows ?>
      <?php
      $result->free();
      $db->close();
      ?>
    </div>
  </div>
</div>

<?php include('./footer.php'); ?>
