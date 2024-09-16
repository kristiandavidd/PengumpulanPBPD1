<!-- 
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pengerjaan  : Senin, 16 September 2024 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        // Fungsi untuk menyembunyikan pilihan ekstrakurikuler bagi siswa kelas XII
        function ekstrakurikulerKelas() {
            let kelas = document.getElementById("kelas").value;
            let ekskulContainer = document.getElementById("ekskul_container");
            let ekskulCheckboxes = document.querySelectorAll("input[name='ekskul[]']");

            if (kelas === "XII") {
                ekskulCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                ekskulContainer.style.display = "none";
            } else {
                ekskulContainer.style.display = "block";
            }
        }

        // Fungsi untuk reset form
        function resetForm() {
            document.querySelector('form').reset();
            if (document.getElementById("kelas").value === "XII") {
                document.getElementById("ekskul_container").style.display = "none";
            } else {
                document.getElementById("ekskul_container").style.display = "block";
            }
        }
    </script>
</head>
<body onload="ekstrakurikulerKelas()">
    <?php 
        if(isset($_POST['submit'])) {
            // Validasi nis: tidak boleh kosong, terdiri dari 10 karakter angka
            $nis = test_input($_POST["nis"]);
            if (empty($nis)) {
                $error_nis = "NIS harus diisi";
            } elseif (!preg_match("/^[0-9]{10}$/", $nis)) {
                $error_nis = "NIS harus terdiri dari 10 karakter angka.";
            }
        
            // Validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
            $nama = test_input($_POST["nama"]);
            if (empty($nama)) {
                $error_nama = "Nama harus diisi";
            } elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }
        
            // Validasi jenis kelamin: tidak boleh kosong
            $jenis_kelamin = isset($_POST["jenis_kelamin"]) ? $_POST["jenis_kelamin"] : [];
            if (empty($jenis_kelamin)) {
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            }
        
            // Validasi kelas: tidak boleh kosong
            $kelas = $_POST['kelas'];
            if (empty($kelas) || $kelas == 'kelas') {
                $error_kelas = "Kelas harus diisi";
            }
        
            // Validasi ekstrakurikuler: tidak boleh kosong untuk kelas X dan XI
            $ekskul = isset($_POST['ekskul']) ? $_POST['ekskul'] : [];
            if ($kelas == 'X' || $kelas == 'XI') {
                if (empty($ekskul)){
                    $error_ekskul = "Pilih minimal 1 ekstrakurikuler";
                } elseif (count($ekskul) > 3){
                    $error_ekskul = "Maksimal 3 ekstrakurikuler.";
                }
            }
        }
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <div class="container" style="max-width: 600px; padding: 10px 0px">
        <div class="card">
            <div class="card-header">
                Form Input Siswa
            </div>
            <div class="card-body">
                <form method="POST" autocomplete="on" action="">
                    <div class="form-group">
                        <label for="nis">NIS:</label>
                        <input type="text" class="form-control" id="nis" name="nis" maxlength="10" value="<?php if(isset($nis)) {echo $nis;} ?>">
                        <div class="error" style="color: red; font-size: 12px;"><?php if (isset($error_nis)) {echo $error_nis;} ?></div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if(isset($nama)) {echo $nama;} ?>">
                        <div class="error" style="color: red; font-size: 12px;"><?php if (isset($error_nama)) {echo $error_nama;} ?></div>
                    </div>
                    <br/>
                    <label>Jenis Kelamin</label>
                    <div class="form-check">
                        <input type="radio" name="jenis_kelamin" class="form-check-input" value="Pria" id="pria" 
                        <?php if(isset($jenis_kelamin) && $jenis_kelamin=="Pria") {echo "checked";} ?>>
                        <label class="form-check-label" for="pria">Pria</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jenis_kelamin" class="form-check-input" value="Wanita" id="wanita"
                        <?php if(isset($jenis_kelamin) && $jenis_kelamin =="Wanita") {echo "checked";} ?>>
                        <label class="form-check-label" for="wanita">Wanita</label>
                    </div>
                    <div class="error" style="color: red; font-size: 12px;"><?php if (isset($error_jenis_kelamin)) {echo $error_jenis_kelamin;} ?></div>
                    <br>
                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <select name="kelas" id="kelas" class="form-select" onchange="ekstrakurikulerKelas()">
                            <option value="X" <?php if(isset($kelas) && $kelas=="X") {echo 'selected="true"';} ?>>X</option>
                            <option value="XI" <?php if(isset($kelas) && $kelas=="XI") {echo 'selected="true"';} ?>>XI</option>
                            <option value="XII" <?php if(isset($kelas) && $kelas=="XII") {echo 'selected="true"';} ?>>XII</option>
                        </select>
                        <div class="error" style="color: red; font-size: 12px;"><?php if (isset($error_kelas)) {echo $error_kelas;} ?></div>
                    </div>
                    <br/>
                    <div class="form-group" id="ekskul_container">
                        <label>Ekstrakurikuler:</label>
                        <div class="form-check">
                            <input type="checkbox" name="ekskul[]" class="form-check-input" value="Pramuka" id="pramuka"
                            <?php if(isset($ekskul) && in_array('Pramuka', $ekskul)) {echo "checked";} ?>>
                            <label class="form-check-label" for="pramuka">Pramuka</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="ekskul[]" class="form-check-input" value="Seni Tari" id="seni_tari"
                            <?php if(isset($ekskul) && in_array('Seni Tari', $ekskul)) {echo "checked";} ?>>
                            <label class="form-check-label" for="seni_tari">Seni Tari</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="ekskul[]" class="form-check-input" value="Sinematografi" id="sinematografi"
                            <?php if(isset($ekskul) && in_array('Sinematografi', $ekskul)) {echo "checked";} ?>>
                            <label class="form-check-label" for="sinematografi">Sinematografi</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="ekskul[]" class="form-check-input" value="Basket" id="basket"
                            <?php if(isset($ekskul) && in_array('Basket', $ekskul)) {echo "checked";} ?>>
                            <label class="form-check-label" for="basket">Basket</label>
                        </div>
                        <div class="error" style="color: red; font-size: 12px;"><?php if (isset($error_ekskul)) {echo $error_ekskul;} ?></div>
                    </div>
                    <br>
                    <!-- Submit, reset button -->
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <button type="reset" class="btn btn-danger" id="resetBtn" onclick="resetForm()">Reset</button>
                </form>
                <br/>
                <?php 
                    if (isset($_POST["submit"]) && empty($error_nis) && empty($error_nama) && empty($error_jenis_kelamin) && empty($error_kelas)  && empty($error_ekskul)) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo "<h3>Data Siswa:</h3>";
                        echo 'NIS: '.$_POST['nis'].'<br />';
                        echo 'Nama: '.$_POST['nama'].'<br />';
                        echo 'Jenis Kelamin: '.$_POST['jenis_kelamin'].'<br />';
                        echo 'Kelas: '.$_POST['kelas'].'<br />';
                        if ($kelas == "X" || $kelas == "XI"){
                            echo "Ekstrakurikuler yang dipilih: ";
                            foreach ($ekskul as $ekskul_item) {
                                echo '<br /> - '.$ekskul_item;
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>