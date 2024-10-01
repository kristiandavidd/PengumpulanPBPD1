<?php
session_start();
require_once('../lib/db_login.php');

if (isset($_POST["submit"])) {
    $valid = true;
    $email = test_input($_POST['email']);
    if ($email == '') {
        $error_email = "Email is required";
        $valid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Invalid email format";
        $valid = false;
    }
    $password = test_input($_POST['password']);
    if ($password == '') {
        $error_password = "Password is required";
        $valid = false;
    }
    if ($valid) {
        $query = "SELECT * FROM admin WHERE email = '" . $email . "' AND password = '" . md5($password) . "'";
        $result = $db->query($query);
        if (!$result) {
            die("Could not query the database: <br/>" . $db->error . "<br/>Query: " . $query);
        } else {
            if ($result->num_rows > 0) {
                $_SESSION['username'] = $email;
                header('Location: view_customer.php');
            } else {
                $error_login = "Email or Password is invalid";
            }
        }
        $db->close();
    }
}
?>

<?php include('../components/header.html') ?>

<div class="flex items-center justify-center min-h-screen bg-gray-700 text-white">
    <div class="bg-gray-100 text-black p-6 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">Login Form</h2>

        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-4">
                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email:</label>
                <input type="email" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" placeholder="Enter email" size="30" name="email" value="<?php if (isset($email)) echo $email; ?>">
                <?php if (isset($error_email)): ?>
                    <p class="text-red-500 text-xs italic mt-2"><?php echo $error_email; ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password:</label>
                <input type="password" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" placeholder="Enter password" name="password">
                <?php if (isset($error_password)): ?>
                    <p class="text-red-500 text-xs italic mt-2"><?php echo $error_password; ?></p>
                <?php endif; ?>
            </div>

            <?php if (isset($error_login)): ?>
                <p class="text-red-500 text-center mb-4"><?php echo $error_login; ?></p>
            <?php endif; ?>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="submit" value="submit">Login</button>
            </div>
        </form>
    </div>
</div>

