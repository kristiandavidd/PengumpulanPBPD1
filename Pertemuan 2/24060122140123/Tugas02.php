<!--
Nama    : Alya Safina
NIM     : 24060122140123
Tanggal: 10 September 2024 
-->

<html>
    <head>
        <title>Tugas Praktikum 02</title>
    </head>
    <body>
        <?php
        $array_mhs = array(
            'Abdul' => array(89, 90, 54),
            'Budi' => array(98, 65, 74),
            'Nina' => array(67, 56, 84), 
            'Sylus' => array(100, 100, 100)
        );

        function hitung_rata($array) {
            $total = array_sum($array);
            $jumlah_elemen = count($array);
            return $total / $jumlah_elemen;
        }

        echo '<table border="1">';
        echo '<tr>
                <td>Nama</td>
                <td>Nilai 1</td>
                <td>Nilai 2</td>
                <td>Nilai 3</td>
                <td>Rata-rata</td>
              </tr>';

        foreach ($array_mhs as $nama => $nilai) {
            $rata_rata = hitung_rata($nilai);  
            echo '<tr>';
            echo '<td>' . $nama . '</td>';
            echo '<td>' . $nilai[0] . '</td>';
            echo '<td>' . $nilai[1] . '</td>';
            echo '<td>' . $nilai[2] . '</td>';
            echo '<td>' . $rata_rata . '</td>';  
            echo '</tr>';
        }

        echo '</table>';
        ?>
    </body>
</html>
