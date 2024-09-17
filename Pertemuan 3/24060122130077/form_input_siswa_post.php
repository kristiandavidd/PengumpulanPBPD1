<!-- 
Nama                : Fendi Ardianto
NIM                 : 24060122130077
Lab                 : PBP D1
Tanggal Pengerjaan  : 17 September 2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        function hideNshowEkskul() {
            var kelas = document.getElementById("kelas").value;
            var ekskulDiv = document.getElementById("ekskul-section");

            if (kelas === "x" || kelas === "xi") {
                ekskulDiv.style.display = "block";  
            } else {
                ekskulDiv.style.display = "none"; 
            }
        }
    </script>
</head>
<body>
    <?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if(isset($_POST['submit'])){
        $nis = test_input($_POST['nis']);
        if(empty($nis)){
            $error_nis = "NIS harus diisi";
        }elseif(!preg_match("/^[0-9]*$/", $nis)){
            $error_nis = "NIS hanya dapat berisi angka";
        }elseif(strlen($nis) != 10){
            $error_nis = "NIS harus berisi 10 angka";
        }

        $nama = test_input($_POST['nama']);
        if (empty($nama)) {
            $error_nama = "Nama harus diisi";
        } elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
            $error_nama = "Nama hanya dapat berisi huruf dan spasi";
        }

        $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
        if (empty($jenis_kelamin)){
            $error_jenis_kelamin = "Jenis kelamin harus diisi";
        }

        $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
        if (empty($kelas)){
            $error_kelas = "Kelas harus dipilih";
        }

        if ($kelas == 'x' || $kelas == 'xi'){
            $ekstrakurikuler = isset($_POST['ekstrakurikuler'])? $_POST['ekstrakurikuler'] : [];
            if (empty($ekstrakurikuler)){
                $error_ekstrakurikuler = "Ekstrakurikuler harus dipilih";
            } 
            elseif(count($ekstrakurikuler) > 3){
                $error_ekstrakurikuler = "Hanya boleh memilih maksimal 3";
            }
        }
    }
    ?>

    <div class="container mt-3 ms-2"> 
        <div class="row ">
            <div class="col-md-6"> 
                <div class="card"> 
                    <div class="card-header">
                        <p class="mb-0">Form Input Siswa</p> 
                    </div>
                    
                    <div class="card-body">
                        <form action="" method="POST" autocomplete="on">
                            <div class="form-group mb-3">
                                <label for="nis">NIS: </label>
                                <input type="text" class="form-control" id="nis" name="nis" value="<?php echo isset($nis) ? $nis : ''; ?>">
                                <div class="error text-danger"><?php if(isset($error_nis))echo $error_nis;?></div> 
                            </div>

                            <div class="form-group mb-3">
                                <label for="nama">Nama: </label>
                                <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php echo isset($nama) ? $nama : ''; ?>">
                                <div class="error text-danger"><?php if(isset($error_nama))echo $error_nama;?></div> 
                            </div>

                            <label>Jenis Kelamin: </label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if(isset($jenis_kelamin) && $jenis_kelamin == 'pria') echo 'checked'; ?>>Pria 
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if(isset($jenis_kelamin) && $jenis_kelamin == 'wanita') echo 'checked'; ?>>Wanita
                                </label>
                            </div>
                            <div class="error text-danger"><?php if(isset($error_jenis_kelamin))echo $error_jenis_kelamin;?></div>
                            <br>

                            <div class="form-group mb-3">
                                <label for="kelas">Kelas:</label>
                                <select id="kelas" name="kelas" class="form-select" onchange="hideNshowEkskul()">
                                    <option value="">Pilih Kelas</option>
                                    <option value="x" <?php if(isset($kelas) && $kelas == 'x') echo 'selected'; ?>>X</option>
                                    <option value="xi" <?php if(isset($kelas) && $kelas == 'xi') echo 'selected'; ?>>XI</option>
                                    <option value="xii" <?php if(isset($kelas) && $kelas == 'xii') echo 'selected'; ?>>XII</option>
                                </select>
                                <div class="error text-danger"><?php if(isset($error_kelas))echo $error_kelas;?></div> 
                            </div>

                            <div id="ekskul-section" style="display: <?php echo (isset($kelas) && ($kelas == 'x' || $kelas == 'xi')) ? 'block' : 'none'; ?>;">
                                <label>Ekstrakurikuler:</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="pramuka" <?php if(isset($ekstrakurikuler) && in_array('pramuka', $ekstrakurikuler)) echo 'checked'; ?>>Pramuka 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="seni_tari" <?php if(isset($ekstrakurikuler) && in_array('seni_tari', $ekstrakurikuler)) echo 'checked'; ?>>Seni Tari 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="sinematografi" <?php if(isset($ekstrakurikuler) && in_array('sinematografi', $ekstrakurikuler)) echo 'checked'; ?>>Sinematografi 
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="basket" <?php if(isset($ekstrakurikuler) && in_array('basket', $ekstrakurikuler)) echo 'checked'; ?>>Basket
                                    </label>
                                </div>

                                <div class="error text-danger"><?php if(isset($error_ekstrakurikuler))echo $error_ekstrakurikuler;?></div>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit </button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if (isset($_POST["submit"]) && empty($error_nis) && empty($error_nama) && empty($error_kelas) && empty($error_jenis_kelamin) && empty($error_ekstrakurikuler)) {
                echo "<h3>Your Input:</h3>";
                echo 'NIS = '.$_POST['nis'].'<br />';
                echo 'Nama = '.$_POST['nama'].'<br />';
                echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'<br />';
                echo 'Kelas = '.$_POST['kelas'].'<br />';
                
                if (isset($ekstrakurikuler) && ($kelas == 'x' || $kelas == 'xi')) {
                    echo 'Ekstrakurikuler yang dipilih: <br />';
                    foreach ($ekstrakurikuler as $ekskul) {
                        echo $ekskul . '<br />';
                    }
                }                
            }
        ?>
    </div>
</body>
</html>
