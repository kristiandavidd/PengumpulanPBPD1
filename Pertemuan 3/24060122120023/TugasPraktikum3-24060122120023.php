<!-- Nama: Happy Desita W. -->
<!-- NIM: 24060122120023 -->
<!-- Tanggal Mulai Pengerjaan: 14 September 2024 -->
<!-- Tanggal Selesai Pengerjaan: 16 September 2024 -->

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form Input Siswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .custom-container {
                max-width: 600px;
                margin: 0 auto;
            }

            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <!-- Script PHP untuk Validasi-->
        <?php
            if(isset($_POST["submit"])){
                // Validasi NIS: Tidak boleh kosong, terdiri atas 10 karakter, hanya dapat berisi angka 0..9
                $nis = test_input($_POST['nis']);
                if (empty($nis)){
                    $error_nis = "NIS harus diisi!";
                }
                elseif (!preg_match("/^[0-9]{10}$/", $nis)){
                    $error_nis = "NIS harus terdiri atas 10 angka!";
                }

                // Validasi Nama: Tidak boleh kosong, hanya dapat berisi huruf dan spasi
                $nama = test_input($_POST['nama']);
                if (empty($nama)){
                    $error_nama = "Nama harus diisi!";
                }
                elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)){
                    $error_nama = "Nama hanya dapat berisi huruf dan spasi!";
                }

                // Validasi Jenis Kelamin: tidak boleh kosong
                if (empty($jenis_kelamin)){
                    $error_jenis_kelamin = "Jenis kelamin harus diisi!";
                }

                // Validasi Kelas: tidak boleh kosong
                if (empty($kelas)){
                    $error_kelas = "Kelas harus diisi!";
                }
                
                // Validasi Ekstrakurikuler: tidak boleh kosong, minimal pilih 1, dan maksimal pilih 3
                if ($kelas == 'X' || $kelas == 'XI') {
                    $ekstrakurikuler = isset($_POST['ekstrakurikuler']) ? $_POST['ekstrakurikuler'] : [];
                    if (empty($ekstrakurikuler)){
                        $error_ekstrakurikuler = "Pilih minimal 1 ekstrakurikuler!";
                    } 
                    elseif (count($ekstrakurikuler) > 3) {
                        $error_ekstrakurikuler = "Pilih maksimal 3 ekstrakurikuler!";
                    }
                }
            }

            function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>

        <div class="container custom-container mt-5 mb-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    Form Input Siswa
                </div>
                <div class="card-body">
                    <form action="" method="POST" autocomplete="on" id="form_input_siswa">
                        <!-- NIS -->
                        <div class="form-group">
                            <label for="nis">NIS: </label>
                            <input type="text" class="form-control" id="nis" name="nis" value="<?php if (isset($nis)) echo $nis; ?>">
                            <div class="error">
                                <?php if (isset($error_nis)) echo $error_nis; ?>
                            </div>
                        </div>

                        <br>

                        <!-- Nama -->
                        <div class="form-group">
                            <label for="nama">Nama: </label>
                            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if (isset($nama)) echo $nama; ?>">
                            <div class="error">
                                <?php if (isset($error_nama)) echo $error_nama; ?>
                            </div>
                        </div>

                        <br>

                        <!-- Jenis Kelamin -->
                        <label>Jenis Kelamin: </label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="Pria" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "Pria") echo "checked"; ?>>
                            <label class="form-check-label">Pria</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="Wanita" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "Wanita") echo "checked"; ?>>
                            <label class="form-check-label">Wanita</label>
                        </div>
                        <div class="error">
                            <?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?>
                        </div>

                        <br>

                        <!-- Kelas -->
                        <div class="form-group">
                            <label for="kelas">Kelas: </label>
                            <select id="kelas" class="form-control" name="kelas" onchange="tampilanEkskul()">
                                <option value="">-- Pilih Kelas --</option>
                                <option value="X" <?php if (isset($kelas) && $kelas == "X") echo 'selected="true"'; ?>>X</option>
                                <option value="XI" <?php if (isset($kelas) && $kelas == "XI") echo 'selected="true"'; ?>>XI</option>
                                <option value="XII" <?php if (isset($kelas) && $kelas == "XII") echo 'selected="true"'; ?>>XII</option>
                            </select>
                            <div class="error">
                                <?php if (isset($error_kelas)) echo $error_kelas; ?>
                            </div>
                        </div>

                        <br>

                        <!-- Ekstrakurikuler -->
                        <div id="ekskul_item">
                            <label>Ekstrakurikuler: </label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="Pramuka" <?php if (isset($ekstrakurikuler) && in_array('Pramuka', $ekstrakurikuler)) echo 'checked'; ?>>
                                <label class="form-check-label">Pramuka</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="Seni Tari" <?php if (isset($ekstrakurikuler) && in_array('Seni Tari', $ekstrakurikuler)) echo 'checked'; ?>>
                                <label class="form-check-label">Seni Tari</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="Sinematografi" <?php if (isset($ekstrakurikuler) && in_array('Sinematografi', $ekstrakurikuler)) echo 'checked'; ?>>
                                <label class="form-check-label">Sinematografi</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="Basket" <?php if (isset($ekstrakurikuler) && in_array('Basket', $ekstrakurikuler)) echo 'checked'; ?>>
                                <label class="form-check-label">Basket</label>
                            </div>
                            <div class="error">
                                <?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?>
                            </div>
                        </div>

                        <br>

                        <!-- Submit dan Reset Button -->
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>

            <!-- Script PHP untuk Menampilkan yang Sudah Disubmit-->
            <?php
                if(isset($_POST["submit"])){
                    echo"<h3> Your Input: </h3>";
                    echo'NIS = '.$_POST['nis'].'<br/>';
                    echo'Nama = '.$_POST['nama'].'<br/>';
                    echo'Jenis Kelamin = '.$_POST['jenis_kelamin'].'<br/>';
                    echo'Kelas = '.$_POST['kelas'].'<br/>';

                    if ($kelas == 'X' || $kelas == 'XI') {
                        echo "Ekstrakurikuler yang dipilih: <br/>";
                        foreach($ekstrakurikuler as $ekskul){
                            echo "- " . $ekskul . "<br/>";
                        }
                    } 
                    else {
                        echo "Kelas XII tidak boleh mengikuti kegiatan ekstrakurikuler.";
                    }
                }
            ?>
        </div>
        
        <!-- Javascript untuk menghilangkan ekstrakurikuler jika kelas XII dipilih -->
        <script>
        function tampilanEkskul() {
            const kelas = document.getElementById("kelas").value;
            const ekskulItem = document.getElementById("ekskul_item");

            if (kelas == "XII") {
                ekskulItem.style.display = "none";
            } 
            else {
                ekskulItem.style.display = "block";
            }
        }

        window.onload = function() {
            tampilanEkskul();
        };
        </script>
    </body>
</html>
