<html>

<head>
    <title>Hello World</title>
    <!-- 
        Nama : Alfonso Clement Sutantio
        NIM : 24060122130080
        Tanggal Pengerjaan : 07/09/2024
     -->
</head>

<body>
    <?php
    $array_mhs = array(
        'Abdul' => array(89, 90, 54),
        'Budi' => array(78, 60, 64),
        'Nina' => array(67, 56, 84),
        'Budi' => array(87, 69, 50),
        'Budi' => array(98, 65, 74)
    );
    function hitung_rata($array)
    {
        $total = 0;
        for ($i = 0; $i < sizeof($array); $i++) {
            $total += $array[$i];
        }
        return $total / sizeof($array);
    }

    function print_mhs($array_mhs)
    {
        echo '<table border="1">
        <tr>
        <td>Nama</td>
        <td>Nilai 1</td>
        <td>Nilai 2</td>
        <td>Nilai 3</td>
        <td>Nilai Rata2</td>
        </tr>';

        foreach ($array_mhs as $nama => $nilai) {
            $hasil = hitung_rata($nilai);

            $nilaiHtml = '';
            foreach ($nilai as $n) {
                $nilaiHtml .= "
                    <td>$n</td>
                ";
            }

            echo "<tr>
            <td>$nama</td>
            
            $nilaiHtml
            <td>$hasil</td>
            </tr>";
        }
        echo '</table>';
    }

    print_mhs($array_mhs)

        ?>
    <h2>Alfonso Clement Sutantio - 24060122130080</h2>
</body>

</html>