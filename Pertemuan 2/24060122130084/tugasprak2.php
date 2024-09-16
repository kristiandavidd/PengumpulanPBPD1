<!-- Nama: Nashwan Adenaya -->
<!-- NIM: 24060122130084 -->
<!-- Tanggal Pembuatan: 6 September 2024 -->

<html>
<head>
<title>Tugas PBP 2/title>
</head>
<body style="margin: auto; display: flex;justify-content: center; align-items: center;">

<?php
  $array_mhs = array('Abdul' => array(89,90,54),
                      'Budi' => array(78,60,64),
                      'Nina' => array(67,56,84),
                      'Budi' => array(87,69,50),
                      'Budi' => array(98,65,74)
  );

  function hitung_rata($row){
    return array_sum($row) / count($row);
  }

  function print_mhs($array_mhs){
    echo "<table border='1'>";
    echo "<tr>
          <th>Nama</th>
          <th>Nilai 1</th>
          <th>Nilai 2</th>
          <th>Nilai 3</th>
          <th>Rata-Rata</th>
        </tr>";
  
    foreach ($array_mhs as $nama => $nilai) {
      $rataRata = hitung_rata($nilai); 
      echo "<tr>
            <td>$nama</td>
            <td>{$nilai[0]}</td>
            <td>{$nilai[1]}</td>
            <td>{$nilai[2]}</td>
            <td>" . $rataRata . "</td>
            </tr>";
    }
    echo "</table>";
  }
  
  // Pemanggilan fungsi 
  print_mhs($array_mhs);
  

  ?>


</body>
</html>