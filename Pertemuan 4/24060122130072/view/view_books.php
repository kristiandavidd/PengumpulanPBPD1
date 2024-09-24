<?php include('../header.html'); ?>

<div class="card col-11 mx-auto">
  <div class="card-header">Book Data</div>
  <div class="card-body">
    <table class="table table-striped">
      <tr>
        <th>No</th>
        <th>ISBN</th>
        <th>Author</th>
        <th>Title</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
      <?php 
      // include db login information
      require_once('../lib/db_login.php');

      // create query
      $query = "SELECT * FROM books ORDER BY title LIMIT 20";
      $result = $db->query($query);
      if (!$result) {
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
      }

      // fetch and display result
      $i = 1;
      while ($row = $result->fetch_object()) {
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$row->isbn.'</td>';
        echo '<td>'.$row->author.'</td>';
        echo '<td>'.$row->title.'</td>';
        echo '<td>'.$row->price.'</td>';
        echo '<td><a class="btn btn-primary btn-sm" href="show_cart.php?id='.
        $row->isbn.'">Add To Cart</a></td>';
        echo '</tr>';
        $i++;
      }
      echo '</table>';
      echo '<br>';
      echo 'Showing top '.$result->num_rows.' rows';
      $result->free();
      $db->close();
      ?>
    </table>
  </div>
</div>

<?php include('../footer.html'); ?>