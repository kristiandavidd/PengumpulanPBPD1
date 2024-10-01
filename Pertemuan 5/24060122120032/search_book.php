<?php
require_once('../lib/db_login.php');
$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT * FROM books WHERE title LIKE '%".$db->real_escape_string($query)."%'";
$result = $db->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        echo '<tr>';
        echo '<td>' . $row->isbn . '</td>';
        echo '<td>' . $row->author . '</td>';
        echo '<td>' . $row->title . '</td>';
        echo '<td>$' . $row->price . '</td>';
        echo '<td><a class="btn btn-primary btn-sm" href="show_cart.php?id=' . $row->isbn . '">Add to Cart</a></td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">No books found</td></tr>';
}

$db->close();
?>
