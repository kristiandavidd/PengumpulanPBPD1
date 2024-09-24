<!-- Nama : Muhammad Naufal Izzudin -->
<!-- Nim : 24060122120018 -->
<!-- Tanggal Pengerjaan : 20 September 2024 -->

<?php
session_start();
require_once('../lib/db_login.php');

if (!function_exists('test_input')) {
    function test_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }
}

$email = '';
$password = '';
$valid = TRUE; 

if (isset($_POST['submit'])) {
    $email = test_input($_POST['email']);
    if ($email == '') {
        $error_email = "Email is required";
        $valid = FALSE;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Invalid email format";
        $valid = FALSE;
    }

    $password = test_input($_POST['password']);
    if ($password == '') {
        $error_password = "Password is required";
        $valid = FALSE;
    }

    if ($valid) {
        $query = "SELECT * FROM admin WHERE email = ?";
        $stmt = $db->prepare($query);
        if ($stmt === false) {
            die("Error preparing statement: " . $db->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                header('Location: view_customer.php');
                exit();
            } else {
                header('Location: login.php?error=wrong_password');
                exit();
            }
        } else {
            header('Location: login.php?error=invalid_credentials');
            exit();
        }
    }
}

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Login Form</div>
            <div class="card-body">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                        <div class="text-danger"><?php if (isset($error_email)) echo $error_email; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <div class="text-danger"><?php if (isset($error_password)) echo $error_password; ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Login</button>
                </form>
            </div>
        </div>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'invalid_credentials') {
                echo "<div class='alert alert-danger mt-3'>The email and password combination is incorrect.</div>";
            } elseif ($_GET['error'] == 'wrong_password') {
                echo "<div class='alert alert-danger mt-3'>The password you entered is incorrect.</div>";
            }
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
