<!-- Nama : Bima Aditya Aryono / 24060122140113
    FILE :view_book.php
    Deskripsi: Halaman menampilkan daftar buku yang terdapat di database dan dapat dimasukkan ke cart -->


    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="card">
        <div class="card-header">Books Data</div>
        <div class="card-body">
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ISBN</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Include login information
                        require_once('../lib/db_login.php');
                        $query = "SELECT * FROM books";
                        $result = $db->query($query);
                        if (!$result) {
                            die("Could not query the database <br />" . $db->error . "<br>Query :" . $query);
                        }    

                        $i = 1;
                        while ($row = $result->fetch_object()) {
                            echo "<tr>";
                            echo "<td>" . $row->isbn . "</td>";
                            echo "<td>" . $row->author . "</td>";
                            echo "<td>" . $row->title . "</td>";
                            echo "<td>$" . $row->price . "</td>";
                            echo '<td>
                                    <a class="btn btn-primary btn-sm" href="show_cart.php?id=' . $row->isbn . '">Add to cart</a>
                                  </td>';
                            echo "</tr>";
                            $i++;
                        }

                        echo "</tbody>";
                        echo "</table>";
                        echo "<br />";
                        echo "Total rows = " . $result->num_rows;
                        $result->free();
                        $db->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
