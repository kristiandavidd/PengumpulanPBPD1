<?php 
// File       : login.php
// Deskripsi  : menampilkan form login ke halaman admin.php

session_start();
require_once('../lib/db_login.php');

$email = $password = "";

// check if user already submitted the form
if (isset($_POST["submit"])) {
  $valid = TRUE; // validation flag

  // check email validation
  $email = test_input($_POST["email"]);
  if ($email == "") {
    $error_email = "Email is required";
    $valid = FALSE;
  }

  // check password validation
  $password = test_input($_POST["password"]);
  if ($password == "") {
    $error_password = "Password is required";
    $valid = FALSE;
  }

  // valdiation check
  if ($valid) {
    // assign query
    $query = "SELECT * FROM admin WHERE email='".$email."' AND password='".md5($password)."'";
    // execute query
    $result = $db->query($query);
    if (!$result) {
      die("Could not query the database: <br>".$db->error);
    } else {
      if ($result->num_rows > 0) { // login berhasil
        $_SESSION["username"] = $email;
        header('Location: admin.php');
        exit;
      } else { // login gagal
        echo '<span class="error">Combination of username and password are not correct.</span>';
      }
    }
    // close db connection
    $db->close();
  }
}
?>

<?php include('../header.html'); ?>
<br>
<div class="card col-md-4 mx-auto">
  <div class="card-header">Login Form</div>
  <div class="card-body">
    <form method="post" autocomplete="on" 
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" 
        size="30" value="<?php echo $email;?>">
        <div class="error"><?php if (isset($error_email)) echo $error_email; ?></div>
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input type="password" name="password" id="password" class="form-control" 
        size="30" value="">
        <div class="error"><?php if (isset($error_password)) echo $error_password; ?></div>
      </div>
      <br>
      <button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
    </form>
  </div>
</div>
<?php include('../footer.html'); ?>