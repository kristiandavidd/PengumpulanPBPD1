<?php
    function hitung_rata($array) {
        $sum = 0;
        foreach ($array as $nilai) {
            $sum += $nilai;
        }
        return $sum / count($array);
    }

    function print_mhs($array_mhs) {
        echo '<table>';
        echo '<tr><th>Nama</th>';
        $nilai = 'Nilai';
        $idx = 1;
        while ($idx <= 3) {
            echo '<th>',$nilai.$idx,'</th>';
            $idx++;
        }
        echo '<th>Rata2</th></tr>';
        foreach ($array_mhs as $mhs => $array_nilai) {
            echo '<tr>';
            echo '<td>',$mhs,'</td>';
            foreach ($array_nilai as $nilai) {
                echo '<td>',$nilai,'</td>';
            }
            echo '<td>',hitung_rata($array_nilai),'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
?>