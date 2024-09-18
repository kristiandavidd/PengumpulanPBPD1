<!-- Nama      : Qun Alfadrian S. P. -->
<!-- NIM       : 24060122130072 -->
<!-- Tanggal   : 10 September 2024  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require 'process.php';
        
        $array_mhs = array(
            'Abdul' => array(89,90,54),
            'Budi' => array(78,60,64),
            'Nina' => array(67,56,84),
            'Budi' => array(87,69,50),
            'Budi' => array(98,65,74)
        );

        print_mhs($array_mhs);
    ?>
</body>
</html>