<!-- Nama : Muhammad Naufal Izzudin -->
<!-- Nim : 24060122120018 -->
<!-- Tanggal Pengerjaan : 12 September 2024 -->

<?php

$error_nis = $error_nama = $error_minat = $error_jenis_kelamin = null;
$nis = $nama = $jenis_kelamin = $kelas = '';
$minat = []; 

function test_input($data) {
    return trim(htmlspecialchars($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = test_input($_POST['nis']);
    $nama = test_input($_POST['nama']);
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? test_input($_POST['jenis_kelamin']) : '';
    $kelas = isset($_POST['kelas']) ? test_input($_POST['kelas']) : '';
    $minat = isset($_POST['minat']) ? $_POST['minat'] : []; 

    if ($kelas == 'XII') {
        $minat = [];
    }

    // Validasi NIS
    if (empty($nis)) {
        $error_nis = "NIS harus diisi";
    } elseif (!preg_match("/^\d{10}$/", $nis)) {
        $error_nis = "NIS harus terdiri dari 10 angka";
    }

    // Validasi Nama
    if (empty($nama)) {
        $error_nama = "Nama harus diisi";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $error_nama = "Nama hanya dapat berisi huruf dan spasi";
    }

    // Validasi Jenis Kelamin
    if (empty($jenis_kelamin)) {
        $error_jenis_kelamin = "Harus punya jenis kelamin karena jenis kelamin cuman ada 2 pria atau wanita";
    }

    // Validasi Ekstrakurikuler
    if ($kelas == 'X' || $kelas == 'XI') {
        if (empty($minat)) {
            $error_minat = "Pilih minimal 1 ekstrakurikuler";
        } elseif (count($minat) < 1 || count($minat) > 3) {
            $error_minat = "Pilih minimal 1 dan maksimal 3 ekstrakurikuler";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #ekstrakurikuler-section {
            display: block; /* Default to visible */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Form Input Siswa
            </div>
            <div class="card-body">
                <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="nis">NIS:</label>
                        <input type="text" class="form-control" id="nis" name="nis" maxlength="10" value="<?php echo htmlspecialchars($nis); ?>">
                        <div class="error text-danger"><?php echo $error_nis;?></div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php echo htmlspecialchars($nama); ?>">
                        <div class="error text-danger"><?php echo $error_nama;?></div>
                    </div>
                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if (isset($jenis_kelamin) && $jenis_kelamin=="pria") echo "checked";?>>
                        <label class="form-check-label">Pria</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if (isset($jenis_kelamin) && $jenis_kelamin=="wanita") echo "checked";?>>
                        <label class="form-check-label">Wanita</label>
                    </div>
                    <div class="error text-danger"><?php echo $error_jenis_kelamin;?></div>

                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <select id="kelas" name="kelas" class="form-control">
                            <option value="X" <?php if (isset($kelas) && $kelas=="X") echo 'selected="true"';?>>X</option>
                            <option value="XI" <?php if (isset($kelas) && $kelas=="XI") echo 'selected="true"';?>>XI</option>
                            <option value="XII" <?php if (isset($kelas) && $kelas=="XII") echo 'selected="true"';?>>XII</option>
                        </select>
                    </div>

                    <div id="ekstrakurikuler-section">
                        <label>Ekstrakurikuler:</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="pramuka" <?php if (in_array('pramuka', $minat)) echo 'checked';?>>
                            <label class="form-check-label">Pramuka</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="seni_tari" <?php if (in_array('seni_tari', $minat)) echo 'checked';?>>
                            <label class="form-check-label">Seni Tari</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="sinematografi" <?php if (in_array('sinematografi', $minat)) echo 'checked';?>>
                            <label class="form-check-label">Sinematografi</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="basket" <?php if (in_array('basket', $minat)) echo 'checked';?>>
                            <label class="form-check-label">Basket</label>
                        </div>
                        <div class="error text-danger"><?php echo $error_minat;?></div>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <button type="reset" class="btn btn-danger" onclick="resetForm()">Reset</button>
                </form>
            </div>
        </div>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$error_nis && !$error_nama && !$error_jenis_kelamin && !$error_minat): ?>
        <div class="card mt-4">
            <div class="card-header">
                Hasil Input
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>NIS:</strong> <?php echo htmlspecialchars($nis); ?></li>
                    <li class="list-group-item"><strong>Nama:</strong> <?php echo htmlspecialchars($nama); ?></li>
                    <li class="list-group-item"><strong>Jenis Kelamin:</strong> <?php echo htmlspecialchars($jenis_kelamin); ?></li>
                    <li class="list-group-item"><strong>Kelas:</strong> <?php echo htmlspecialchars($kelas); ?></li>
                    <li class="list-group-item"><strong>Ekstrakurikuler:</strong> 
                        <?php if (empty($minat)): ?>
                            Kelas XII tidak perlu mengikuti kegiatan esktrakulikuler karena harus fokus ujian agar bisa masuk PTN impian.
                        <?php else: ?>
                            <ul class="list-group">
                                <?php foreach ($minat as $item): ?>
                                    <li class="list-group-item"><?php echo htmlspecialchars($item); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <script>
        function toggleEkstrakurikuler() {
            const kelas = document.getElementById('kelas').value;
            const ekstrakurikulerSection = document.getElementById('ekstrakurikuler-section');
            const checkboxes = ekstrakurikulerSection.querySelectorAll('input[type="checkbox"]');
            
            if (kelas === 'XII') {
                ekstrakurikulerSection.style.display = 'none';
                checkboxes.forEach(checkbox => checkbox.checked = false);
            } else {
                ekstrakurikulerSection.style.display = 'block';
            }
        }
        
        function resetForm() {
            document.querySelector('form').reset();
            toggleEkstrakurikuler(); 
        }

        document.getElementById('kelas').addEventListener('change', toggleEkstrakurikuler);
        document.addEventListener('DOMContentLoaded', toggleEkstrakurikuler); 
    </script>
    
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
