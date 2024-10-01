<!-- 
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pembuatan   : Minggu, 22 September 2024
    Nama File           : view_books.php
-->

<?php 
    session_start();
?>
<?php include('../header.html')  ?>
<div class="card">
    <div class="card-header">Books Data</div>
    <div class="card-body">
        <br />
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>Action</th>
            </tr>

            <?php
                // Include our login information
                require_once('../lib/db_login.php');

                // Execute the query
                $query = " SELECT * FROM books ";
                $result = $db->query($query);
                if (!$result){
                    die ("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
                }
                    
                // Fetch and display the results
                while ($row = $result->fetch_object()) {
                    echo '<tr>';
                    echo '<td>'.$row->isbn.'</td>';
                    echo '<td>'.$row->author.'</td>';
                    echo '<td>'.$row->title.'</td>';
                    echo '<td> $'.$row->price.'</td>';
                    echo '<td><a class="btn btn-primary" href="show_cart.php?id='.$row->isbn.'">Add to Cart</a>';
                    echo '<tr>';
                }
                echo '</table>';
                echo '<br />';
                echo 'Total Rows = '.$result->num_rows;
                $result->free();
                $db->close();
            ?>
        </table>
    </div>
</div>
<?php include('../footer.html') ?>