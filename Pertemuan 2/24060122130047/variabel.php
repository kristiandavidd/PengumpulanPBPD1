<!-- Nama: Tirza Aurellia Wijaya
    NIM: 24060122130047 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Assign nilai ke variabel
    $a = 15;
    echo 'Variabel a berisi : '.$a.'<br />';
    $a = 'Pemrograman Web dan Internet';
    echo 'Variabel a berisi : '.$a.'<br />';

    // Define a function
    function diskon(){
        $harga = 1000;  // Variabel Lokal
        $harga = 0.2 * $harga;
    }
    $harga = 2000;
    diskon();
    echo 'Harga = '.$harga.'<br />';  
    

    // Define a function
    function diskon1(){
        // Define harga as global variable
        global $price;
        // Multiply harga by 0.8
        $price = 0.8 * $price;
    }
    // Set Harga
    $price = 2000;
    // Call the function
    diskon1();
    // Display the price
    echo 'harga = '.$price.'<br />'; 
    
    
    //Define the function
    function diskon2(){
        //Define harga as a static variable
        static $Harga = 1000;
        $Harga = 0.8 * $Harga;

        echo 'harga = '.$Harga.'<br />';
    }
    //Set harga to 2000
    $Harga = 30;
    //Call the function twice
    diskon2();
    diskon2();
    //Display the harga
    echo 'harga diskon2 = '.$Harga.'<br />';



    echo htmlentities($_SERVER["PHP_SELF"]);
    // Mendefinisikan dan menggunakan konstanta
    define("PWI", "Pemrograman Web dan Internet ");
    echo '<br /> Hari ini sedang praktikum '.PWI.'<br />';

    // Menggunakan konstanta dengan fungsi constant()
    $constant_name = "PWI";
    echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />';

    // Menampilkan informasi file dan baris
    echo 'File yang sedang diproses "'. __FILE__ .'" pada baris "'. __LINE__ .'"<br />';

    ?>
</body>
</html>
