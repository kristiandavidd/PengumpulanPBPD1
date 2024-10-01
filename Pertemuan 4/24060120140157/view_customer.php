<!--Nama : Muhammad Naufal -->
<!--NIM : 24060120140157 -->
<!--Tanggal Pengerjaan : 24-09-2024 -->
<!DOCTYPE html>
<html>
    <head>
        <title>Data Customer</title>
        <style>
            th, td {
                border: 1px solid black;
                text-align: left;
                padding-left: 10px;
                padding-top: 5px;
                padding-bottom: 5px;
                width: 300px;
                background-color: lightcyan;
            }
            .card{
                border: 1px solid black;
                width: 800px;
            }
            .card-header{
                background-color: lightgray;
                padding-top: 5px;
                padding-left: 10px;
                padding-bottom: 5px;
                border: 1px solid black;
            }
            .card-body{
                width: 800px;
                padding-bottom: 15px;
                background-color: lightgray;
            }
            a.btn.btn-primary{
                width: 60px;
                height: 25px;
                border-color: white;
                background-color: blue;
                margin-left: 10px;
                color: white;
                padding: 5px;
                border-radius: 8px;
            }
            a.btn.btn-warning.btn-sm{
                border-color: white;
                background-color: greenyellow;
                padding: 5px;
                border-radius: 8px;
            }
            a.btn.btn-danger.btn-sm{
                border-color: white;
                background-color: red;
                color: white;
                padding: 5px;
                border-radius: 8px;
            }
            a.btn.btn-logout{
                border-color: white;
                background-color: red;
                color: white;
                padding: 5px;
                border-radius: 8px;
                margin: 20px;
            }
        </style>
    </head>
    <body>
        <?php
            session_start();
            if(!isset($_SESSION['username'])){
                header('Location: login.php');
            }
        ?>
        <div class="card">
            <div class="card-header">Customer Data</div>
            <div class="card-body">
                <br>
                <a class="btn btn-primary" href="add_customer.php">+ Add Customer Data </a> <br /> <br />
                <table class="table-striped">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>

                    <?php 
                        require_once('db_login.php');

                        $query = "SELECT * FROM customers ORDER BY customerid ";
                        $result = $db->query($query);
                        if(!$result){
                            die("Could not query the database: <br />". $db->error ."<br> Query: ".$query);
                        }

                        $i = 1;
                        while($row = $result->fetch_object()){
                            echo '<tr>';
                            echo '<td>'.$i.'</td>';
                            echo '<td>'.$row->name.'</td>';
                            echo '<td>'.$row->address.'</td>';
                            echo '<td>'.$row->city.'</td>';
                            echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id='.$row->customerid.'">Edit</a>&nbsp;&nbsp;
                                    <a class="btn btn-danger btn-sm" href="delete_customer.php?id='.$row->customerid.'">Delete</a>
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
                    <br>
                    <br>
                    <a class="btn btn-logout" href="logout.php">Logout</a>
                </table>
            </div>
        </div>
    </body>
</html>