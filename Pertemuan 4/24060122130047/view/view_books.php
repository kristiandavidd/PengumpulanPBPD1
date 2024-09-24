<!-- 
 Nama: Tirza Aurellia Wijaya
 NIM: 24060122130047
 Tanggal Pengerjaan: 24 Sept 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="card">
        <div class="card-header">Books Data</div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>ISBN</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php
                    // Include login information
                    require_once('../lib/db_login.php');

                    // Execute the query
                    $query = "SELECT * FROM books ORDER BY ISBN";
                    $result = $db->query($query);
                    if (!$result) {
                        die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
                    }

                    // Fetch and display the result
                    while ($row = $result->fetch_object()) {
                        echo '<tr>';
                        echo '<td>'.$row->isbn.'</td>';
                        echo '<td>'.$row->author.'</td>';
                        echo '<td>'.$row->title.'</td>';
                        echo '<td> $'.$row->price.'</td>';
                        echo '<td>
                                <a class="btn btn-primary btn-sm" href="show_cart.php?id='.$row->isbn.'">Add to Cart</a>
                              </td>';
                        echo '</tr>';
                    }
                ?>
            </table>
            <br />
            <?php
                echo 'Total Rows = ' . $result->num_rows;
                $result->free();
                $db->close();
            ?>
        </div>
    </div>
</body>
</html>
