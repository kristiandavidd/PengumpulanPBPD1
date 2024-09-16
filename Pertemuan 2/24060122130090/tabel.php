<?php
    function hitung_rata($array){
        $jumlah = 0;
        $banyak = 0;

        foreach ($array as $key => $value){
            $jumlah += $value;
            $banyak += 1;
        }

        return $jumlah / $banyak;
    }

    function print_mhs($array){
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Nilai 1</th><th>Nilai 2</th><th>Nilai 3</th><th>Rata-rata</th></tr>";

        foreach ($array as $name => $scores) {
            echo "<tr>";
            echo "<td>$name</td>";
            foreach ($scores as $score) {
                echo "<td>$score</td>";
            }
            $rata = hitung_rata($scores);
            echo "<td> $rata </td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    $array_mhs = array('Abdul' => array(89,90,54),
        'Budi' => array(78,60,64),
        'Nina' => array(67,56,84),
        'Budi' => array(87,69,50),
        'Budi' => array(98,65,74)
    );

    print_mhs($array_mhs);
?>