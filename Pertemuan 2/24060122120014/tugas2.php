<!-- 
    Nama File   : tugas2.php
    Deskripsi   : array php
    Pembuat     : Rachmad Rifa'i / 24060122120014
    Tanggal     : 09 September 2024
-->

<!DOCTYPE html>
<html>
    <head>
        <title>Tugas 2</title>
    </head>
    <body>
        <?php
            $array_mhs = array(
            'Abdul' => array(89,90,54),
            'Budi' => array(78,60,64),
            'Nina' => array(67,56,84),
            'Budi' => array(87,69,50),
            'Budi' => array(98,65,74)
            );

            function hitung_rata($array){
            $avg = 0;
            for($i= 0;$i<sizeof($array);$i++){
                $avg = $avg + $array[$i];
            }
            return $avg / sizeof($array);
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
                    $rata = hitung_rata($nilai);
                    echo "<tr>";
                    echo "<td>$nama</td>";
                    echo "<td>{$nilai[0]}</td>";
                    echo "<td>{$nilai[1]}</td>";
                    echo "<td>{$nilai[2]}</td>";
                    echo "<td>".$rata."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            print_mhs($array_mhs);
        ?>
    </body>
</html>