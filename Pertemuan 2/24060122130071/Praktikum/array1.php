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
    // Assignment melalui array identifier
    for ($i=0; $i<10; $i++){
        $diskon[] = $i * 5;  // Mengisi array $diskon dengan kelipatan 5
    }

    // Cek apakah variabel bertipe array
    if (is_array($diskon)) {
        echo '<h3>Array</h3>';
    } else {
        echo '<h3>Not Array</h3>';
    }

    // Menampilkan isi array sebelum diurutkan
    echo "<h3>Array Original:</h3>";
    for ($i = 0; $i < sizeof($diskon); $i++) {
        echo 'Diskon hari ke-' . ($i+1) . ' = ' . $diskon[$i] . ' %<br />';
    }
    echo "<br><br>";

    // Sort() - Mengurutkan berdasarkan nilai, tidak mempertahankan kunci
    sort($diskon);
    echo "<h3>Array Setelah sort() (berdasarkan nilai, kunci hilang):</h3>";
    for ($i = 0; $i < sizeof($diskon); $i++) {
        echo 'Diskon hari ke-' . ($i+1) . ' = ' . $diskon[$i] . ' %<br />';
    }
    echo "<br><br>";

    // Asort() - Mengurutkan berdasarkan nilai, mempertahankan kunci
    // Pertama, kita reset ulang array diskon ke kondisi awal
    $diskon = array();  
    for ($i=0; $i<10; $i++){
        $diskon[] = $i * 5;  // Isi ulang array $diskon
    }

    asort($diskon);
    echo "<h3>Array Setelah asort() (berdasarkan nilai, kunci dipertahankan):</h3>";
    foreach($diskon as $key => $value) {
        echo 'Kunci: ' . $key . ', Nilai: ' . $value . ' %<br />';
    }
    echo "<br><br>";

    // Ksort() - Mengurutkan berdasarkan kunci
    ksort($diskon);
    echo "<h3>Array Setelah ksort() (berdasarkan kunci):</h3>";
    foreach($diskon as $key => $value) {
        echo 'Kunci: ' . $key . ', Nilai: ' . $value . ' %<br />';
    }
    ?>
</body>
</html>
