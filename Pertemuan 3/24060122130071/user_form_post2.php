<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 16 September 2024-->
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Form Pengguna</title>
        <style>
            .error {
                color: red;
                margin-top: 5px;
            }
        </style>
</head>
<body>
    <?php
        $error_nama = $error_email = $error_alamat = $error_jenis_kelamin = $error_kota = $error_minat = "";
        $nama = $email = $alamat = $jenis_kelamin = $kota = $minat = [];

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // validasi nama
            if (empty($_POST['nama'])) {
                $error_nama = "Nama harus diisi";
            } else {
                $nama = test_input($_POST['nama']);
                if (!preg_match("/^[a-zA-Z-' ]*$/", $nama)) {
                    $error_nama = "Nama hanya dapat berisi huruf dan spasi";
                }
            }

            // validasi email
            if (empty($_POST['email'])) {
                $error_email = "Email harus diisi";
            } else {
                $email = test_input($_POST['email']);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error_email = "Format email tidak benar";
                }
            }

            // validasi alamat
            if (empty($_POST['alamat'])) {
                $error_alamat = "Alamat harus diisi";
            } else {
                $alamat = test_input($_POST['alamat']);
            }

            // validasi jenis kelamin
            if (empty($_POST['jenis_kelamin'])) {
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            } else {
                $jenis_kelamin = $_POST['jenis_kelamin'];
            }

            // validasi kota
            if (empty($_POST['kota'])) {
                $error_kota = "Kota harus diisi";
            } else {
                $kota = $_POST['kota'];
            }

            // validasi minat
            if (empty($_POST['minat'])) {
                $error_minat = "Peminatan harus dipilih";
            } else {
                $minat = $_POST['minat'];
            }

            // Jika tidak ada error, tampilkan hasil input
            if (empty($error_nama) && empty($error_email) && empty($error_alamat) && 
                empty($error_jenis_kelamin) && empty($error_kota) && empty($error_minat)) {
                echo "<h3>Your Input:</h3>";
                echo 'Nama = ' . $nama . '<br />';
                echo 'Email = ' . $email . '<br />';
                echo 'Alamat = ' . $alamat . '<br />';
                echo 'Kota = ' . $kota . '<br />';
                echo 'Jenis Kelamin = ' . $jenis_kelamin . '<br />';
                echo 'Minat: <br />';
                foreach($minat as $minat_item) {
                    echo '- ' . $minat_item . '<br />';
                }
                exit(); // Hentikan eksekusi setelah menampilkan hasil
            }
        }
    ?>
    <h1>Form Pendaftaran Course Bangun</h1>
    <h2>Hi, Selamat Datang🙋🏻‍♀️ </h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="on" method="POST">
        <div class="form-group"> 
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" 
            value="<?php echo $nama; ?>">
            <div class="error"><?php echo $error_nama; ?></div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" 
            value="<?php echo $email; ?>">
            <div class="error"><?php echo $error_email; ?></div>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat lengkap"><?php echo $alamat; ?></textarea>
            <div class="error"><?php echo $error_alamat; ?></div>
        </div>

        <div class="form-group">
            <label for="kota">Kota/Kabupaten:</label>
            <select id="kota" name="kota" class="form-control">
                <option value="">Pilih Kota</option>
                <option value="Semarang" <?php if($kota == "Semarang") echo "selected"; ?>>Semarang</option>
                <option value="Jakarta" <?php if($kota == "Jakarta") echo "selected"; ?>>Jakarta</option>
                <option value="Bandung" <?php if($kota == "Bandung") echo "selected"; ?>>Bandung</option>
                <option value="Surabaya" <?php if($kota == "Surabaya") echo "selected"; ?>>Surabaya</option>
            </select>
            <div class="error"><?php echo $error_kota; ?></div>
        </div>

        <div>Jenis Kelamin:</div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if($jenis_kelamin == "pria") echo "checked"; ?>>Pria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if($jenis_kelamin == "wanita") echo "checked"; ?>>Wanita
            </label>
        </div>
        <div class="error"><?php echo $error_jenis_kelamin; ?></div>
        <br>

        <label>Peminatan:</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="coding" <?php if(in_array("coding", $minat)) echo "checked"; ?>>Coding
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design" <?php if(in_array("ux_design", $minat)) echo "checked"; ?>>UX Design
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="data_science" <?php if(in_array("data_science", $minat)) echo "checked"; ?>>Data Science
            </label>
        </div>
        <div class="error"><?php echo $error_minat; ?></div>

        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>
</body>
</html>