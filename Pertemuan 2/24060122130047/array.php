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
    // Assignment menggunakan fungsi array
    $diskon = array(0,10,20,30,40,50,60,70,80,90);

    // Cek apakah sebuah variabel bertipe array
    if (is_array($diskon)){
        echo 'Array';
    } else {
        echo 'Not Array';
    }

    // Menampilkan isi array
    $n = count($diskon);
    for ($i = 0; $i < $n; $i++){
        echo 'Diskon hari ke-'.($i + 1).' = '.$diskon[$i].' % <br />';
    }

    //assignment menggunakan fungsi array
    $bulan = array('jan' => 'Januari',
    'feb' => 'Februari',
    'mar' => 'Maret',
    'apr' => 'April',
    'mei' => 'Mei',
    'jun' => 'Juni',
    'jul' => 'Juli',
    'agu' => 'Agustus',
    'sep' => 'Sepetember',
    'okt' => 'Oktober',
    'nov' => 'November',
    'des' => 'Desember');

    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }
    ?>
</body>
</html>
