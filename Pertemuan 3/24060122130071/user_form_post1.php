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
    <h1>Form Pendaftaran Course Bangun</h1>
    <h2>Hi, Selamat Datang🙋🏻‍♀️ </h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="on" method="POST">
        <div class="form-group"> 
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" 
            value="<?php if(isset($nama)) {echo htmlspecialchars($nama);} ?>">
            <div class="error"><?php if(isset($error_nama)) {echo $error_nama;} ?></div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" 
            value="<?php if(isset($email)) {echo htmlspecialchars($email);} ?>">
            <div class="error"><?php if(isset($error_email)) {echo $error_email;} ?></div>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat lengkap"><?php if(isset($alamat)) {echo htmlspecialchars($alamat);} ?></textarea>
            <div class="error"><?php if(isset($error_alamat)) {echo $error_alamat;} ?></div>
        </div>

        <div class="form-group">
            <label for="kota">Kota/Kabupaten:</label>
            <select id="kota" name="kota" class="form-control">
                <option value="">Pilih Kota</option>
                <option value="Semarang" <?php if(isset($kota) && $kota == "Semarang") echo "selected"; ?>>Semarang</option>
                <option value="Jakarta" <?php if(isset($kota) && $kota == "Jakarta") echo "selected"; ?>>Jakarta</option>
                <option value="Bandung" <?php if(isset($kota) && $kota == "Bandung") echo "selected"; ?>>Bandung</option>
                <option value="Surabaya" <?php if(isset($kota) && $kota == "Surabaya") echo "selected"; ?>>Surabaya</option>
            </select>
            <div class="error"><?php if(isset($error_kota)) {echo $error_kota;} ?></div>
        </div>

        <div>Jenis Kelamin:</div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if(isset($jenis_kelamin) && $jenis_kelamin == "pria") echo "checked"; ?>>Pria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if(isset($jenis_kelamin) && $jenis_kelamin == "wanita") echo "checked"; ?>>Wanita
            </label>
        </div>
        <div class="error"><?php if(isset($error_jenis_kelamin)) {echo $error_jenis_kelamin;} ?></div>
        <br>

        <label>Peminatan:</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="coding" <?php if(isset($minat) && in_array("coding", $minat)) echo "checked"; ?>>Coding
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design" <?php if(isset($minat) && in_array("ux_design", $minat)) echo "checked"; ?>>UX Design
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="data_science" <?php if(isset($minat) && in_array("data_science", $minat)) echo "checked"; ?>>Data Science
            </label>
        </div>
        <div class="error"><?php if(isset($error_minat)) {echo $error_minat;} ?></div>

        <!-- submit, reset dan button -->
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>

    <!-- PHP Logic -->
    <?php
        $error_nama = $error_email = $error_alamat = $error_jenis_kelamin = $error_kota = $error_minat = "";
        $nama = $email = $alamat = $jenis_kelamin = $kota = $minat = "";

        if (isset($_POST['submit'])) {
            // validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
            $nama = test_input($_POST['nama']);
            if (empty($nama)) {
                $error_nama = "Nama harus diisi";
            } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $nama)) {
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }
        
            // validasi email: tidak boleh kosong, format harus benar
            $email = test_input($_POST['email']);
            if (empty($email)) {
                $error_email = "Email harus diisi";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = "Format email tidak benar";
            }
        
            // validasi alamat: tidak boleh kosong
            $alamat = test_input($_POST['alamat']);
            if (empty($alamat)) {
                $error_alamat = "Alamat harus diisi";
            }
        
            // validasi jenis kelamin: tidak boleh kosong
            if (empty($_POST['jenis_kelamin'])) {
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            }
        
            // validasi kota: tidak boleh kosong
            $kota = $_POST['kota'];
            if (empty($kota)) {
                $error_kota = "Kota harus diisi";
            }
        
            // validasi minat: tidak boleh kosong
            $minat = isset($_POST['minat']) ? $_POST['minat'] : [];
            if (empty($minat)) {
                $error_minat = "Peminatan harus dipilih";
            }
        }

        if (isset($_POST["submit"])){
            echo "<h3>Your Input:</h3>";
            echo 'Nama = ' . $_POST['nama'] . '<br />';
            echo 'Email = ' . $_POST['email'] . '<br />';
            echo 'Kota = ' . $_POST['kota'] . '<br />';
            echo 'Jenis Kelamin = ' . (isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : 'Belum dipilih') . '<br />';
            
            if (!empty($_POST['minat'])) {
                echo 'Minat: <br />';
                $minat = $_POST['minat'];
                foreach($minat as $minat_item) {
                    echo '- ' . $minat_item . '<br />';
                }
            } else {
                echo 'Tidak ada minat yang dipilih.<br />';
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
</body>
</html>
