<!-- Nama   : Qun Alfadrian Setyowahyu Putro -->
<!-- NIM    : 24060122130072 -->
<!-- Tanggal: 17 September 2024 -->

<?php 
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nis = $nama = $jenisKelamin = $kelas = "";
    $nisErr = $namaErr = $jenisKelaminErr = $kelasErr = $ekstrakurikulerErr = "";
    $ekstrakurikuler;

    if (isset($_POST['submit'])) {
        $nama = test_input($_POST['nama']);
        $regexNama = "/^[a-zA-Z ]*$/";
        if (!empty($nama) && !preg_match($regexNama, $nama)) {
            $namaErr = "Nama hanya dapat berisi huruf dan spasi.";
        }

        $nis = test_input($_POST['nis']);

        if (empty($_POST["jenis_kelamin"])) {
            $jenisKelaminErr = "Jenis kelamin harus diisi.";
        } else {
            $jenisKelamin = test_input($_POST['jenis_kelamin']);
        }

        if (isset($_POST["kelas"])) {
            $kelas = test_input($_POST["kelas"]);
        }

        if (!empty($_POST["ekstrakurikuler"])) {
            $ekstrakurikuler = $_POST["ekstrakurikuler"];
        }
    }
 ?>