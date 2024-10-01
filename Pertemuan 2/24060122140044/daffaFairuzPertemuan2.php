<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabelMHS</title>
    <!-- 
    Nama : Daffa Fairuz Annizari 
    NIM  : 24060122140044
    Tanggal : 9 September 2024
    -->
</head>
<body>
    <?php
    $array_mhs = array('Abdul' => array(89,90,54),
        'Budi' => array(78,60,64),
        'Nina' => array(67,56,84),
        'Budi' => array(87,69,50),
        'Budi' => array(98,65,74)
    );

    function hitung_rata($array){
        $length = sizeof($array);
        $hasil = 0 ; 
        for ($i=0; $i < $length; $i++) { 
            $hasil = $hasil + $array[$i];
        }
        $hasil = $hasil/$length;
        return $hasil;
    }
    function print_mhs($array_mhs){
        echo("<table border='1'>");
        echo "<tr>
        <td>Nama</td>
        <td>Nilai 1</td>
        <td>Nilai 2</td>
        <td>Nilai 3</td>
        <td>Rata2</td>
        </tr>";
        foreach($array_mhs as $nama => $nilai){
            $rata = hitung_rata([$nilai[0], $nilai[1], $nilai[2]]);
            echo "<tr>
            <td>$nama</td>
            <td>$nilai[0]</td>
            <td>$nilai[1]</td>
            <td>$nilai[2]</td>
            <td>$rata</td>
            </tr>";
        }
    }
    print_mhs($array_mhs);   
    ?>
</body>
</html>