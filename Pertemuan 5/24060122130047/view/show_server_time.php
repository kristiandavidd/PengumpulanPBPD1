<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include ('./header.php'); ?>
    <div class = "card">
        <div class = "card-header">Ajax Server Time</div>
        <div class = "card-body">
            <button class = "btn btn-success" onclick = "get_server_time()">Show Server Time</button>
            <br><br>
            <div id = "showtime"></div>
        </div>
    </div>
    <?php include('../footer.php'); ?>
</body>
</html>