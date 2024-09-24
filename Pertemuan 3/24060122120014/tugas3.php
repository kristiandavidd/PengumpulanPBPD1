<!-- 
    Nama File   : tugas3.php
    Deskripsi   : form validation
    Pembuat     : Rachmad Rifa'i / 24060122120014
    Tanggal     : 16 September 2024
-->

<!DOCTYPE html>
<html>
    <head>
        <title>Form Input Siswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script>
            function toggleExtracurricular() {
                var kelas = document.getElementById("kelas").value;
                var extraForm = document.getElementById("extraform");

                if (kelas === "X" || kelas === "XI") {
                    extraForm.style.display = "block";
                } else {
                    extraForm.style.display = "none";
                }
            }

            window.onload = function() {
                toggleExtracurricular();
            };
        </script>
    </head>
    <body class="container">
    <?php
        if (isset($_POST['submit'])) {
            $nis = test_input($_POST['nis']);
            if (empty($nis)) {
                $error_nis = "NIS harus diisi";
            } elseif (!preg_match("/^\d{10}$/", $nis)) {
                $error_nis = "NIS hanya berisi angka 0-9";
            }

            $nama = test_input($_POST['nama']);
            if (empty($nama)) {
                $error_nama = "Nama harus diisi";
            } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }

            $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
            if($jenis_kelamin == '') {
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            }

            $kelas = $_POST['kelas'];
            if ($kelas == '' || $kelas == 'kelas') {
                $error_kelas = "Kelas harus dipilih";
            }

            $extra = isset($_POST['extra']) ? $_POST['extra'] : [];
            if (($kelas === "X" || $kelas === "XI") && empty($extra)) {
                $error_extra = "Ekstrakulikuler harus dipilih minimal 1";
            } elseif (($kelas === "X" || $kelas === "XI") && count($extra) > 3){
                $error_extra = "Ekstrakulikuler yang dipilih maksimal 3";
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

        <div class="card">
            <h5 class="card-header">Form Input Siswa</h5>
            <div class="card-body">
                <form method="POST" autocomplete="on" action="" onsubmit="return validateForm()">
                    <div class="form-group mb-3">
                        <label for="nis">NIS:</label>
                        <input type="text" class="form-control" id="nis" name="nis" maxlength="10" value="<?php if(isset($nis)) {echo $nis;}?>">
                        <div class="text-danger"><?php if(isset($error_nis)) echo $error_nis;?></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if(isset($nama)) {echo $nama;}?>">
                        <div class="text-danger"><?php if(isset($error_nama)) echo $error_nama;?></div>
                    </div>

                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="Pria" <?php if(isset($jenis_kelamin) && $jenis_kelamin=="pria") echo 'checked';?>> Pria
                    </div>
                    <div class="form-check mb-3">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="Wanita" <?php if(isset($jenis_kelamin) && $jenis_kelamin=="wanita") echo 'checked';?>> Wanita
                        <div class="text-danger"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="kelas">Kelas:</label>
                        <select id="kelas" name="kelas" class="form-control" onchange="toggleExtracurricular()">
                            <option value="X" <?php if(isset($kelas) && $kelas=="X") echo 'selected="true"';?>>X</option>
                            <option value="XI" <?php if(isset($kelas) && $kelas=="XI") echo 'selected="true"';?>>XI</option>
                            <option value="XII" <?php if(isset($kelas) && $kelas=="XII") echo 'selected="true"';?>>XII</option>
                        </select>
                        <div class="text-danger"><?php if(isset($error_kelas)) echo $error_kelas;?></div>
                    </div>

                    <div id="extraform" style="display:none;">
                        <label>Ekstrakurikuler:</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="extra[]" value="Pramuka" <?php if(isset($extra) && in_array('pramuka', $extra)) echo 'checked';?>> Pramuka
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="extra[]" value="Seni Tari" <?php if(isset($extra) && in_array('seni_tari', $extra)) echo 'checked';?>> Seni Tari
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="extra[]" value="Sinematografi" <?php if(isset($extra) && in_array('sinematografi', $extra)) echo 'checked';?>> Sinematografi
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="extra[]" value="Basket" <?php if(isset($extra) && in_array('basket', $extra)) echo 'checked';?>> Basket
                        </div>
                        <div class="text-danger"><?php if(isset($error_extra)) echo $error_extra;?></div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-2" name="submit" value="submit">Submit</button>
                    <button type="reset" class="btn btn-danger w-100">Reset</button>
                </form>
            </div>
        </div>

        <?php
            if (isset($_POST["submit"]) ){
                echo"<h3>Input Siswa:</h3>";
                echo 'NIS = ' .$_POST['nis']. '<br />';
                echo 'Nama = ' .$_POST['nama']. '<br />';
                echo 'Jenis Kelamin = ' .(isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : ''). '<br />';
                echo 'Kelas = ' .$_POST['kelas']. '<br />';

                $extra = isset($_POST['extra']) ? $_POST['extra'] : [];
                if (!empty($extra) and count($extra) <= 3){
                    echo 'Ekstrakulikuler yang dipilih: ';
                    foreach ($extra as $extra_item) {
                        echo '<br />'.$extra_item;
                    }
                }
            }  
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>