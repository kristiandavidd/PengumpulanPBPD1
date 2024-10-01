<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nama = $_POST['Nama'];
        echo("Nama : ".$nama."<br>");
        $NIS = $_POST['NIS'];
        echo("NIS : ".$NIS."<br>");
        $jenis_kelamin = $_POST['jenis_kelamin'];
        echo("Jenis Kelamin : ".$jenis_kelamin."<br>");
        $kelas = $_POST['Kelas'];
        echo("Kelas : ".$kelas."<br>");
    ?>
</body>
</html>