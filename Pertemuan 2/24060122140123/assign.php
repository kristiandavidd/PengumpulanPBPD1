<!--
Nama    : Alya Safina
NIM     : 24060122140123
Tanggal: 10 September 2024 
-->

<html>
<head>
    <title>Hello World</title>
</head>
<body>
    <?php
    // 3.2. Assign nilai ke variabel
    $a = 15;
    echo 'Variabel a berisi : '.$a.'<br />';
    $a = 'Pemrograman Web dan Internet';
    echo 'Variabel a berisi : '.$a.'<br />';

    // Contoh variabel lokal
    // Define a function
    function diskon() {
        $harga = 1000;
        $harga = 0.2 * $harga;
    }
    $harga = 2000; // < ini yang ditampilkan
    diskon();
    echo 'harga = '.$harga.'<br />';
    // Harga yang ditampilkan: 2000
    // Karena jika memanggil `$harga`, yang terpanggil adalah variabel global

    // Contoh variabel global
    // Define a function
    function diskon1() {
        // Define harga as a global variable
        global $harga;
        // Multiply harga by 0.8
        $harga = 0.8 * $harga;
    }
    // Set harga
    $harga = 2000;
    // Call the function
    diskon1();
    // Display the age
    echo 'harga = '.$harga.'<br />';
    // Harga yang ditampilkan: 1600
    // Karena pada function `diskon1`, telah mendeklarasikan variabel `$harga` sebagai global, sehingga  jika memanggil `$harga`, yang terpanggil adalah variabel global yang telah diubah pada fungsi `diskon1`

    // Contoh variabel statik
    // Define the function
    function diskon2() {
        // Define harga as a static variable
        static $harga = 1000;
        $harga = 0.8 * $harga;
        echo 'harga = '.$harga.'<br />';
    }
    // Set harga to 2000
    $harga = 30;
    // Call the function twice
    diskon2(); // Harga yang ditampilkan: 800, karena variabel static `$harga` bernilai 1000, yang kini dikenai fungsi `diskon` yang membuat `$harga` bernilai 0.8 * $harga
    diskon2(); // Harga yang ditampilkan: 800, karena variabel static `$harga` bernilai 800 setelah dikenai operasi `diskon` sebelumnya, yang kini dikenai fungsi `diskon` yang membuat `$harga` bernilai 0.8 * $harga
    // Display the harga
    echo 'harga = '.$harga.'<br />'; // Harga yang ditampilkan: 30, karena menampilkan fungsi global
    
    // Contoh variabel super global
    echo htmlentities($_SERVER["PHP_SELF"]);
    define("PWI", "Permograman Web dan Internet ");
    echo 'Hari ini sedang praktikum '.PWI.'<br />';
    // Konstanta
    $constant_name = "PWI";
    echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />';
    // Konstanta bawaan PHP
    echo 'File yang sedang diproses "'. __FILE__ .' pada baris "'. __LINE__ .'"<br />';

    ?>
</body>
</html>
