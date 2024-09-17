<!-- 
    Nama File   : welcome.php
    Deskripsi   : modul praktikum pbp
    Pembuat     : Rachmad Rifa'i / 24060122120014
    Tanggal     : 04 September 2024
-->

<!DOCTYPE html>
<html>
<head>
    <title>Hello World</title>
</head>
<body> 
    <?php
        echo "<h2>Selamat Datang di Praktikum PWI</h2><br />";
        echo "Hari ini praktikum : \"Sintaks Dasar PHP\"<br />";

        // //assign nilai ke variabel
        // $a = 15;
        // echo 'Variabel a berisi : '.$a.'<br />';
        // $a = 'Pemrograman Web dan Internet';
        // echo 'Variabel a berisi : '.$a.'<br />';
    

        // // Define a function
        // function diskon( ){
        //     $harga = 1000;
        //     $harga = 0.2 * $harga;
        // }
        // $harga = 2000;
        // diskon();
        // echo 'harga = '.$harga.'<br />';


        // // Define a function
        // function diskon1( ){
        //     // Define harga as a global variable
        //     global $harga;
        //     // Multiple harga by 0.8
        //     $harga = 0.8 * $harga;
        // }
        // // Set harga
        // $harga = 2000;
        // // Call the function
        // diskon1( );
        // // Display the age
        // echo 'harga = '.$harga.'<br />'; 
        
        
        // // Define the function
        // function diskon2(){
        //     // Define harga as a static variable
        //     static $harga = 1000;
        //     $harga = 0.8 * $harga;
        //     echo 'harga = '.$harga.'<br />';
        // }
        // // Set harga to 2000
        // $harga = 30;
        // // Call the function twice
        // diskon2();
        // diskon2();
        // // Display the harga
        // echo 'harga = '.$harga.'<br />';
    
        
        // //variabel super global
        // echo htmlentities($_SERVER["PHP_SELF"]);
    
        
        // //konstanta
        // define("PWI", "Permograman Web dan Internet ");
        // echo 'Hari ini sedang praktikum '.PWI.'<br />';
        // $constant_name = "PWI";
        // echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />';
        // //konstanta bawaan PHP
        // echo 'File yang sedang diproses "'. __FILE__ .' pada baris "'.__LINE__ .'"<br />';


        // //single if else
        // $lulus = TRUE;
        // if ($lulus) {
        //     echo 'Selamat Anda Lulus. <br/>';
        // } else{
        //     echo 'Maaf, Anda gagal. Silakan mencoba lagi. <br />';
        // }

        // //multiple if else
        // $nilai = 60;
        // if ($nilai >= 80 && $nilai <= 100){
        //     echo 'Nilai : A <br />';
        // } elseif ($nilai >= 60 && $nilai < 80){
        //     echo 'Nilai : B <br />';
        // } elseif ($nilai >= 40 && $nilai < 60){
        //     echo 'Nilai : C <br />';
        // } elseif ($nilai >= 20 && $nilai < 40){
        //     echo 'Nilai : D <br />';
        // } elseif ($nilai >= 0 && $nilai < 20){
        //     echo 'Nilai : E <br />';
        // } else{
        //     echo 'Invalid nilai <br />';
        // }

        // //switch
        // $nilai = 'AB';
        // switch ($nilai) {
        //     case "A":
        //         echo "Sangat Baik. <br />";
        //         break;
        //     case "B":
        //         echo "Baik. <br />";
        //         break;
        //     case "C":
        //         echo "Cukup. <br />";
        //         break;
        //     case "D":
        //         echo "Kurang. <br />";
        //         break;
        //     case "E":
        //         echo "Tidak Lulus. <br />";
        //         break;
        //     default:
        //         echo "Invalid nilai! <br />";
        //         break;
        // }



        // //looping
        // $harga = 1000;
        // echo '<table border="1">';
        // echo '<tr>
        //         <td>No</td>
        //         <td>Diskon</td>
        //         <td>Harga Setelah Diskon</td>
        //     </tr>';
        
        // for ($i=1;$i<=10;$i++){
        //     echo '<tr>';
        //     echo '<td>'.$i.'</td>';
        //     $diskon = $i * 0.1;
        //     echo '<td>'.($diskon*100).' % </td>';
        //     $harga_diskon = $harga - ($harga * $diskon);
        //     echo '<td>'.$harga_diskon.'</td>';
        //     echo '</tr>';
        // }
        // echo '</table>';



        // //function
        // //contoh fungsi yang tidak mengembalikan nilai (disebut juga prosedur)
        // function print_mhs($nama,$nim,$prodi){
        //     echo 'Nama: '.$nama.'<br />';
        //     echo 'NIM: '.$nim.'<br />';
        //     echo 'Prodi: '.$prodi.'<br />';
        // }
        // print_mhs('Alfa','123456123','Ilmu Komputer/ Informatika');


        // //menghitung harga setelah diskon
        // //parameter input: harga dan diskon
        // function hitung_diskon($harga,$diskon){
        //     $harga = $harga - ($harga*$diskon/100);
        //     return $harga;
        // }
        // //contoh pemanggilan fungsi
        // $harga = 10000;
        // $diskon = 20;
        // $harga_diskon = hitung_diskon($harga,$diskon);
        // echo 'Harga sebelum diskon = '.$harga.'<br />';
        // echo 'Harga setelah diskon = '.$harga_diskon.'<br />';


        // //menghitung harga setelah diskon
        // //parameter input: harga dan diskon (nilai default=10)
        // function hitung_diskon2($harga,$diskon=10){
        //     $harga = $harga - ($harga*$diskon/100);
        //     return $harga;
        // }
        // //contoh pemanggilan fungsi
        // $harga = 10000;
        // $harga_diskon = hitung_diskon2($harga);
        // echo 'Harga sebelum diskon = '.$harga.'<br />';
        // echo 'Harga setelah diskon = '.$harga_diskon.'<br />';


        // //menghitung harga setelah diskon
        // //harga sebagai parameter input dan output
        // function hitung_diskon3(&$harga,$diskon){
        //     $harga = $harga - ($harga*$diskon/100);
        //     return $harga;
        // }
        // //contoh pemanggilan fungsi
        // $harga = 10000;
        // $diskon = 20;
        // echo 'Harga sebelum diskon = '.$harga.'<br />';
        // hitung_diskon3($harga,$diskon);
        // echo 'Harga setelah diskon = '.$harga.'<br />';

        // //rekursif
        // function faktorial($n) {
        //     if($n == 0){
        //         return 1;
        //     } else{
        //         return $n * faktorial($n-1);
        //     }
        // }

        // require_once("fungsi.php");
        // //pemanggilan fungsi hitung_diskon
        // $harga = 10000;
        // $diskon = 20;
        // $harga_diskon = hitung_diskon($harga,$diskon);
        // echo 'Harga sebelum diskon = '.$harga.'<br />';
        // echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
        // //pemanggilan fungsi faktorial
        // print(faktorial(4));


        // //ARRAY
        // //numeric array
        // //assignment melalui array identifier
        // for ($i=0;$i<10;$i++){
        //     $diskon[] = $i * 5;
        // }
        
        // //assignment menggunakan fungsi array
        // //$diskon = array(0,10,20,30,40,50,60,70,80,90);
        // //cek apakah sebuah variabel bertipe array
        // if (is_array($diskon))
        //     echo 'Array';
        // else
        //     echo 'Not Array';
        // //menampilkan isi array
        // $n = sizeof($diskon);
        // for($i=0;$i<=($n-1);$i++){
        //     echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].' % <br />';
        // }

        // //assosiative array
        // //assignment menggunakan fungsi array
        // $bulan = array('jan' => 'Januari',
        //             'feb' => 'Februari',
        //             'mar' => 'Maret',
        //             'apr' => 'April',
        //             'mei' => 'Mei',
        //             'jun' => 'Juni',
        //             'jul' => 'Juli',
        //             'agu' => 'Agustus',
        //             'sep' => 'Sepetember',
        //             'okt' => 'Oktober',
        //             'nov' => 'November',
        //             'des' => 'Desember');

        // foreach($bulan as $kode_bulan => $nama_bulan){
        //     echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />';
        // } 

    ?>
</body>
</html>