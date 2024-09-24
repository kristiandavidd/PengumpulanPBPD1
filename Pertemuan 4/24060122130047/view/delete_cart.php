<?php 
session_start();

if (isset($_SESSION['cart'])) {
    // Clear the shopping cart
    unset($_SESSION['cart']);
}

// Redirect to the view_books.php page
header('Location: view_books.php');
exit(); // Always include exit after header redirection
?>
