<!-- Nama : Muhammad Naufal Rifqi Setiawan -->
<!-- NIM : 24060122130045 -->
<!-- Tanggal : 24-09-2024 -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Data</title>
</head>
<body>
    <div class="card">
        <div class="card-header">Books Data</div>
        <div class="card-body">
            <br />
                
                <?php
                    session_start(); // Start the session
                    require_once('../lib/db_login.php'); // Include the database connection

                    // Fetch the list of books from the database
                    $query = "SELECT * FROM books ORDER BY isbn";
                    $result = $db->query($query);
                    if (!$result) {
                        die("Could not query the database: <br />" . $db->error);
                    }

                    echo '<table class="table table-striped">';
                    echo '<tr><th>ISBN</th><th>Author</th><th>Title</th><th>Price</th><th>Action</th></tr>';

                    // Display each book in a table row
                    while ($row = $result->fetch_object()) {
                        echo '<tr>';
                        echo '<td>' . $row->isbn . '</td>';
                        echo '<td>' . $row->author . '</td>';
                        echo '<td>' . $row->title . '</td>';
                        echo '<td>' . $row->price . '</td>';
                        echo '<td><a class="btn btn-primary" href="show_cart.php?id=' . $row->isbn . '">Add to Cart</a></td>';
                        echo '</tr>';
                    }

                    echo '</table>';
                    echo '<br />';
                    echo 'Total Rows = ' . $result->num_rows;

                    $result->free();
                    $db->close();
                ?>
            <br><br>
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>