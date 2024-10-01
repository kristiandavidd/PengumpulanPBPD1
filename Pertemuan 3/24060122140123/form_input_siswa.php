<!-- 
 Nama               : Alya Safina
 NIM                : 24060122140123
 Tanggal pengerjaan : 17 September 2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form Post</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- Script JavaScript untuk memproses supaya jika Kelas 12, maka tidak ada tampilan ekstrakurikuler -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var kelasSelect = document.getElementById('kelas');
            var ekstrakurikulerGroup = document.getElementById('ekstrakurikuler-group');

            function displayEkskul() {
                var selectedKelas = kelasSelect.value;
                if (selectedKelas === 'X' || selectedKelas === 'XI') {
                    ekstrakurikulerGroup.style.display = 'block';
                } else {
                    ekstrakurikulerGroup.style.display = 'none';
                }
            }
            displayEkskul();
            kelasSelect.addEventListener('change', displayEkskul);
        });
    </script>
</head>
<body>

    <?php
    // Validasi isi data yang dimasukkan ke form
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $show_ekstrakurikuler = false;

    // Aturan validasi isian form
    if (isset($_POST["submit"])) {
        // Validasi NIS: Hanya boleh terdiri atas 10 karakter, dan hanya boleh berisi angka 0..9. 
        $nis = test_input($_POST['nis']);
        if (empty($nis)) {
            $error_nis = "NIS harus diisi";
        } elseif (strlen($nis) != 10 || !preg_match("/^[0-9]{10}$/", $nis)) {
            $error_nis = "NIS harus terdiri dari 10 karakter angka";
        }
        // Validasi nama: hanya boleh berisi huruf dan spasi
        $nama = test_input($_POST['nama']);
        if (empty($nama)) {
            $error_nama = "Nama harus diisi";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $error_nama = "Nama hanya dapat berisi huruf dan spasi";
        }
        // Validasi jenis kelamin: harus diisi
        if (!isset($_POST['jenis_kelamin'])) {
            $error_jenis_kelamin = "Jenis kelamin harus diisi";
        } else {
            $jenis_kelamin = test_input($_POST['jenis_kelamin']);
        }
        // Validasi kelas: harus diisi
        $kelas = test_input($_POST['kelas']);
        if (empty($kelas)) {
            $error_kelas = "Kelas harus diisi";
        }
        // Validasi ekstrakurikuler: Siswa wajib memilih kegiatan ekstrakurikuler yang diminati, minimal 1 maksimal 3. Jika kelas XII siswa tidak boleh mengikuti kegiatan ekstrakurikuler, sehingga program tidak perlu menampilkan kegiatan ekstrakurikuler
        if ($kelas == "X" || $kelas == "XI") {
            $show_ekstrakurikuler = true;
            $ekstrakurikuler = isset($_POST['ekstrakurikuler']) ? $_POST['ekstrakurikuler'] : [];
            if (empty($ekstrakurikuler)) {
                $error_ekstrakurikuler = "Ekstrakurikuler harus dipilih";
            } elseif (count($ekstrakurikuler) < 1 || count($ekstrakurikuler) > 3) {
                $error_ekstrakurikuler = "Pilih minimal 1 dan maksimal 3 ekstrakurikuler";
            }
        } elseif ($kelas == "XII") {
            $ekstrakurikuler = [];
            if (isset($_POST['ekstrakurikuler']) && !empty($_POST['ekstrakurikuler'])) {
                $error_ekstrakurikuler = "Siswa kelas XII tidak boleh memilih ekstrakurikuler";
            }
        }
    }
    ?>
<!-- Kolom input Form Siswa -->
    <div class="container">
        <br />
        <div class="card">
            <div class="card-header">Form Input Siswa</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nis">NIS:</label>
                        <input type="text" class="form-control" id="nis" name="nis" maxlength="10" value="<?php echo isset($_POST['nis']) ? $_POST['nis'] : ''; ?>">
                        <div class="text-danger"><?php if (isset($error_nis)) echo $error_nis; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>">
                        <div class="text-danger"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                    </div>
                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" name="jenis_kelamin" class="form-check-input" value="pria" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "pria") echo "checked"; ?>>
                            Pria
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" name="jenis_kelamin" class="form-check-input" value="wanita" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == "wanita") echo "checked"; ?>>
                            Wanita
                        </label>
                    </div>
                    <div class="text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                    <br>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <option value="X" <?php if (isset($_POST['kelas']) && $_POST['kelas'] == "X") echo 'selected="true"'; ?>>X</option>
                            <option value="XI" <?php if (isset($_POST['kelas']) && $_POST['kelas'] == "XI") echo 'selected="true"'; ?>>XI</option>
                            <option value="XII" <?php if (isset($_POST['kelas']) && $_POST['kelas'] == "XII") echo 'selected="true"'; ?>>XII</option>
                        </select>
                        <div class="text-danger"><?php if (isset($error_kelas)) echo $error_kelas; ?></div>
                    </div>

                    <div id="ekstrakurikuler-group" style="<?php echo ($show_ekstrakurikuler ? 'display: block;' : 'display: none;'); ?>">
                        <label>Ekstrakurikuler:</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="ekstrakurikuler[]" class="form-check-input" value="pramuka" <?php if (isset($_POST['ekstrakurikuler']) && in_array('pramuka', $_POST['ekstrakurikuler'])) echo "checked"; ?>>
                                Pramuka
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="ekstrakurikuler[]" class="form-check-input" value="seni_tari" <?php if (isset($_POST['ekstrakurikuler']) && in_array('seni_tari', $_POST['ekstrakurikuler'])) echo "checked"; ?>>
                                Seni Tari
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="ekstrakurikuler[]" class="form-check-input" value="sinematografi" <?php if (isset($_POST['ekstrakurikuler']) && in_array('sinematografi', $_POST['ekstrakurikuler'])) echo "checked"; ?>>
                                Sinematografi
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="ekstrakurikuler[]" class="form-check-input" value="basket" <?php if (isset($_POST['ekstrakurikuler']) && in_array('basket', $_POST['ekstrakurikuler'])) echo "checked"; ?>>
                                Basket
                            </label>
                        </div>
                        <div class="text-danger"><?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>

                <!-- Menggunakan metode POST untuk membaca dan menampilkan isian yang dimasukkan ke form -->
                <?php
                    if (isset($_POST["submit"]) && !isset($error_nis) && !isset($error_nama) && !isset($error_jenis_kelamin) && !isset($error_kelas) && !isset($error_ekstrakurikuler)) {
                        echo "<h3>Your Input:</h3>";
                        echo '<p>NIS: '.$_POST['nis'].'</p>';
                        echo '<p>Nama: '.$_POST['nama'].'</p>';
                        echo '<p>Jenis Kelamin: '.$_POST['jenis_kelamin'].'</p>';
                        echo '<p>Kelas: '.$_POST['kelas'].'</p>';
                        if ($show_ekstrakurikuler) {
                            echo 'Ekstrakurikuler: ';
                            if (!empty($_POST['Ekstrakurikuler'])) {
                                foreach ($_POST['ekstrakurikuler'] as $ekstrakurikuler_item) {
                                    echo '<br>'.$ekstrakurikuler_item;
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
