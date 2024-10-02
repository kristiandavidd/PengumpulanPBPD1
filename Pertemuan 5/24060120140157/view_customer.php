<!DOCTYPE html>
<html>
    <head>
        <title>Data Customer</title>
        <script src="ajax.js"></script>
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
        <div class="card">
            <div class="card-header">Customer Data</div>
            <div class="card-body">
                <br>
                <a class="btn btn-primary" href="add_customer.php">+ Add Customer Data </a> <br /> <br />
                <select name="customer" id="customer" class="form-control" onchange="showCustomer(this.value)">
                    <option value="">--Select a Customer</option>
                    <?php 
                        require_once('db_login.php');

                        $query = "SELECT * FROM customers ORDER BY customerid ";
                        $result = $db->query($query);
                        if(!$result){
                            die("Could not query the database: <br />". $db->error ."<br> Query: ".$query);
                        }

                        while($row = $result->fetch_object()){
                            echo '<option value="'.$row->customerid.'">'.$row->name.'</option>';
                        }
                        $result->free();
                        $db->close();
                        
                    ?>
                </select>
                <br>
                <br>

                <div id="detail_customer"></div>
                <br>
                <a class="btn btn-logout" href="logout.php">Logout</a>
            </div>
        </div>
    </body>
</html>