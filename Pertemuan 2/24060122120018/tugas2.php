<!-- Nama : Muhammad Naufal Izzudin -->
<!-- Nim : 24060122120018 -->
<!-- Tanggal Pengerjaan : 7 September 2024 -->

<html>
	<head>
		<title>Hello World</title>
	</head>
	<body>
		<?php
		// Menampilkan teks PHP ke browser
		echo "<h2>Tugas Praktikum PBP Pertemuan II</h2>";
		
		// Array mahasiswa
		$array_mhs = array(
			'Abdul' => array(89, 90, 54),
			'Budi' => array(78, 60, 64),
			'Nina' => array(67, 56, 84),
			'Budi' => array(87, 69, 50),
			'Budi' => array(98, 65, 74)
		);
		
		// Fungsi untuk menghitung rata-rata
		function hitung_rata($array) {
			$total = 0;
			$jumlah_nilai = count($array);
			foreach ($array as $nilai) {
				$total += $nilai;
			}
			return $total / $jumlah_nilai;
		}

		// Fungsi untuk mencetak tabel mahasiswa
		function print_mhs($array_mhs) {
			echo '<table border="1">';
			echo '<tr>
				<td>Nama</td>
				<td>Nilai 1</td>
				<td>Nilai 2</td>
				<td>Nilai 3</td>
				<td>Rata2</td>
			</tr>';
			
			foreach ($array_mhs as $nama => $nilai) {
				$rata_rata = hitung_rata($nilai);
				echo '<tr>';
				echo '<td>' . $nama . '</td>';
				echo '<td>' . $nilai[0] . '</td>';
				echo '<td>' . $nilai[1] . '</td>';
				echo '<td>' . $nilai[2] . '</td>';
				echo '<td>' . number_format($rata_rata, 2) . '</td>';
				echo '</tr>';
			}
			echo '</table>';
		}

		// Memanggil fungsi untuk mencetak tabel
		print_mhs($array_mhs);
		
		?>
	</body>
</html>
