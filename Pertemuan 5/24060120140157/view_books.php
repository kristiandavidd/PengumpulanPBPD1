<!DOCTYPE html>
<html>
    <head>
        <title>Books Data</title>
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
                background-color: grey;
                margin-left: 10px;
                color: white;
                padding: 5px;
                border-radius: 8px;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <div class="card-header">Books Data</div>
            <div class="card-body">
                <br>
                <a>Search: <input type="text" onkeyup="showResult(this.value)"></a>
                <br>
                <table class="table-striped">
                    <tr>
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <table class="table-striped" id="bookResult"></table>
            </div>
        </div>
    </body>
</html>