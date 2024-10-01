<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="ajax.js"></script>
</head>
<body>
    <div class="card">
        <div class="card-header">Ajax Server Time</div>
        <button class="btn btn-success" onclick="get_server_time()"> Show Server Time </button>
        <br><br>
        <div id="showtime"></div>
    </div>
</body>
</html>