//Nama : Tara Tirzandina
//NIM : 240600122130060
//Deskripsi : menampilkan array mahasiswa dan fungsi untuk menghitung rata-rata yang akan ditampilkan dalam bentuk tabel

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas PWI1</title>
</head>
<body>
    <?php
    function hitung_rata($array){
        $total = array_sum($array);
        $jumlah = count($array);
        $rata = $total/$jumlah;
        return $rata;
    }

    function print_mhs($array_mhs) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Nama</th>
                <th>Nilai 1</th>
                <th>Nilai 2</th>
                <th>Nilai 3</th>
                <th>Rata-rata</th>
                </tr>";
        
        foreach ($array_mhs as $nama => $nilai) {
            // Mengambil nilai dari array
            $nilai1 = $nilai[0];
            $nilai2 = $nilai[1];
            $nilai3 = $nilai[2];
            
            // Hitung rata-rata menggunakan fungsi hitung_rata
            $rata2 = hitung_rata($nilai);
            
            // Tampilkan data dalam tabel
            echo "<tr>";
            echo "<td>$nama</td>";
            echo "<td>$nilai1</td>";
            echo "<td>$nilai2</td>";
            echo "<td>$nilai3</td>";
            echo "<td>" . number_format($rata2, 2) . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }

    $array_mhs = array(
    'Abdul' => array(89,90,54),
    'Budi' => array(78,60,64),
    'Nina' => array(67,56,84),
    'Budi' => array(87,69,50),
    'Budi' => array(98,65,74)
    );

    print_mhs($array_mhs);

    ?>
</body>
</html>