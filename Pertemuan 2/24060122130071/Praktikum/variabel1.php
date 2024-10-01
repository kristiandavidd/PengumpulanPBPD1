<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
 <!-- Tanggal  Pengerjaan : 4 September 2024-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variabel</title>
</head>
<body>
    <h1>Belajar Variabel uyy</h1>
    <p>Nama : Muthia Zhafira Sahnah</p>
    <p>NIM : 2460122130071</p>
    <?php
    //assign nilai ke variabel
    $a = 15;
    echo 'Variabel a berisi : '.$a.'<br />';
    $a = 'Pemrograman Web dan Internet';
    echo 'Variabel a berisi : '.$a.'<br />';

    // Define a function  (Variabel Lokal)
    function diskon( ){
        $harga = 1000;
        $harga = 0.2 * $harga;
        }
        $harga = 2000;
        diskon();
        echo 'harga = '.$harga.'<br />';

    // Define a function (Variabel Global)
    function diskon1( ){
        // Define harga as a global variable
        global $harga;
        // Multiple harga by 0.8
        $harga = 0.8 * $harga;
        }
        // Set harga
        $harga = 2000;
        // Call the function
        diskon1( );
        // Display the age
        echo 'harga = '.$harga.'<br />';

    // Define the function (Variabel  Static)
    function diskon2( ){
        // Define harga as a static variable
        static $harga = 1000;
        $harga = 0.8 * $harga;
        echo 'harga = '.$harga.'<br />';
        }
        // Set harga to 2000
        $harga = 30;
        // Call the function twice
        diskon2();
        diskon2();
        // Display the harga
        echo 'harga = '.$harga.'<br />';

    //Variabel superglobal  gatau maksudnya gimana 
    echo htmlentities($_SERVER["PHP_SELF"]);
    echo'<br />';
    //Konstantagatau maksudnya gimana tanyain aja ke asprak 
    define("PWI", "Permograman Web dan Internet ");
    echo 'Hari ini sedang praktikum '.PWI.'<br />';
    $constant_name = "PWI";
    echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />';
    //konstanta bawaan PHP
    echo 'File yang sedang diproses "'. __FILE__ .' pada baris "'.
    __LINE__ .'"<br />';
    ?>
</body>
</html>