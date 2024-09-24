<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
 <!-- Tanggal  Pengerjaan : 4 September 2024-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Looping</title>
    <style>
        body{
            background-color: antiquewhite;
        }
    </style>
</head>
<body>
    <h1>TABEL DISKON SOCIOLLA ^.^</h1>
    <p>Nama : Muthia Zhafira Sahnah</p>
    <p>NIM : 2460122130071</p>
    <?php
    $harga = 1000;
    echo '<table border="1">';
    echo '<tr style="background-color: #f2a6a6; color: white;">';
    echo '<th>No</th>';
    echo '<th>Diskon</th>';
    echo '<th>Harga Setelah Diskon</th>';
    echo '</tr>';
    for ($i=1; $i<=10; $i++){
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        $diskon = $i * 0.1;
        echo '<td>'.($diskon*100).' %</td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>'.$harga_diskon.'</td>';
        echo '</tr>';
    }
    echo '</table>';
    ?>
</body>
</html>