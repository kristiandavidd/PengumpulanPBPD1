<?php
    require_once('db_login.php');
    $title = $_GET['title'];

    $query = " SELECT * FROM books WHERE title LIKE '%".$title."%' ";
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