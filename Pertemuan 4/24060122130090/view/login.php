<?php
session_start(); 
require_once('../lib/db_login.php'); 
$error_email = $error_password = $error_login = '';
if (isset($_POST['submit'])) {
    $valid = TRUE;
    $email = test_input($_POST['email']);
    if ($email == '') {
        $error_email = "Email wajib diisi";
        $valid = FALSE;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Format email tidak valid";
        $valid = FALSE;
    }
    $password = test_input($_POST['password']);
    if ($password == '') {
        $error_password = "Password wajib diisi";
        $valid = FALSE;
    }
    if ($valid) {

        $escape_email = $db->real_escape_string($email);
        
        $query = "SELECT * FROM admin WHERE email='".$escape_email."' AND password='".md5($password)."'";
        $result = $db->query($query);
        if (!$result) {
            die ("Tidak dapat menghubungi database: <br />". $db->error);
        } else {
            if ($result->num_rows > 0) {
                $_SESSION['username'] = $email;
                header('Location: view_customer2.php');
                exit;
            } else {
                $error_login = "Kombinasi email dan password salah.";
            }
        }
        $db->close();
    }
}
?>
<!-- <?php include('../header.html') ?> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<br>
<div class="card">
    <div class="card-header">Login Form</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" size="30" value="<?php if (isset($email)) echo $email;?>">
                <div class="error">
                    <?php if (isset($error_email)) echo $error_email; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="">
                <div class="error">
                    <?php if (isset($error_password)) echo $error_password; ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
        </form>
    </div>
</div>
<!-- <?php include('../footer.html') ?> -->
