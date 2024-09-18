<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
 <!-- Tanggal  Pengerjaan : 4 September 2024-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Sorting</title>
</head>
<body>
    <p>Nama : Muthia Zhafira Sahnah</p>
    <p>NIM : 2460122130071</p>
    <?php
    // Assignment menggunakan fungsi array
    $bulan = array(
        'jan' => 'Januari',
        'feb' => 'Februari',
        'mar' => 'Maret',
        'apr' => 'April',
        'mei' => 'Mei',
        'jun' => 'Juni',
        'jul' => 'Juli',
        'agu' => 'Agustus',
        'sep' => 'September',
        'okt' => 'Oktober',
        'nov' => 'November',
        'des' => 'Desember'
    );

    echo "<h3>Array Original:</h3>";
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }
    echo "<br>";

    // Mengurutkan dengan sort() - Berdasarkan nilai, kunci hilang
    sort($bulan);
    echo "<h3>Array Setelah sort() (berdasarkan nilai, kunci hilang):</h3>";
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Nama bulan: "'.$nama_bulan.'"<br />';
    }
    echo "<br>";

    // Mengurutkan dengan asort() - Berdasarkan nilai, kunci dipertahankan
    asort($bulan);
    echo "<h3>Array Setelah asort() (berdasarkan nilai, kunci dipertahankan):</h3>";
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }
    echo "<br>";

    // Mengurutkan dengan ksort() - Berdasarkan kunci
    ksort($bulan);
    echo "<h3>Array Setelah ksort() (berdasarkan kunci):</h3>";
    foreach($bulan as $kode_bulan => $nama_bulan){
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
    }
    ?>
</body>
</html>
