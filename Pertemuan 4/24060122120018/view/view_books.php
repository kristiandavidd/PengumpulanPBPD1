<!-- Nama : Muhammad Naufal Izzudin -->
<!-- Nim : 24060122120018 -->
<!-- Tanggal Pengerjaan : 20 September 2024 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <br>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Books Data</div>
            <div class="card-body">
                <table class="table table-striped">
					<thead>
						<tr>
							<th colspan="6" style="height: 15px; background-color: white; border: none;"></th>
						</tr>
					</thead>
                    <tbody>
					    <tr>
                            <th>ISBN</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $mysqli = new mysqli("localhost", "root", "", "bookdb");

                        if ($mysqli->connect_error) {
                            die("Connection failed: " . $mysqli->connect_error);
                        }

                        $query = "SELECT isbn, author, title, price FROM books";
                        $result = $mysqli->query($query);
                        $total_rows = $result->num_rows;
                        $sum_qty = 0;

                        while ($row = $result->fetch_object()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row->isbn) . "</td>";
                            echo "<td>" . htmlspecialchars($row->author) . "</td>";
                            echo "<td>" . htmlspecialchars($row->title) . "</td>";
                            echo "<td>$" . number_format($row->price, 2) . "</td>";
                            echo "<td><a class='btn btn-primary' href='show_cart.php?id=" . urlencode($row->isbn) . "'>Add to Cart</a></td>";
                            echo "</tr>";
                            $sum_qty++;
                        }

                        echo "</tbody></table>";
                        echo "<p>Total Rows = " . $total_rows . "</p>";

                        $mysqli->close();
                        ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
