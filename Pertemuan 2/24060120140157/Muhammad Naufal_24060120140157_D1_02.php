<!--Nama : Muhammad Naufal -->
<!--NIM : 24060120140157 -->
<!--Tanggal Pengerjaan : 10-09-2024 -->

<!DOCTYPE html>
<html>
    <head>
        <title>
            Tugas Praktikum 2
        </title>
    </head>
    <body>
        <style> 
            .table_mhs{
                border: 1px solid black;
                text-align: left;
            }
        </style>
        <p>Muhammad Naufal - 24060120140157</p>
        <?php
            function hitung_rata($a,$b,$c){
                return ($a + $b + $c) / 3;
            }

            function print_mhs($array_mhs){
                echo '<table class="table_mhs">';
                echo '<tr>';
                echo '<th class="table_mhs"> Nama </th>';
                echo '<th class="table_mhs"> Nilai 1 </th>';
                echo '<th class="table_mhs"> Nilai 2</th>';
                echo '<th class="table_mhs"> Nilai 3</th>';
                echo '<th class="table_mhs"> Rata2 </th>';
                echo '</tr> </br>';

                foreach($array_mhs as $nama => $nilai){
                    $rata2 = hitung_rata($nilai[0], $nilai[1], $nilai[2]);

                    echo'<tr>';
                    echo'<th class="table_mhs"> '.$nama.'</th>';
                    echo'<th class="table_mhs"> '.$nilai[0].'</th>';
                    echo'<th class="table_mhs"> '.$nilai[1].'</th>';
                    echo'<th class="table_mhs"> '.$nilai[2].'</th>';
                    echo'<th class="table_mhs"> '.$rata2.'</th>';
                    echo'</tr> </br>';
                }
                echo '</table>';
            }
            
            $mahasiswa = array('Abdul' => array(89,90,54),
                                'Budi' => array(78,60,64),
                                'Nina' => array(67,56,84),
                                'Budi' => array(87,69,50),
                                'Budi' => array(98,65,74)
                            );
            
            print_mhs($mahasiswa);
        ?>
    </body>
</html>