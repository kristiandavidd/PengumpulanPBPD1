<!-- Nama: Tirza Aurellia Wijaya
    NIM: 24060122130047 -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>24060122130047_Tirza Aurellia</title>
</head>
<body>
    <?php

    function hitung_rata($array){
        $jumlah = 0;
        for ($i=0; $i < count($array); $i++) { 
            $jumlah += $array[$i];
        }
        return $jumlah/count($array);
    }

    echo '<table border = "1">';
    echo '<tr>
            <td>Nama</td>
            <td>Nilai 1</td>
            <td>Nilai 2</td>
            <td>Nilai 3</td>
            <td>Rata-Rata</td>
    </tr>';
    function print_mhs($array_mhs){
        foreach($array_mhs as $nama => $nilai){
            echo '<tr>';
            echo '<td>'.$nama.'</td>';
            echo '<td>'.$nilai[0].'</td>';
            echo '<td>'.$nilai[1].'</td>';
            echo '<td>'.$nilai[2].'</td>';
            $Rata2 = hitung_rata($nilai);
            echo '<td>'.$Rata2.'</td>';
            echo '</tr>';
        }
    }

    $array_mhs = array(
        'Abdul' => array(89, 90, 54),
        'Budi' => array(78, 60, 64),
        'Nina' => array(67, 56, 84),
        'Sam' => array(87, 69, 50),
        'elijah' => array(98, 65, 74)
    );
    print_mhs($array_mhs);
    echo '</table>';


    ?>
</body>