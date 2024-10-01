<?php include ('header.html')?>
<!-- 
Nama/NIM Pembuat  : Nashwan Adenaya / 24060122130084
Tanggal Pembuatan : 20 September 2024
File              : view_customer.php
Deskripsi         : tampilan untuk list customer
 -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
   header('location: index.php');
}
?>

  <div class="card m-5">
    <div class="card-header">Customers Data</div>
    <div class="card-body">
      <br>
      <div class="d-flex mb-2 flex-grow-0"  style="height: 40px;">
        <a class="btn btn-primary me-auto" href="add_customer.php">+ Add Customer Data</a>
        <a class="btn btn-secondary" href="admin.php"> < Admin</a><br/><br/>
        <a class="btn btn-danger " href="logout.php">Logout</a>
      </div>
      <table class="table table-striped">
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Address</th>
          <th>City</th>
          <th>Action</th>
        </tr>

        <?php

          // Include login info
          require_once('lib/db_login.php');

          // Execute query       
          $query = "SELECT * FROM customers ORDER BY customerid";
          $result = $db->query($query) ;
          if (!$result){
            die("Could not query the database: <br />". $db->error . "<br>Query: ".$query);
          }

          // Fetch and display result
          $i = 1;
          while ($row = $result->fetch_object()) {
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$row->name.'</td>';
            echo '<td>'.$row->address.'</td>';
            echo '<td>'.$row->city.'</td>';
            echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id='.$row->customerid.'">Edit</a>&nbsp;&nbsp;
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are you sure to delete this data?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <a class="btn btn-danger " href="delete_customer.php?id='.$row->customerid.'">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
                  </td>';
            echo '</tr>';
            $i++;
          }
          echo '</table>';
          echo '<br />';
          echo 'Total Rows = '.$result->num_rows;
          $result->free();
          $db->close();
        ?>
      </table>
      
    </div>
  </div>
<?php include('footer.html')?>