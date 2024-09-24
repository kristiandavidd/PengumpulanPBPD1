<!--Nama : Muhammad Naufal -->
<!--NIM : 24060120140157 -->
<!--Tanggal Pengerjaan : 24-09-2024 -->
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php
            session_start();
            require_once('db_login.php');

            if (isset($_POST["submit"])){
                $valid = TRUE;

                $email = test_input($_POST['email']);
                if ($email == ''){
                    $error_email = "Email is required";
                    $valid = FALSE;
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error_email = "Invalid email format";
                    $valid = FALSE;
                }

                $password = test_input($_POST['password']);
                if ($password == ''){
                    $error_password = "Password is required";
                    $valid = FALSE;
                }

                if($valid){
                    $query = "SELECT *  FROM admin WHERE email='".$email."' AND password='".md5($password)."' ";
                    $result = $db->query($query);
                    if(!$result){
                        die("Could not query the database: <br />". $db->error);
                    } else {
                        if($result->num_rows > 0){
                            $_SESSION['username'] = $email;
                            header('Location: admin.php');
                            exit;
                        }else{
                            echo '<span class="error">Combination of username and password are not correct.</span>';
                        }
                    }
                    $db->close();
                }
            }
        ?>
        <br>
        <div class="card">
            <div class="card-header">Login Form</div>
            <div class="card-body">
                <form method="POST" autocomplete="on">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" size="30" value="">
                        <div class="error"><?php if(isset($error_name)) echo $error_name;?></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" value="">
                        <div class="error"><?php if(isset($error_password)) echo $error_password;?></div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
                </form>
            </div>
        </div>
    </body>
</html>