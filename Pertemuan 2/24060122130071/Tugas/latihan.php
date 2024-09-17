<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
 <!-- Tanggal  Pengerjaan : 4 September 2024-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>24060122130071-Praktikum PBP 2 Lab D1</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
            text-align: center;
        }
        h1{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        p{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
</head>
<body>
    <h1>Data Nilai Mahasiswa IF kelas D</h1>
    <p>Tugas 2 Praktikum PBP </p>
    <p>Nama : Muthia Zhafira Sahnah</p>
    <p>NIM : 2460122130071</p>
    <?php
    // data nya di dlm array
    $array_mhs = array(
    'Abdul' => array(89,90,54),
    'Budi' => array(78,60,64),
    'Nina' => array(67,56,84),
    'Budi' => array(87,69,50),
    'Budi' => array(98,65,74)
    );


    // menghitung rata-rata
    function hitung_rata($array) {
        $jumlah_nilai = array_sum($array);  
        $jumlah_elemen = count($array);     
        return $jumlah_nilai / $jumlah_elemen;  
    }

    // mencetak tabel data mahasiswa
    function print_mhs($array_mhs) {
        echo "<table>";
        echo '<tr style="background-color: #f2a6a6; color: black;">';
        echo '<th>Nama</th>';
        echo '<th>Nilai 1</th>';
        echo '<th>Nilai 2</th>';
        echo '<th>Nilai 3</th>';
        echo '<th>Rata-Rata</th>';
        echo '</tr>';
        
        // loop melalui array mahasiswa
        foreach ($array_mhs as $nama => $nilai) {
            $rata_rata = hitung_rata($nilai);  
            echo "<tr>";
            echo "<td>$nama</td>";
            echo "<td>{$nilai[0]}</td>";
            echo "<td>{$nilai[1]}</td>";
            echo "<td>{$nilai[2]}</td>";
            echo "<td>$rata_rata</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    print_mhs($array_mhs);
    ?>
</body>
</html>
