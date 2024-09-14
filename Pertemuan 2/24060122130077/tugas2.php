<!--
Nama                : Fendi Ardianto
NIM                 : 24060122130077
Lab                 : PBP D1 
Tanggal Pengerjaan  : 6 September 2024
-->

<html>
    <head>
        <title>Print Mhs</title>
    </head>

    <body>
        <?php
            // Fungsi
            function hitung_rata($array){
                $sizeArray = sizeof($array);
                $total = 0;
                for($i = 0; $i < $sizeArray; $i++){
                    $total += $array[$i];
                }
                return $total / $sizeArray;
            }

            function print_mhs($array_mhs){
                echo '<table border="1">';
                echo '<tr>
                <td>Nama</td>
                <td>Nilai 1</td>
                <td>Nilai 2</td>
                <td>Nilai 3</td>
                <td>Rata2</td>
                </tr>';
                foreach($array_mhs as $nama => $array_nilai){
                    $n = sizeof($array_nilai);
                    echo '<tr>';
                    echo '<td>'.$nama.'</td>';
                    for($i = 0; $i < $n; $i++){
                        echo '<td>'.$array_nilai[$i].'</td>';
                    }
                    echo '<td>'.hitung_rata($array_nilai).'</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }

            //Realisasi
            $array_mhs = array(
                'Abdul' => array(89,90,54),
                'Budi'  => array(78,60,64),
                'Nina'  => array(67,56,84),
                'Budi'  => array(87,69,50),
                'Budi'  => array(98,65,74)
            ); 

            print_mhs($array_mhs);
        ?>
    </body>
</html>