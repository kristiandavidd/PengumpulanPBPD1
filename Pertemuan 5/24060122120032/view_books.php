<?php include('./header.php') ?>

<div class="card mt-5">
    <div class="card-header">Books Data</div>
    <div class="card-body">
        <!-- Input Pencarian -->
        <input type="text" id="search" class="form-control mb-3" placeholder="Search by title..." onkeyup="searchBooks()" />

        <!-- Loader untuk menampilkan loading animation saat melakukan pencarian -->
        <div id="loader" style="display:none; text-align:center;">Loading...</div>

        <!-- Tabel Data Buku -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="book-data">
                <!-- Data buku akan ditampilkan di sini -->
                <?php
                require_once('../lib/db_login.php');

                $query = "SELECT * FROM books";

                $result = $db->query($query);
                if (!$result) {
                    die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
                }

                $i = 1;
                while ($row = $result->fetch_object()) {
                    echo '<tr>';
                    echo '<td>' . $row->isbn . '</td>';
                    echo '<td>' . $row->author . '</td>';
                    echo '<td>' . $row->title . '</td>';
                    echo '<td>$' . $row->price . '</td>';
                    echo '<td><a class="btn btn-primary btn-sm" href="show_cart.php?id=' . $row->isbn . '">Add to Cart</a></td>';
                    echo '</tr>';
                    $i++;
                }
                echo '</table>';
                echo '<br />';
                echo 'Total Rows = ' . $result->num_rows;

                $result->free();
                $db->close();
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('./footer.php') ?>