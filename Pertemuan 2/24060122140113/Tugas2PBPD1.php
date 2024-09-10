<!-- // Nama pembuat : Bima Aditya Aryono
            // NIM            : 24060122140113
            // Tanggal dibuat : Senin , 09-09-2024
            // Deskripsi kode : Membuat tabel dan mencari rata rata  -->
<html>
    <head>
        <title>Tugas Praktikum 2 PBP</title>
    </head>
    <body>
        <?php
            
            // data mahasiswaaa
            $array_mhs = array(
                'Abdul' => array(89, 90, 54),
                'Budi' => array(78, 60, 64),
                'Nina' => array(67, 56, 84),
                'Budi' => array(87, 69, 50),
                'Budi' => array(98, 65, 74),
                'Farrel Ardana' => array(100,100,20)
            );

            // Fungsi untuk menghitung rata-rata
            function hitung_rata($array) {
                $sum = 0;
                $count = 0;

                foreach($array as $nilai){
                    $sum += $nilai;
                    $count++;
                }
                return $sum / $count;
            }

            // Fungsi untuk menampilkan data mahasiswa
            function print_mhs($array_mhs) {
                echo "<table border='2' cellpadding='10' cellspacing='0'>";
                echo "<tr>
                        <th>Nama Mahasiswa</th>
                        <th>Nilai 1</th>
                        <th>Nilai 2</th>
                        <th>Nilai 3</th>
                        <th>Rata-Rata</th>
                    </tr>";
                
                foreach ($array_mhs as $nama => $nilai) {
                    echo "<tr>";
                    echo "<td>$nama</td>"; 
                    echo "<td>{$nilai[0]}</td>"; 
                    echo "<td>{$nilai[1]}</td>"; 
                    echo "<td>{$nilai[2]}</td>"; 
                    $rata_rata = hitung_rata($nilai); 
                    echo "<td>" . ($rata_rata) . "</td>"; 
                    echo "</tr>";
                }

                echo "</table>";
            }

            echo "Nama Pembuat   : Bima Aditya Aryono <br />";
            echo "NIM            : 24060122140113 <br />";
            echo "Tanggal dibuat : Senin, 09-09-2024<br />";
            echo "Deskripsi kode : Membuat tabel dan mencari rata rata <br />";
            print_mhs($array_mhs);
        ?>
    </body>
</html>
