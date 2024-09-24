<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include_once('../components/header.html');
?>

<div class="bg-gray-700 text-white min-h-screen p-6">
    <div class="bg-gray-100 text-black p-6 rounded-lg shadow-md max-w-lg mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Admin Page</h2>

        <p>Welcome...</p>
        <p>You are logged in as <b><?php echo $_SESSION['username'] ?></b></p>

        <div class="mt-6">
            <a href="logout.php" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Logout</a>
        </div>
    </div>
</div>

