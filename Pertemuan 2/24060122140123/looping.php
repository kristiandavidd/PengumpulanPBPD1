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
    // 3.4. Looping
    // For loop
    $harga = 1000;
    echo '<table border="1">';
    echo '<tr>
            <td>No</td>
            <td>Diskon</td>
            <td>Harga Setelah Diskon</td>
          </tr>';
    for ($i=1; $i<=10; $i++) {
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        $diskon = $i * 0.1;
        echo '<td>'.($diskon*100).' % </td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>'.$harga_diskon.'</td>';
        echo '</tr>';
    }
    echo '</table>';

    // While loop
    $harga = 1000;
    $i = 1;
    echo '<table border="1">';
    echo '<tr>
            <td>No</td>
            <td>Diskon</td>
            <td>Harga Setelah Diskon</td>
          </tr>';
    while ($i <= 10) {
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        $diskon = $i * 0.1;
        echo '<td>'.($diskon * 100).' % </td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>'.$harga_diskon.'</td>';
        echo '</tr>';
        $i++;
    }
    echo '</table>';

    // Do-while loop
    $harga = 1000;
    $i = 1;
    echo '<table border="1">';
    echo '<tr>
            <td>No</td>
            <td>Diskon</td>
            <td>Harga Setelah Diskon</td>
          </tr>';
    do {
        echo '<tr>';
        echo '<td>'.$i.'</td>';
        $diskon = $i * 0.1;
        echo '<td>'.($diskon * 100).' % </td>';
        $harga_diskon = $harga - ($harga * $diskon);
        echo '<td>'.$harga_diskon.'</td>';
        echo '</tr>';
        $i++;
    } while ($i <= 10);
    echo '</table>';

    ?>
</body>
</html>
