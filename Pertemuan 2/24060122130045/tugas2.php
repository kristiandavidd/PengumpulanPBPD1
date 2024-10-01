<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <span>Nama     : Muhammad Naufal Rifqi Setiawan</span> </br>
    <span>Nim      : 24060122130045</span> </br>
    <span>Tanggal  : 10 September 2024</span> </br>
    <span>Deskripsi: Menghitung tabel rata rata</span> </br>

    <?php 
        function hitung_rata($array){
            $total = 0;
            $jumlah_elemen = 0;

            foreach ($array as $nilai){
                $total += $nilai;

                $jumlah_elemen++;
            }

            $rata2 = $total / $jumlah_elemen;

            return $rata2;
        }

        function print_mhs($array_mhs){
            echo "<table border='1'>";
            echo "<tr><th>Nama</th><th>Nilai 1</th><th>Nilai 2</th><th>Nilai 3</th><th>Rata2</th></tr>";

            foreach ($array_mhs as $nama => $nilai) {
                $rata2 = hitung_rata($nilai);
                echo "<tr>";
                echo "<td>$nama</td>";
                echo "<td>{$nilai[0]}</td>";
                echo "<td>{$nilai[1]}</td>";
                echo "<td>{$nilai[2]}</td>";
                echo "<td>$rata2</td>";
                echo "</tr>";
            }
        
            echo "</table>";
        }

        $array_mhs = array(
            'Abdul' => array(89, 90, 54),
            'Budi' => array(98, 65, 74),
            'Nina' => array(67, 56, 84)
        );

        print_mhs($array_mhs);
        
    ?>
</body>
</html>