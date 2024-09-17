<?php
    $error_nis = "";
    $error_nama = "";
    $error_jenis_kelamin = "";
    $error_kelas = "";
    $error_ekstra = "";

    $nis = "";
    $nama = "";
    $jenis_kelamin = "";
    $kelas = "";
    $ekstra = [];

    if (isset($_POST["submit"])) {
        // Validasi NIS
        $nis = isset($_POST['nis']) ? test_input($_POST['nis']) : '';
        if (empty($nis)) {
            $error_nis = "NIS harus diisi";
        } elseif (!preg_match("/^[0-9]{10}$/", $nis)) {
            $error_nis = "NIS harus terdiri dari 10 angka dan hanya boleh berisi angka 0-9";
        }

        // Validasi Nama
        $nama = isset($_POST['nama']) ? test_input($_POST['nama']) : '';
        if (empty($nama)) {
            $error_nama = "Nama harus diisi";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $error_nama = "Nama hanya dapat berisi huruf dan spasi";
        }

        // Validasi Jenis Kelamin
        $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
        if ($jenis_kelamin == '') {
            $error_jenis_kelamin = "Jenis kelamin harus diisi";
        }

        // Validasi Kelas
        $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '-1';
        if ($kelas == '-1') {
            $error_kelas = "Kelas harus dipilih";
        }

        // Validasi Ekstrakurikuler
        if ($kelas == "X" || $kelas == "XI") {
            $ekstra = isset($_POST['ekstra']) ? $_POST['ekstra'] : [];
            if (empty($ekstra)) {
                $error_ekstra = "Ekstrakurikuler wajib dipilih untuk kelas 10-11";
            } elseif (count($ekstra) < 1 || count($ekstra) > 3) {
                $error_ekstra = "Minimal 1 dan maksimal 3 ekstrakurikuler harus dipilih";
            }
        } elseif ($kelas == "XII") {
            $ekstra = isset($_POST['ekstra']) ? $_POST['ekstra'] : [];
            if (!empty($ekstra)) {
                $error_ekstra = "Siswa kelas XII tidak boleh mengikuti kegiatan ekstrakurikuler";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas3</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error { color: red; }
    </style>
    <script>
        function checkClass() {
            var kelas = document.getElementById("kelas").value;
            var ekstraSection = document.getElementById("ekstra-section");
            
            if (kelas === "XII") {
                ekstraSection.style.display = "none";
            } else {
                ekstraSection.style.display = "block";
            }
        }
    </script>
</head>
<body>
    <div class="container mt-4">
        <h1>Form Input Mahasiswa</h1>
        <form action="" method="POST" autocomplete="on">
            <div class="form-group">
                <label for="nis">NIS: </label>
                <input type="text" class="form-control" id="nis" name="nis" maxlength="10" placeholder="Masukkan Nomor Induk" 
                value="<?php echo htmlspecialchars($nis); ?>">
                <span class="error"><?php echo $error_nis; ?></span>
            </div>

            <div class="form-group">
                <label for="nama">Nama: </label>
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50" placeholder="Masukkan nama Anda"
                value="<?php echo htmlspecialchars($nama); ?>">
                <div class="error"><?php echo $error_nama; ?></div>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin: </label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria"
                    <?php if($jenis_kelamin == "pria") echo "checked"; ?>>
                    <label class="form-check-label">Pria</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita"
                    <?php if($jenis_kelamin == "wanita") echo "checked"; ?>>
                    <label class="form-check-label">Wanita</label>
                </div>
                <div class="error"><?php echo $error_jenis_kelamin; ?></div>
            </div>

            <div class="form-group">
                <label for="kelas">Kelas: </label>
                <select name="kelas" id="kelas" class="form-control" onchange="checkClass()">
                    <option value="-1" <?php if($kelas == '-1') echo 'selected'; ?>>--Pilih Kelas Anda--</option>
                    <option value="X" <?php if($kelas == "X") echo 'selected'; ?>>X (Sepuluh)</option>
                    <option value="XI" <?php if($kelas == "XI") echo 'selected'; ?>>XI (Sebelas)</option>
                    <option value="XII" <?php if($kelas == "XII") echo 'selected'; ?>>XII (Dua Belas)</option>
                </select>
                <div class="error"><?php echo $error_kelas; ?></div>
            </div>

            <div id="ekstra-section" class="form-group">
                <label>Ekstrakurikuler: </label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="ekstra[]" value="pramuka"
                    <?php if(in_array('pramuka', $ekstra)) echo "checked"; ?>>
                    <label class="form-check-label">Pramuka</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="ekstra[]" value="seni_tari"
                    <?php if(in_array('seni_tari', $ekstra)) echo "checked"; ?>>
                    <label class="form-check-label">Seni Tari</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="ekstra[]" value="sinematografi"
                    <?php if(in_array('sinematografi', $ekstra)) echo "checked"; ?>>
                    <label class="form-check-label">Sinematografi</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="ekstra[]" value="basket"
                    <?php if(in_array('basket', $ekstra)) echo "checked"; ?>>
                    <label class="form-check-label">Basket</label>
                </div>
                <div class="error"><?php echo $error_ekstra; ?></div>
            </div>

            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
    
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            checkClass();
        });
    </script>
</body>
</html>
