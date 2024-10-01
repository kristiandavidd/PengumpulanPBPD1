<!-- 
Nama          : Fendi Ardianto
NIM           : 24060122130077
Tgl Pembuatan : 24 September 2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Books</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
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
      </table>
      </div>
    </div>
  </div>
  
</body>
</html>