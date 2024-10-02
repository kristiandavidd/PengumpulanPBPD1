<!-- 
Nama                   : Alya Safina
NIM                    : 24060122140123
Tanggal pengerjaan     : 25 September 2024 
-->

<?php
    // Memulai sesi
    session_start(); 
    // Menghubungkan ke database
    require_once('../lib/db_login.php');

    // Memproses form login
    if (isset($_POST["submit"])) {
        $valid = TRUE;  
        // Validasi email
        $email = test_input($_POST['email']);
        if ($email == '') {
            $error_email = "Email is required";
            $valid = FALSE;
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_email = "Invalid Email Format";
            $valid = FALSE;
        }
        // Validasi password
        $password = test_input($_POST['password']);
        if ($password == '') {
            $error_password = "Password is required";
            $valid = FALSE;
        }

        if ($valid) {
            $query = "SELECT * FROM admin WHERE email ='".$email."' AND password='".md5($password)."' ";
            $result = $db->query($query);
            if (!$result) {
                die ("could not query the database: <br/>". $db->error);
            }
            else {
                if ($result->num_rows > 0) {    
                    $_SESSION['username'] = $email;
                    // Jika otentikasi berhasil
                    header('Location: admin.php');
                    exit;
                }
                // Jika otentikasi gagal
                else {     
                    echo '<span class = "error">Combination of username and password are not correct.</span>';
                    echo "Email: " . $email . "<br>";
                    echo "MD5 Password: " . md5($password) . "<br>";
                }
            }
            // Menutup kembali database
            $db->close();
        }
    }
?>

<!-- Form input email dan password -->
<?php include('./header.php')?>
    <br>
    <div class = "card m-5">
        <div class = "card-header">Login</div>
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