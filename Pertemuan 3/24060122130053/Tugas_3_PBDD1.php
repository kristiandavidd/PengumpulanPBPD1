<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 18 September 2024
Lab : PBP D1
Tugas Pertemuan 3 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <?php
        $nama = $nis = $jenis_kelamin = $kelas = $result = "";
        $ekstra = $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['reset'])) {
                $nama = $nis = $jenis_kelamin = $kelas = "";
                $ekstra = [];
            } else {
                $nama = $_POST['nama'];
                $nis = $_POST['nis'];
                $kelas = $_POST['kelas'];
                $jenis_kelamin = $_POST['jenis_kelamin'] ?? "";
                $ekstra = $_POST['ekstra'] ?? [];

                if (empty($nama) || empty($nis) || empty($jenis_kelamin)) {
                    $errors[] = "Semua field harus diisi.";
                }

                if (!preg_match("/^\d{10}$/", $nis)) {
                    $errors[] = "NIS harus terdiri dari 10 karakter dan hanya angka.";
                }

                if (($kelas == 'X' || $kelas == 'XI') && count($ekstra) < 1) {
                    $errors[] = "Pilih minimal 1 ekstrakurikuler.";
                }

                if (($kelas == 'X' || $kelas == 'XI') && count($ekstra) > 3) {
                    $errors[] = "Pilih maksimal 3 ekstrakurikuler.";
                }

                if ($kelas == 'XII' && count($ekstra) > 0) {
                    $errors[] = "Siswa kelas XII tidak boleh mengikuti ekstrakurikuler.";
                }

                if (empty($errors)) {
                    echo "<div class='alert alert-success'>Form berhasil disubmit!</div>";
                    $result = "
                        <h3>Detail Data:</h3>
                        Nama: $nama <br> 
                        NIS: $nis <br>
                        Kelas: $kelas <br>
                        Jenis Kelamin: $jenis_kelamin <br>
                        Ekstrakurikuler: " . (empty($ekstra) ? 'Tidak ada' : implode(", ", $ekstra));
                    $nama = $nis = $jenis_kelamin = $kelas = "";
                    $ekstra = [];
                } else {
                    foreach ($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                }
            }
        }
        ?>

        <div class="card">
            <div class="card-header">Form Input Siswa</div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">NIS:</label>
                        <input type="text" class="form-control" name="nis" value="<?= htmlspecialchars($nis) ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama:</label>
                        <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($nama) ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin:</label><br>
                        <input type="radio" name="jenis_kelamin" value="Pria" <?= $jenis_kelamin == "Pria" ? "checked" : "" ?>> Pria <br>
                        <input type="radio" name="jenis_kelamin" value="Wanita" <?= $jenis_kelamin == "Wanita" ? "checked" : "" ?>> Wanita
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelas:</label>
                        <select class="form-select" name="kelas" id="kelas" onchange="toggleExtracurriculars(this)">
                            <option value="X" <?= $kelas == "X" ? "selected" : "" ?>>X</option>
                            <option value="XI" <?= $kelas == "XI" ? "selected" : "" ?>>XI</option>
                            <option value="XII" <?= $kelas == "XII" ? "selected" : "" ?>>XII</option>
                        </select>
                    </div>

                    <div class="mb-3" id="extracurricularSection" style="display:none;">
                        <label class="form-label">Ekstrakurikuler:</label><br>
                        <?php
                        $ekstra_options = ['Pramuka', 'Seni Tari', 'Sinematografi', 'Basket'];
                        foreach ($ekstra_options as $ekstra_item) {
                            $checked = in_array($ekstra_item, $ekstra) ? 'checked' : '';
                            echo "<input type='checkbox' name='ekstra[]' value='$ekstra_item' $checked> $ekstra_item<br>";
                        }
                        ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="submit" class="btn btn-danger" name="reset">Reset</button>
                </form>
            </div>
        </div>

        <div class="mt-4"><?= $result ?></div>
    </div>

    <script>
        function toggleExtracurriculars(element) {
            var extracurricularSection = document.getElementById("extracurricularSection");
            extracurricularSection.style.display = (element.value == "X" || element.value == "XI") ? "block" : "none";
        }

        window.onload = function() {
            toggleExtracurriculars(document.getElementById("kelas"));
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>

