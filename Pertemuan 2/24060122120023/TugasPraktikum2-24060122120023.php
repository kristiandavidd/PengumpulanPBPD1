<!-- Nama: Happy Desita W. -->
<!-- NIM: 24060122120023 -->
<!-- Tanggal: 7 September 2024 -->


<html>
    <head>
        <title>Tugas 2</title>
    </head>
    <body>
        <?php
            $array_mhs = array('Abdul' => array(89, 90, 54),
                            'Budi' => array(78, 60, 64),
                            'Nina' => array(67, 56, 84),
                            'Budi' => array(87, 69, 50),
                            'Budi' => array(98, 65, 74)
            );

            // Fungsi menghitung rata-rata
            function hitung_rata($array){
                $ratarata = array_sum($array) / count($array);
                return $ratarata;                
            }

            // Fungsi untuk menampilkan nama, nilai, dan rata-rata nilai mahasiswa
            function print_mhs($array_mhs){
                echo '<table border="1">'; 
                
                echo '<tr> 
                    <td>Nama</td> 
                    <td>Nilai 1</td> 
                    <td>Nilai 2</td> 
                    <td>Nilai 3</td> 
                    <td>Rata-rata</td> 
                </tr>';

                foreach($array_mhs as $nama => $nilai){
                    echo '<tr>'; 
                    echo '<td>'.$nama.'</td>'; 
                    echo '<td>'.$nilai[0].'</td>'; 
                    echo '<td>'.$nilai[1].'</td>'; 
                    echo '<td>'.$nilai[2].'</td>';
                    echo '<td>'.hitung_rata($nilai).'</td>';
                    echo '</tr>'; 
                }

                echo '</table>'; 
            }

            print_mhs($array_mhs);
        ?>
    </body>
</html>