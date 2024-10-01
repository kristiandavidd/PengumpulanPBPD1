<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <?php
    $error_nis = $error_nama = $error_jenis_kelamin = $error_kelas = $error_minat = "";
    $nis = $nama = $jenis_kelamin = $kelas = "";
    $minat = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valid = true;

        if (empty($_POST["nis"])) {
            $error_nis = "NIS harus diisi";
            $valid = false;
        } elseif (!preg_match("/^[0-9]{10}$/", $_POST["nis"])) {
            $nis = htmlspecialchars($_POST["nis"]);
            $error_nis = "NIS harus berisi 10 angka";
            $valid = false;
        } else {
            $nis = htmlspecialchars($_POST["nis"]);
        }

        if (empty($_POST["nama"])) {
            $error_nama = "Nama harus diisi";
            $valid = false;
        } else {
            $nama = htmlspecialchars($_POST["nama"]);
        }

        if (empty($_POST["jenis_kelamin"])) {
            $error_jenis_kelamin = "Jenis kelamin harus dipilih";
            $valid = false;
        } else {
            $jenis_kelamin = $_POST["jenis_kelamin"];
        }

        if (empty($_POST["kelas"])) {
            $error_kelas = "Kelas harus dipilih";
            $valid = false;
        } else {
            $kelas = $_POST["kelas"];
        }

        if ($kelas == "X" || $kelas == "XI") {
            if (empty($_POST["minat"])) {
                $error_minat = "Pilih minimal 1 ekstrakurikuler";
                $valid = false;
            } elseif (count($_POST["minat"]) > 3) {
                $error_minat = "Pilih maksimal 3 ekstrakurikuler";
                $valid = false;
            } else {
                $minat = $_POST["minat"];
            }
        }
        
        if ($valid) {
            echo "<div class='alert alert-success mt-3'>Data berhasil disubmit:</div>";
            echo "<ul>";
            echo "<li><strong>NIS:</strong> " . $nis . "</li>";
            echo "<li><strong>Nama:</strong> " . $nama . "</li>";
            echo "<li><strong>Jenis Kelamin:</strong> " . ($jenis_kelamin == "pria" ? "Pria" : "Wanita") . "</li>";
            echo "<li><strong>Kelas:</strong> " . $kelas . "</li>";
            if ($kelas != "XII") {
                echo "<li><strong>Minat:</strong> " . implode(", ", $minat) . "</li>";
            }
            echo "</ul>";
        }
    }
    ?>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Form Input Siswa
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <div class="form-group mb-3">
                        <label for="nis">NIS:</label>
                        <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $nis;?>">
                        <div class="error"><?php echo $error_nis;?></div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>">
                        <div class="error"><?php echo $error_nama;?></div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Jenis Kelamin:</label> 
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="pria" name="jenis_kelamin" value="pria" <?php if ($jenis_kelamin == "pria") echo "checked";?>>
                            <label class="form-check-label" for="pria">Pria</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="wanita" name="jenis_kelamin" value="wanita" <?php if ($jenis_kelamin == "wanita") echo "checked";?>>
                            <label class="form-check-label" for="wanita">Wanita</label>
                        </div>
                        <div class="error"><?php echo $error_jenis_kelamin;?></div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="kelas">Kelas:</label>
                        <select id="kelas" name="kelas" class="form-control" onchange="toggleEkstrakurikuler()">
                            <option value="" <?php if (empty($kelas)) echo 'selected'; ?>>Pilih Kelas</option>
                            <option value="X" <?php if ($kelas == "X") echo 'selected'; ?>>X</option>
                            <option value="XI" <?php if ($kelas == "XI") echo 'selected'; ?>>XI</option>
                            <option value="XII" <?php if ($kelas == "XII") echo 'selected'; ?>>XII</option>
                        </select>
                        <div class="error"><?php echo $error_kelas;?></div>
                    </div>

                    <div id="ekstrakurikuler" class="form-group mb-3" style="display: <?php echo ($kelas == 'X' || $kelas == 'XI') ? 'block' : 'none'; ?>;">
                        <label>Ekstrakurikuler:</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="pramuka" name="minat[]" value="Pramuka" <?php if (in_array("Pramuka", $minat)) echo "checked"; ?>>
                            <label class="form-check-label" for="pramuka">Pramuka</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="seni_tari" name="minat[]" value="Seni Tari" <?php if (in_array("Seni Tari", $minat)) echo "checked"; ?>>
                            <label class="form-check-label" for="seni_tari">Seni Tari</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="sinematografi" name="minat[]" value="Sinematografi" <?php if (in_array("Sinematografi", $minat)) echo "checked"; ?>>
                            <label class="form-check-label" for="sinematografi">Sinematografi</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="basket" name="minat[]" value="Basket" <?php if (in_array("Basket", $minat)) echo "checked"; ?>>
                            <label class="form-check-label" for="basket">Basket</label>
                        </div>
                        <div class="error"><?php echo $error_minat;?></div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100" name="submit" value="submit">Submit</button>
                            </div>
                            <div class="col-6">
                                <button type="reset" class="btn btn-danger w-100">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleEkstrakurikuler() {
            var kelas = document.getElementById("kelas").value;
            var ekstrakurikuler = document.getElementById("ekstrakurikuler");
            if (kelas === "X" || kelas === "XI") {
                ekstrakurikuler.style.display = "block";
            } else {
                ekstrakurikuler.style.display = "none";
            }
        }
    </script>
</body>
</html>
