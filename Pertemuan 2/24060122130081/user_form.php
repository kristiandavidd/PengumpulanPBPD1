<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-check {
            margin-bottom: 10px;
        }
        .form-check-label {
            margin-left: 5px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .error {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 5px;
        }
        .form-check-input {
            margin-right: 10px;
        }
        #output {
            display: block;
        }
    </style>
</head>
<body>

<div id="form-registrasi" class="container">
    <form id="form-registrasi-form" method="POST" autocomplete="on" action="" onsubmit="return validate();" onreset="return reset()">
        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="text" class="form-control" id="nis" name="nis">
            <div id="error-nis" class="error"><?php if(isset($error_nis)) echo $error_nis;?></div>
        </div>

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if(isset($nama)) {echo $nama;}?>">
            <div id="error-nama" class="error"><?php if(isset($error_nama)) echo $error_nama;?></div>
        </div>

        <label>Jenis Kelamin:</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if(isset($jenis_kelamin) && $jenis_kelamin =="pria") {echo 'checked';}?>> 
            <label class="form-check-label">Pria</label>        
        </div>

        <div class="form-check">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if(isset($jenis_kelamin) && $jenis_kelamin =="wanita") {echo 'checked';}?>>
            <label class="form-check-label">Wanita</label>
        </div>
        <div id="error-jenis-kelamin" class="error"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>

        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select id="kelas" name="kelas" class="form-control">
                <option value="">Pilih Kelas</option>
                <option value="X" <?php if(isset($kelas) && $kelas =="X") {echo 'selected';}?>>X</option>
                <option value="XI" <?php if(isset($kelas) && $kelas =="XI") {echo 'selected';}?>>XI</option>
                <option value="XII" <?php if(isset($kelas) && $kelas =="XII") {echo 'selected';}?>>XII</option>
            </select>
            <div id="error-kelas" class="error"><?php if(isset($error_kelas)) echo $error_kelas;?></div>
        </div>

        <label>Ekstrakurikuler:</label>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Pramuka" <?php if(isset($minat) && in_array('Pramuka', $minat)) {echo 'checked';}?>> 
            <label class="form-check-label">Pramuka</label>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Seni Tari" <?php if(isset($minat) && in_array('Seni Tari', $minat)) {echo 'checked';}?>>
            <label class="form-check-label">Seni Tari</label>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Sinematografi" <?php if(isset($minat) && in_array('Sinematografi', $minat)) {echo 'checked';}?>>
            <label class="form-check-label">Sinematografi</label>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="minat[]" value="Basket" <?php if(isset($minat) && in_array('Basket', $minat)) {echo 'checked';}?>>
            <label class="form-check-label">Basket</label>
        </div>
        <div id="error-minat" class="error"><?php if(isset($error_minat)) echo $error_minat;?></div>

        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        <button type="reset" class="btn btn-danger" id="reset-button">Reset</button>

        <div id="output">
            <?php
                if (empty($error_nis) && empty($error_nama) && empty($error_jenis_kelamin) && empty($error_minat)) {
                    echo "<h3>Your Input:</h3>";
                    echo 'NIS = ' . $_POST['nis'] . '<br />';
                    echo 'Nama = ' . $_POST['nama'] . '<br />';
                    echo 'Jenis Kelamin = ' . $_POST['jenis_kelamin'] . '<br />';
                    echo 'Kelas = ' . $_POST['kelas'] . '<br />';
                    if (!empty($_POST['minat'])) {
                        echo 'Ekstrakurikuler yang dipilih: ';
                        foreach ($_POST['minat'] as $minat) {
                            echo '<br />' . $minat;
                        }
                    }                
                }
            ?>
        </div>

        
    </form>
</div>

