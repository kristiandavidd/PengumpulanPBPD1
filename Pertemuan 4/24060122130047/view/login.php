<!-- 
 Nama: Tirza Aurellia Wijaya
 NIM: 24060122130047
 Tanggal Pengerjaan: 24 Sept 2024 -->
<?php
    session_start(); //inisialisasi session
    require_once('../lib/db_login.php');

    //Cek apakah user sudah submit form
    if (isset($_POST["submit"])) {
        # code...
        $valid = TRUE;  //Flag Validasi
        //Cek validasi email
        $email = test_input($_POST['email']);
        if ($email == '') {
            # code...
            $error_email = "Email is required";
            $valid = FALSE;
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            # code...
            $error_email = "Invalid Email Format";
            $valid = FALSE;
        }

        //Cek validasi Password
        $password = test_input($_POST['password']);
        if ($password == '') {
            # code...
            $error_password = "Password is required";
            $valid = FALSE;
        }

        //Cek Validasi
        if ($valid) {
            # code...
            //Assign a query
            $query = "SELECT * FROM admin WHERE email ='".$email."' AND password='".md5($password)."' ";
            //Execute the query
            $result = $db->query($query);
            if (!$result) {
                # code...
                die ("could not query the database: <br/>". $db->error);
            }else {
                # code...
                if ($result->num_rows > 0) {    //login berhasil
                    # code...
                    $_SESSION['username'] = $email;

                    header('Location: admin.php');
                    exit;
                }else {     //Login gagal
                    # code...
                    echo '<span class = "error">Combination of username and password are not correct.</span>';
                    echo "Email: " . $email . "<br>";
                    echo "MD5 Password: " . md5($password) . "<br>";

                }
            }
            //close db connection
            $db->close();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php include('./header.php')?>
    <br>
    <div class = "card m-5">
        <div class = "card-header">Login Form</div>
        <div class = "card-body">
            <form method = "POST" autocomplete = "on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" >
            <div class = "form-group my-2">
                <label for="email">Email:</label>
                <input type="email" class = "form-control" id="email" name ="email" size = "30" value ="<?php if (isset($email)) echo $email;?>" >
                <div class = "error"><?php if(isset($error_email)) echo $error_email;?></div>
            </div>
            <div class = "form-group my-2">
                <label for="password">Password:</label>
                <input type="password" class = "form-control" id = "password" name ="password" value ="">
                <div class = "error"><?php if(isset($error_password)) echo $error_password;?></div>
            </div>
            <button type ="submit" class ="btn btn-primary" name = "submit" value = "submit">Login</button>
</form>
</div>
</div>
<?php include('./footer.php') ?>


</body>
</html>