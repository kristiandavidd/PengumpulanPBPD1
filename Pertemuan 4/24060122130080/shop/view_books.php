<!-- 
    Nama : Alfonso Clement Sutantio
    NIM : 24060122130080
    Tanggal : 21/09/2024
    File : view_books.php
 -->
<?php
session_start();

?>
<?php include('../header.php') ?>
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
        <span>Books Data</span>
    </div>
    <div class="card-body">
        <br>
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
            require_once('../customer/lib/db_login.php');

            $query = " SELECT * FROM books ORDER BY isbn ";
            $result = $db->query($query);

            if (!$result) {
                die("Could not query the database: <br />" . $db->error . '<br>Query: ' . $query);
            }

            $moneycurrency = '$';
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<td>' . $row->isbn . '</td>';
                echo '<td>' . $row->author . '</td>';
                echo '<td>' . $row->title . '</td>';
                echo '<td>' . $moneycurrency . $row->price . '</td>';
                echo '<td><a class="btn btn-primary" href="show_cart.php?id=' . $row->isbn . '">Add to
                Cart</a></td>';
                echo '</tr>';
            }

            echo '</table>';
            echo '<br />';
            echo 'Total Rows = ' . $result->num_rows;
            $result->free();
            $db->close();
            ?>
        </table>
    </div>
</div>
<?php include('../footer.php') ?>