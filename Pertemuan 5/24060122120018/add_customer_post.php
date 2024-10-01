<!-- Nama : Muhammad Naufal Izzudin -->
<!-- Nim : 24060122120018 -->
<!-- Tanggal Pengerjaan : 25 September 2024 -->

<?php
require_once('../lib/db_login.php');

$name = $db->real_escape_string($_GET['name']);
$address = $db->real_escape_string($_GET['address']);
$city = $db->real_escape_string($_GET['city']);
$query = "INSERT INTO customers (name, address, city) VALUES ('" . $name . "', '" . $address . "', '" . $city . "')";
$result = $db->query($query);

if (!$result) {
    echo 'div class="alert alert-danger alert-dismissible">
			<strong>Error! </strong> Could not query the database <br>'.
			$db->error.'<br>query = '.$query.
		'</div>';
} else {
    echo '<div class="alert alert-success alert-dismissible">
			<strong>Success! </strong> Data has been added.<br>
			Name: '.$_POST['name'].'<br>
			Address: '.$_POST['address'].'<br>
			City: '.$_POST['city'].'<br>
		</div>';
}
$db->close();
?>