<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
 <!-- Tanggal  Pengerjaan : 4 September 2024-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>
<body>
    <h1>BELAJAR FUNCTION</h1>
    <p>Nama : Muthia Zhafira Sahnah</p>
    <p>NIM : 2460122130071</p>
    <?php
    //contoh fungsi yang tidak mengembalikan nilai (disebut juga prosedur)
    function print_mhs($nama,$nim,$prodi){
    echo 'Nama: '.$nama.'<br />';
    echo 'NIM: '.$nim.'<br />';
    echo 'Prodi: '.$prodi.'<br />';
    echo '<br />';
    }
    print_mhs('Alfa','123456123','Ilmu Komputer/ Informatika');
    print_mhs('Muthia','123456123','Ilmu Komputer/ Informatika');
    print_mhs('Muthia','123456123','Ilmu Komputer/ Informatika');
    print_mhs('Muthia','123456123','Ilmu Komputer/ Informatika');
    print_mhs('Muthia','123456123','Ilmu Komputer/ Informatika');
    print_mhs('Muthia','123456123','Ilmu Komputer/ Informatika');
    print_mhs('Muthia','123456123','Ilmu Komputer/ Informatika');

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
    //parameter input: harga dan diskon (nilai default=10)
    function hitung_diskon2($harga,$diskon=10){
    $harga = $harga - ($harga*$diskon/100);
    return $harga;
    }
    //contoh pemanggilan fungsi
    $harga = 10000;
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
    ?>
</body>
</html>