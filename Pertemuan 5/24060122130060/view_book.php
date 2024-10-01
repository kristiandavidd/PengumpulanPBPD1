<!-- 
Nama : Tara Tirzandina
NIM : 24060122130060
Tanggal : 24 September 2024
-->

<html>
    <head>
        <title>View Books</title>
    </head>
    <body>
        <?php include('header.php')?>
        <div class="card">
            <div class="card-header">Books Data</div>
            <!-- <a class="btn btn-primary" href="add_customer.php">Add Customers</a> -->
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
            //include login information
            require_once('db_login.php');

            //execute the query
            $query = " SELECT * FROM books ";
            $result = $db->query($query);
            if(!$result){
                die ("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
            }
            //fetch and display the result
            $i = 1;
            while($row = $result->fetch_object()){
                echo '<tr>';
                echo '<td>'.$row->isbn.'</td>';
                echo '<td>'.$row->author.'</td>';
                echo '<td>'.$row->title.'</td>';
                echo '<td>'.$row->price.'</td>';
                echo '<td><a class="btn btn-primary btn-sm" href="show_cart.php?id='.$row->isbn.'">Add to cart</a>&nbsp;&nbsp;
                </td>';
                echo '</tr>';
                $i++;
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
        <?php include('footer.php')?>
    </body>
</html>