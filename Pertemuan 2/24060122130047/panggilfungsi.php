<!-- Nama: Tirza Aurellia Wijaya
    NIM: 24060122130047 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    require_once("function.php");
    //Pemanggilan fungsi hitung_diskon
    $harga = 1000;
    $diskon = 20;
    $harga_diskon = hitung_diskon($harga,$diskon);
    echo 'Harga sebelum diskon = '.$harga.'<br />';
    echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
    //pemanggilan fungsi faktorial
    print(faktorial(4));
    ?>
</body>
</html>