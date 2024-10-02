<!DOCTYPE html>
<html>
    <head>
        <title>Add Customer</title>
        <script src="ajax.js"></script>
        <style>
            .card-header{
                width: 500px;
                background-color: lightgray;
                padding-top: 5px;
                padding-left: 10px;
                padding-bottom: 5px;
                border: 1px solid black;
            }
            .card-body{
                width: 500px;
                background-color: lightgray;
                padding-top: 5px;
                padding-left: 10px;
                padding-bottom: 5px;
                border: 1px solid black;
            }
            .btn.btn-primary{
                border-color: white;
                background-color: greenyellow;
                color: white;
                padding: 5px;
                border-radius: 8px;
                margin: 20px;
            }
            .btn.btn-secondary{
                border-color: white;
                background-color: red;
                color: white;
                padding: 5px;
                border-radius: 8px;
                margin: 20px;
            }
            #nama{
                margin-left: 50px;
            }
            #address{
                margin-left: 36px;
            }
            #city{
                margin-left: 61px;
            }
        </style>
    </head>
    <body>
        <br>
        <div class="card">
            <div class="card-header">Add Customer</div>
            <div class="card-body">
                <form method="POST" autocomplete="on" action="">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <select name="city" id="city" class="form-control" required>
                        <option value="none">--Select a city--</option>
                        <option value="Airpost West">Airport West</option>
                        <option value="Box Hill">Box Hill</option>
                        <option value="Yarraville">Yarraville</option>
                    </select>
                </div>
                <br>
                <button type="button" class="btn btn-primary" onclick="add_customer_post()">Submit</button>
                <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
                </form>
                <br>
                <div id="add_response"></div>
            </div>
        </div>

    </body>
</html>