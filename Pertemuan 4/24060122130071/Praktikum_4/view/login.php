<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 23 September 2024-->
<?php
//Memulai Sesi
session_start(); 
require_once('../lib/db_login.php'); 
$error_email = $error_password = $error_login = '';
// Cek uda submit blm
if (isset($_POST['submit'])) {
    $valid = TRUE;
    $email = test_input($_POST['email']);
    //ngecek email kosong ga sama filter
    if ($email == '') {
        $error_email = "Email wajib diisi";
        $valid = FALSE;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Format email tidak valid";
        $valid = FALSE;
    }
//ngecek pw kosong ga
    $password = test_input($_POST['password']);
    if ($password == '') {
        $error_password = "Password wajib diisi";
        $valid = FALSE;
    }
// cek email pw dh bener belom
    if ($valid) {
    
        //kl misal ada karakter ',", / dll tidak akan memengaruhi struktur
        $escape_email = $conn->real_escape_string($email);
        
        // query buat cek email and password
        $query = "SELECT * FROM admin WHERE email='".$escape_email."' AND password='".($password)."'";
        $result = $conn->query($query);
        if (!$result) {
            die ("Tidak dapat menghubungi database: <br />". $conn->error);
        } else {
            if ($result->num_rows > 0) {
                $_SESSION['username'] = $email;
                header('Location: admin.php');
                exit;
            } else {
                $error_login = "Kombinasi email dan password salah.";
            }
        }
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("../lib/background.png");
            background-size: 100%;
            padding-left: 750px;
            padding-top: 200px;
        }
        .card {
            margin: 50px auto;
            padding: 40px auto;
            max-width: 30px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5%;
            background-color: #FFF4EA;
        }
        .btn-primary {
            margin-bottom: 20px;
            background-color: #16325B;
            border-color: #16325B;
            margin-left: 45%;
            margin-right: 45%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                    <div class="text-danger text-center"><?php if (isset($error_login)) echo $error_login; ?></div>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                            <div class="text-danger"><?php if (isset($error_email)) echo $error_email; ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="text-danger"><?php if (isset($error_password)) echo $error_password; ?></div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Masuk</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
