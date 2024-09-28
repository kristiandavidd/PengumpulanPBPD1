<?php
include ('header.php');
?>

<div class="card">
    <div class="card-header">Books data</div>
    <div id="card-body">
        <br>
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>action</th>
            </tr>

             <?php
            // include our login information
             require_once('db_login.php');
            
            //  execute the query
            $query = "SELECT * FROM books ORDER BY isbn";
            $result = $db->query($query);
            if (!$result){
                die ("could not query the database: <br>". $db->error. "<br>Query: ".$query);
            }

            $i = 1;
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<td>' . $i . '</td>'; // Menampilkan nomor urut
                echo '<td>' . $row->isbn . '</td>'; // Menampilkan kolom nama
                echo '<td>' . $row->author . '</td>'; // Menampilkan kolom alamat
                echo '<td>' . $row->title . '</td>'; // Menampilkan kolom kota
                echo '<td>' . $row->price . '</td>'; // Menampilkan kolom kota
                // Tombol untuk edit dan delete berdasarkan id customer
                echo '<td>
                        <a class="btn btn-primary" href="show_cart.php?id=' . $row->isbn . '">Add to Cart</a>&nbsp;&nbsp;
                      </td>';
                echo '</tr>';
                $i++; // Increment nomor urut
            }
            echo '</table>';
            echo '</br>';
            echo 'Total Rows = '.$result->num_rows;
            $result->free();
            $db->close();
            ?>
        </table>
    </div>
</div>

<?php
include ('footer.php');
?>