<div id="output">
    <?php
    if (isset($_POST["submit"])) {
        $error_nis = $error_nama = $error_jenis_kelamin = $error_minat = '';

        // Validasi
        if (empty($_POST['nis'])) {
            $error_nis = 'NIS harus diisi';
        }
        elseif(!preg_match('/^\d{10}$/', $_POST['nis'])){
            $error_nis = 'harus berupa 10 digit angka.';
        }
        if (empty($_POST['nama'])) {
            $error_nama = 'Nama harus diisi';
        }
        elseif(!preg_match('/^[a-zA-Z\s]+$/', $_POST['nama'])){
            $error_nama = 'Nama hanya boleh berisi huruf dan spasi.';
        }
        if (empty($_POST['jenis_kelamin'])) {
            $error_jenis_kelamin = 'Jenis kelamin harus diisi.';
        }
        if (empty($_POST['kelas'])) {
            $error_kelas = 'Kelas harus diisi.';
        }
        if (empty($_POST['minat']) || (count($_POST['minat']) > 3 && ($_POST['kelas'] == 'X' || $_POST['kelas'] == 'XI'))) {
            $error_minat = 'Minimal peminatan yang dipilih adalah 1 dan maksimal 3 untuk kelas X dan XI.';
        }
    }
    ?>
</div>

<script>
    document.getElementById('kelas').addEventListener('change', function() {
        var kelasSelected = this.value;
        var minatCheckboxes = document.querySelectorAll('input[name="minat[]"]');

        if (kelasSelected === 'XII') {
            minatCheckboxes.forEach(function(checkbox) {
                checkbox.disabled = true;
            });
        } else {
            minatCheckboxes.forEach(function(checkbox) {
                checkbox.disabled = false;
            });
        }
    });

    document.getElementById('form-registrasi').addEventListener('submit', function(event) {
        // Ambil elemen untuk error message
        const errorNis = document.getElementById('error-nis');
        const errorNama = document.getElementById('error-nama');
        const errorJenisKelamin = document.getElementById('error-jenis-kelamin');
        const errorKelas = document.getElementById('error-kelas');
        const errorMinat = document.getElementById('error-minat');

        // Reset error message
        errorNis.textContent = '';
        errorNama.textContent = '';
        errorJenisKelamin.textContent = '';
        errorKelas.textContent = '';
        errorMinat.textContent = '';

        // Ambil nilai input
        const nis = document.getElementById('nis').value.trim();
        const nama = document.getElementById('nama').value.trim();
        const jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked');
        const kelas = document.getElementById('kelas').value;
        const minat = Array.from(document.querySelectorAll('input[name="minat[]"]:checked')).map(cb => cb.value);

        let error = false;

        // Validasi NIS
        if (!nis) {
            errorNis.textContent = 'NIS harus diisi';
            error = true;
        } else if (!/^[0-9]{10}$/.test(nis)) {
            errorNis.textContent = 'NIS hanya dapat berisi angka dengan minimal 10 digit';
            error = true;
        }

        // Validasi Nama
        if (!nama) {
            errorNama.textContent = 'Nama harus diisi';
            error = true;
        } else if (!/^[a-zA-Z\s]*$/.test(nama)) {
            errorNama.textContent = 'Nama hanya dapat berisi huruf dan spasi';
            error = true;
        }

        // Validasi Jenis Kelamin
        if (!jenisKelamin) {
            errorJenisKelamin.textContent = 'Jenis kelamin harus diisi';
            error = true;
        }

        // Validasi Kelas
        if (!kelas) {
            errorKelas.textContent = 'Kelas harus diisi';
            error = true;
        }

        // Validasi Minat
        if (kelas === 'X' || kelas === 'XI') {
            if (minat.length === 0) {
                errorMinat.textContent = 'Minimal peminatan yang dipilih adalah 1';
                error = true;
            } else if (minat.length > 3) {
                errorMinat.textContent = 'Maksimal peminatan yang dipilih adalah 3';
                error = true;
            }
        }

        if (error) {
            event.preventDefault();
        } else {
            this.submit(); 
        }
    });

    function reset() {
        document.getElementById('reset-button').addEventListener('click', function() {
            document.getElementById('output').style.display = 'none'; 
        });
    }
    
</script>

</body>
</html>
