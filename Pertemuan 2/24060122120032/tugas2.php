<!-- NAma: Sarah Teguh Kinanti Situmeang
     NIM: 24060122120032
     LAB D1 PBP -->

     <html>
    <head>
        <title>Nilai Mahasiswa</title>
    </head>
    <body>
        <?php    
        function hitung_rata($array){
            $total = array_sum($array);
            $count = count($array);
            return $total/$count;
        }

        function print_mhs($array_mhs){
            echo '<table border="1">';
            echo '<tr>
                    <td>Nama</td>
                    <td>Nilai 1</td>
                    <td>Nilai 2</td>
                    <td>Nilai 3</td>
                    <td>Rata-rata</td>
                </tr>';

            $keys = array_keys($array_mhs);
            
            for ($i = 0; $i < count($keys); $i++){
                $nama = $keys[$i];
                $nilai = $array_mhs[$nama];

                $nilai1 = $nilai[0];
                $nilai2 = $nilai[1];
                $nilai3 = $nilai[2];
                $rata_rata = hitung_rata($nilai);

                echo "<tr>
                        <td>$nama</td>
                        <td>$nilai1</td>
                        <td>$nilai2</td>
                        <td>$nilai3</td>
                        <td>$rata_rata</td>
                    </tr>";
            }
            echo'</table>';
        }

        $array_mhs = array('Abdul' => array(89,90,54),
                            'Budi' => array(78,60,64),
                            'Nina' => array(67,56,84));
        
        print_mhs($array_mhs);

        ?>
    </body>
</html>