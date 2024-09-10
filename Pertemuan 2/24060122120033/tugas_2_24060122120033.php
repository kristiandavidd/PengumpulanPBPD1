<!-- 
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pengerjaan  : Selasa, 10 September 2024
-->

<html>
    <head>
        <title>Tugas 2 Praktikum PBP</title>
    </head>
    <body>
        <?php
            // Fungsi untuk menghitung nilai rata-rata elemen array
            function hitung_rata($array) {
                $total = array_sum($array);
                $jumlah = count($array);
                return $total / $jumlah;
            }

            // Fungsi untuk menampilkan data mahasiswa yang ada pada array dalam bentuk tabel
            function print_mhs($array_mhs) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td>Nama</td>";
                echo "<td>Nilai 1</td>";
                echo "<td>Nilai 2</td>";
                echo "<td>Nilai 3</td>";
                echo "<td>Rata-Rata</td>";
                echo "</tr>";
                foreach ($array_mhs as $nama => $nilai) {
                    echo "<tr>";
                    echo "<td>" . $nama . "</td>";
                    echo "<td>" . $nilai[0] . "</td>";
                    echo "<td>" . $nilai[1] . "</td>";
                    echo "<td>" . $nilai[2] . "</td>";
                    $rata2 = hitung_rata($nilai);
                    echo "<td>" . $rata2 . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            /* Array mahasiswa dengan indeks berupa nama mahasiswa dan elemen 
               berupa array yang berisi kumpulan nilai untuk setiap mahasiswa
            */
            $array_mhs = array(
                'Abdul' => array(89, 90, 54),
                'Budi' => array(78, 60, 64),
                'Nina' => array(67, 56, 84),
                'Budi' => array(87, 69, 50),
                'Budi' => array(98, 65, 74)
            );

            // Memanggil fungsi print_mhs untuk menampilkan data mahasiswa
            print_mhs($array_mhs);
        ?>
    </body>
</html>