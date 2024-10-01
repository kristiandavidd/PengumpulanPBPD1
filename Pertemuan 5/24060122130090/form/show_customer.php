<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="ajax.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="card">
        <div class="card-header">Show Customers Data</div>
        <div class="card-body">
            <select name="customer" id="customer" class="form-control" onchange="showCustomer(this.value)">
                <option value="">--Select a Customer--</option>
                <?php
                    require_once("db_login.php");
                    $query = "SELECT * FROM customers ORDER BY customerid";
                    $result = $db->query($query);
                    if (!$result){
                        die ("Could not query the database <br>".$db->error);
                    }
                    while ($row = $result->fetch_object()){
                        echo '<option value="'.$row->customerid.'">'.$row->name.'</option>';
                    }
                    $result->free();
                    $db->close();
                ?>
            </select>
            <br>
            <div id="detail_customer"></div>
        </div>
    </div>
</body>
</html>