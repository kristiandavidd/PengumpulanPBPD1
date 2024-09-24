<!-- 
    Nama : Alfonso Clement Sutantio
    NIM : 24060122130080
    Tanggal pengerjaan : 12/09/2024
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Siswa</title>
    <style>
        form {
            width: auto;
            padding: 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            background-color: #f8f9fa; 
            padding: 20px 20px; 
            border-bottom: 1px solid #ddd; 
            border-top: 1px solid #ddd;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            margin-bottom: 20px;
        }

        .form-header h3 {
            margin: 0;
        }

        .form-group {
            padding: 20px;
            padding-top: 0px;
        }

        .form-selection {
            display: block;
            margin-left: -4px;
            margin-bottom: 5px;
        }

        .form-title1 {
            margin-bottom: 10px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
        
        .form-group2 {
            padding: 20px;
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .form-actions {
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: left;
        }

        .form-actions button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            margin-right: 10px;
            margin-left: 20px;
        }

        .submit-btn {
            background-color: #007bff;
            color: white;
        }

        .reset-btn {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body onload="toggleEkstrakurikuler()">
<?php
    // Variabel untuk menampilkan input setelah submit
    $display_nis = $display_nama = $display_jenis_kelamin = $display_kelas = '';
    $display_ekstrakurikuler = [];

    $error_nis = $error_nama = $error_jenis_kelamin = $error_kelas = $error_ekstrakurikuler = '';
    $nis = $nama = $jenis_kelamin = $kelas = '';
    $ekstrakurikuler = [];

    if (isset($_POST['submit'])) {
        // Validasi NIS
        $nis = test_input($_POST['nis']);
        if (empty($nis)) {
            $error_nis = 'NIS harus diisi';
        } elseif (!preg_match("/^[0-9]{10}$/", $nis)) {
            $error_nis = "NIS harus terdiri dari 10 karakter berisi angka 0-9";
        }

        // Validasi Nama
        $nama = test_input($_POST['nama']);
        if (empty($nama)) {
            $error_nama = 'Nama harus diisi';
        }

        // Validasi Jenis Kelamin
        $jenis_kelamin = isset($_POST['jenis_kelamin']) ? test_input($_POST['jenis_kelamin']) : '';
        if (empty($jenis_kelamin)) {
            $error_jenis_kelamin = "Jenis kelamin harus diisi";
        }

        // Validasi Kelas
        $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
        if (empty($kelas)) {
            $error_kelas = "Kelas harus diisi";
        }

        // Validasi Ekstrakurikuler
        if ($kelas === "10" || $kelas === "11") {
            $ekstrakurikuler = isset($_POST['ekstrakurikuler']) ? $_POST['ekstrakurikuler'] : [];
            if (empty($ekstrakurikuler)) {
                $error_ekstrakurikuler = "Minimal pilih 1 ekstrakurikuler";
            } elseif (count($ekstrakurikuler) > 3) {
                $error_ekstrakurikuler = "Maksimal pilih 3 ekstrakurikuler";
            }
        }

        // Jika tidak ada error, simpan data ke variabel untuk ditampilkan
        if (empty($error_nis) && empty($error_nama) && empty($error_jenis_kelamin) && empty($error_kelas) && empty($error_ekstrakurikuler)) {
            $display_nis = $nis;
            $display_nama = $nama;
            $display_jenis_kelamin = $jenis_kelamin;
            $display_kelas = $kelas;
            $display_ekstrakurikuler = $ekstrakurikuler;

            // Kosongkan variabel untuk input baru
            $nis = $nama = $jenis_kelamin = $kelas = '';
            $ekstrakurikuler = [];
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<form action="" method="post">
    <div class="form-header">
        <h3>Form Input Siswa</h3>
    </div>
    <div class="form-group">
        <div class="form-title1">
            <label for="nis">NIS:</label>
        </div>
        <input type="text" name="nis" id="nis" value="<?php echo htmlspecialchars($nis); ?>">
        <div class="error"><?php if(!empty($error_nis)) echo $error_nis; ?></div>
    </div>
    <div class="form-group">
        <div class="form-title1">
            <label for="nama">Nama:</label>
        </div>
        <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($nama); ?>">
        <div class="error"><?php if(!empty($error_nama)) echo $error_nama; ?></div>
    </div>
    <div class="form-group2">
        <div class="form-title1">
            <label>Jenis Kelamin:</label>
        </div>
        <label class="form-selection">
            <input type="radio" name="jenis_kelamin" value="pria" <?php if ($jenis_kelamin == "pria") echo "checked"; ?>>
            Pria
        </label>
        <label class="form-selection">
            <input type="radio" name="jenis_kelamin" value="wanita" <?php if ($jenis_kelamin == "wanita") echo "checked"; ?>>
            Wanita
        </label>
        <div class="error"><?php if(!empty($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
    </div>
    <div class="form-group">
        <label for="kelas">Kelas:</label>
        <select name="kelas" id="kelas" onchange="toggleEkstrakurikuler()">
            <option value="">Pilih Kelas</option>
            <option value="10" <?php if ($kelas == "10") echo "selected"; ?>>X</option>
            <option value="11" <?php if ($kelas == "11") echo "selected"; ?>>XI</option>
            <option value="12" <?php if ($kelas == "12") echo "selected"; ?>>XII</option>
        </select>
        <div class="error"><?php if(!empty($error_kelas)) echo $error_kelas; ?></div>
    </div>
    <div class="form-group2" id="ekstrakurikuler-group">
        <div class="form-title1">
            <label>Ekstrakurikuler:</label>
        </div>
        <label class="form-selection">
            <input type="checkbox" name="ekstrakurikuler[]" value="pramuka" <?php if (in_array("pramuka", $ekstrakurikuler)) echo "checked"; ?>>
            Pramuka
        </label>
        <label class="form-selection">
            <input type="checkbox" name="ekstrakurikuler[]" value="senitari" <?php if (in_array("senitari", $ekstrakurikuler)) echo "checked"; ?>>
            Seni Tari
        </label>
        <label class="form-selection">
            <input type="checkbox" name="ekstrakurikuler[]" value="sinematografi" <?php if (in_array("sinematografi", $ekstrakurikuler)) echo "checked"; ?>>
            Sinematografi
        </label>
        <label class="form-selection">
            <input type="checkbox" name="ekstrakurikuler[]" value="basket" <?php if (in_array("basket", $ekstrakurikuler)) echo "checked"; ?>>
            Basket
        </label>
        <div class="error"><?php if(!empty($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
    </div>
    <div class="form-actions">
        <button type="submit" name="submit" class="submit-btn" value="submit">Submit</button>
        <button type="reset" name="reset" class="reset-btn" onclick="window.location.href=''">Reset</button>
    </div>
</form>

<script>
    function toggleEkstrakurikuler() {
        var kelas = document.getElementById("kelas").value;
        var ekstrakurikulerGroup = document.getElementById("ekstrakurikuler-group");
        
        if (kelas === "10" || kelas === "11") {
            ekstrakurikulerGroup.style.display = "block";
        } else {
            ekstrakurikulerGroup.style.display = "none";
        }
    }
</script>

<?php
    // Tampilkan input setelah submit
    if (isset($_POST['submit']) && empty($error_nis) && empty($error_nama) && empty($error_jenis_kelamin) && empty($error_kelas) && empty($error_ekstrakurikuler)) {
        echo "<h3>Your Input:</h3>";
        echo 'NIS = ' . htmlspecialchars($display_nis) . '<br />';
        echo 'Nama = ' . htmlspecialchars($display_nama) . '<br />';
        echo 'Jenis Kelamin = ' . htmlspecialchars($display_jenis_kelamin) . '<br />';
        echo 'Kelas = ' . htmlspecialchars($display_kelas) . '<br />';

        if (!empty($display_ekstrakurikuler)) {
            echo "Ekstrakurikuler = " . implode(", ", $display_ekstrakurikuler) . "<br />";
        }
    }
?>
</body>
</html>
