<!--
Nama    : Alya Safina
NIM     : 24060122140123
Tanggal: 10 September 2024 
-->

<html>
    <head>
        <title>Fungsi.php</title>
    </head>
    <body>
        <?php
            // 3.5. Function
            //contoh fungsi yang tidak mengembalikan nilai (disebut juga prosedur)
            function print_mhs($nama,$nim,$prodi){
                echo 'Nama: '.$nama.'<br />';
                echo 'NIM: '.$nim.'<br />';
                echo 'Prodi: '.$prodi.'<br />';
                }
                print_mhs('Alfa','123456123','Ilmu Komputer/ Informatika');
            
            //menghitung harga setelah diskon
            //parameter input: harga dan diskon
            function hitung_diskon($harga,$diskon){
                $harga = $harga - ($harga*$diskon/100);
                return $harga;
                }
                //contoh pemanggilan fungsi
                $harga = 10000;
                $diskon = 20;
                $harga_diskon = hitung_diskon($harga,$diskon);
                echo 'Harga sebelum diskon = '.$harga.'<br />';
                echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
                
            //menghitung harga setelah diskon
            // parameter input: harga dan diskon (nilai default = 10)
            function hitung_diskon2($harga, $diskon = 10) {
                // Menghitung harga setelah diskon
                $harga = $harga - ($harga * $diskon / 100);
                return $harga;
            }
            // Contoh pemanggilan fungsi
            $harga = 10000; // Harga awal
            $harga_diskon = hitung_diskon2($harga); 
            echo 'Harga sebelum diskon = '.$harga.'<br />';
            echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
            
            //menghitung harga setelah diskon
            //harga sebagai parameter input dan output
            function hitung_diskon3(&$harga,$diskon){
                $harga = $harga - ($harga*$diskon/100);
                return $harga;
            }
            //contoh pemanggilan fungsi
            $harga = 10000;
            $diskon = 20;
            echo 'Harga sebelum diskon = '.$harga.'<br />';
            hitung_diskon3($harga,$diskon);
            echo 'Harga setelah diskon = '.$harga.'<br />';
            
            function faktorial($n) {
                if($n == 0) {
                    return 1;
                }
                else {
                    return $n * faktorial($n-1);
                }
            }
            
            //assignment menggunakan fungsi array
            $bulan = array('jan' => 'Januari',
            'feb' => 'Februari',
            'mar' => 'Maret',
            'apr' => 'April',
            'mei' => 'Mei',
            'jun' => 'Juni',
            'jul' => 'Juli',
            'agu' => 'Agustus',
            'sep' => 'Sepetember',
            'okt' => 'Oktober',
            'nov' => 'November',
            'des' => 'Desember');
            foreach($bulan as $kode_bulan => $nama_bulan) {
            echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
            }

            
        ?>
    </body>
</html>