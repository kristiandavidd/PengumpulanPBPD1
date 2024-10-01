<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $array_mhs = [
            "Abdul" => [89, 90, 54],
            "Budi" => [98, 65, 74],
            "Nina" => [67, 56, 84]
        ];

        function hitung_rata($grades){
            $jumlah_element = 0;
            $avg = 0;

            foreach ($grades as $grade) {
                $avg += $grade;
                $jumlah_element++;
            }
            $avg = $avg/$jumlah_element;
            return $avg;
        }

        function print_mhs($array_mhs){
            echo "  <h3> Nama: Aldisar Gibran </h3>  
                    <h3> NIM: 24060122130081 </h3>
                    <h3> Tanggal Pengerjaan: 9-11-2024 </h3>
                    <h3> Lab: PBP D1 </h3>";
            
            echo "<table border='1' cellpadding='10' cellspacing='0'>";
            echo "  <tr> 
                        <th> Nama </th>
                        <th> Nilai 1 </th>
                        <th> Nilai 2 </th>
                        <th> Nilai 3 </th>
                        <th> Rata-rata </th>
                    <tr>";
            foreach ($array_mhs as $mhs => $grades) {
                echo "  <tr> 
                            <td>".$mhs."</td>
                            <td>".$grades[0]."</td>
                            <td>".$grades[1]."</td>
                            <td>".$grades[2]."</td>
                            <td>".hitung_rata($grades)."</td>
                        </tr>";
            }
            echo "</table>";
        }

        print_mhs($array_mhs);
    ?>
</body>
</html>