<?php 
// File       : delete_customer.php
// Deskripsi  : menghapus user
// Nama       : Qun Alfadrian Setyowahyu Putro
// NIM        : 24060122130072

require_once('../lib/db_login.php');
$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;
$name = "";

if (isset($_POST['submit'])) {
  $query = "DELETE FROM customers WHERE customerid=".$id;
  $result = $db->query($query);
  if (!$result) {
    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
  } else {
    echo '<div class="card">
      <div class="card-body">
        <h4>Customer Successfully Deleted</h4>
        <p>Redirecting...</p>
      </div>
    </div>';
    header('Location: view_customer.php');
  }
} else {
  // query to get customer name
  $query = "SELECT name FROM customers WHERE customerid=".$id;
  $result = $db->query($query);
  $row = $result->fetch_row();
  $name = $row[0];
}

?>

<?php include('../header.html'); ?>

<div class="bg-danger vh-100">
<div class="card col-4 mx-auto">
  <form action="" method="post">
  <div class="card-header text-center text-danger"><h4>Delete Customer?</h4></div>
    <div class="card-body h-50 text-center">
      <p>Are you sure you want to delete 
        <span style="font-weight: bold;"><?php echo $name; ?></span>?
        <br>You can't undo this action.
      </p>
      <br>
      <a href="view_customer.php" class="btn btn-secondary btn-small">Cancel</a>
      <button type="submit" class="btn btn-danger" name="submit" value="submit">Delete</button>
    </div>
  </form>
</div>
</div>

<?php include('../footer.html'); ?>