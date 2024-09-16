<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <style>
        body { 
            background-color: #ffe6f2; 
        }
        .card { 
            border: 2px solid #ff80bf; 
        }
        .btn-primary { 
            background-color: #ff80bf; border-color: #ff80bf; 
        }
        .btn-primary:hover { 
            background-color: #ff4da6; border-color: #ff4da6; 
        }
        .btn-danger { 
            background-color: #ffcccc; border-color: #ffcccc; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center mb-4">Form Input Siswa</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="nis">NIS:</label>
                        <input type="text" class="form-control" id="nis" name="nis">
                        <span class="text-danger" id="error_nis"></span>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <span class="text-danger" id="error_nama"></span>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki">
                            <label class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                            <label class="form-check-label">Perempuan</label>
                        </div>
                        <span class="text-danger" id="error_jenis_kelamin"></span>
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <select class="form-control" id="kelas" name="kelas">
                            <option value="">Pilih Kelas</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                        <span class="text-danger" id="error_kelas"></span>
                    </div>

                    <div class="form-group" id="ekstrakurikuler-group" style="display: none;">
                        <label>Ekstrakurikuler:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ekstrakurikuler[]" value="Basket">
                            <label class="form-check-label">Basket</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ekstrakurikuler[]" value="Futsal">
                            <label class="form-check-label">Futsal</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ekstrakurikuler[]" value="Pramuka">
                            <label class="form-check-label">Pramuka</label>
                        </div>
                        <span class="text-danger" id="error_ekstrakurikuler"></span>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
                <div id="detail_informasi"></div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('kelas').addEventListener('change', function() {
        var ekstrakurikulerGroup = document.getElementById('ekstrakurikuler-group');
        ekstrakurikulerGroup.style.display = (this.value === 'X' || this.value === 'XI') ? 'block' : 'none';
    });
    </script>

    <?php
    $error_nis = $error_nama = $error_jenis_kelamin = $error_kelas = $error_ekstrakurikuler = "";
    $nis = $nama = $jenis_kelamin = $kelas = "";
    $ekstrakurikuler = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nis"])) {
            $error_nis = "NIS harus diisi";
        } elseif (!preg_match("/^[0-9]{10}$/", $_POST["nis"])) {
            $error_nis = "NIS harus berupa 10 angka";
        } else {
            $nis = $_POST["nis"];
        }

        if (empty($_POST["nama"])) {
            $error_nama = "Nama harus diisi";
        } else {
            $nama = $_POST["nama"];
        }

        if (empty($_POST["jenis_kelamin"])) {
            $error_jenis_kelamin = "Jenis kelamin harus diisi";
        } else {
            $jenis_kelamin = $_POST["jenis_kelamin"];
        }

        if (empty($_POST["kelas"])) {
            $error_kelas = "Kelas harus dipilih";
        } else {
            $kelas = $_POST["kelas"];
        }

        if ($kelas == "X" || $kelas == "XI") {
            if (count($_POST["ekstrakurikuler"]) == 0) {
                $error_ekstrakurikuler = "Pilih minimal 1 ekstrakurikuler";
            } elseif (count($_POST["ekstrakurikuler"]) > 3) {
                $error_ekstrakurikuler = "Pilih maksimal 3 ekstrakurikuler";
            } else {
                $ekstrakurikuler = $_POST["ekstrakurikuler"];
            }
        }
        //Buat ngecek semuanya aman gak
        if (empty($error_nis) && empty($error_nama) && empty($error_jenis_kelamin) && empty($error_kelas) && empty($error_ekstrakurikuler)) {
            echo "<script>
                document.getElementById('detail_informasi').innerHTML = `
                    <div class='alert alert-success mt-3'>Form berhasil disubmit!</div>
                    <h4>Detail Informasi:</h4>
                    <p>NIS: $nis</p>
                    <p>Nama: $nama</p>
                    <p>Jenis Kelamin: $jenis_kelamin</p>
                    <p>Kelas: $kelas</p>
                    " . (($kelas == "X" || $kelas == "XI") ? "<p>Ekstrakurikuler: " . implode(", ", $ekstrakurikuler) . "</p>" : "") . "
                `;
            </script>";
        } else {
            echo "<script>
                document.getElementById('error_nis').textContent = '$error_nis';
                document.getElementById('error_nama').textContent = '$error_nama';
                document.getElementById('error_jenis_kelamin').textContent = '$error_jenis_kelamin';
                document.getElementById('error_kelas').textContent = '$error_kelas';
                document.getElementById('error_ekstrakurikuler').textContent = '$error_ekstrakurikuler';
            </script>";
        }
    }
    ?>
</body>
</html>