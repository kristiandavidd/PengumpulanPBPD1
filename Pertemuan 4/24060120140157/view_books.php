<!--Nama : Muhammad Naufal -->
<!--NIM : 24060120140157 -->
<!--Tanggal Pengerjaan : 24-09-2024 -->
<!DOCTYPE html>
<html>
    <head>
        <title>Books Data</title>
    </head>
    <body>
        <div class="card">
            <div class="card-header">Books Data</div>
            <div class="card-body">
                <br>
                <table class="table-striped">
                    <tr>
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>

                    <?php 
                        require_once('db_login.php');

                        $query = "SELECT * FROM books ORDER BY isbn ";
                        $result = $db->query($query);
                        if(!$result){
                            die("Could not query the database: <br />". $db->error ."<br> Query: ".$query);
                        }

                        while($row = $result->fetch_object()){
                            echo '<tr>';
                            echo '<td>'.$row->isbn.'</td>';
                            echo '<td>'.$row->author.'</td>';
                            echo '<td>'.$row->title.'</td>';
                            echo '<td>'.$row->price.'</td>';
                            echo '<td><a class="btn btn-primary" href="show_cart.php?id='.$row->isbn.'">Add to Cart</a></td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                        echo '<br />';
                        echo 'Total Rows ='.$result->num_rows;
                        $result->free();
                        $db->close();
                        
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>