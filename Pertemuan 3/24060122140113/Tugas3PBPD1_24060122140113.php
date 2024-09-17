<!-- Nama/ NIM : Bima Aditya Aryono / 24060122140113
Tanggal Dibuat : Minggu, 15 September 2024
Deskripsi : Form pengisian Siswa SMA dengan input NIS, Nama, Jenis Kelamin, Kelas, dan Ekstrakurikuler dengan syarat validasi tertentu -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h1 class="text-center mb-4">Form Input</h1>
                
                <?php
                    if(isset($_POST["submit"])){

                        // validasi NIS
                        $nis = test_input($_POST['nis']);
                        if(empty($nis)){
                            $error_nis = "NIS harus diisi";
                        }
                        elseif(!preg_match("/^[0-9]{10}$/", $nis)){
                            $error_nis = "NIS terdiri atas 10 karakter dan hanya boleh berisi angka 0..9.";
                        }

                        // validasi nama : tidak boleh kosong, hanya dapat berisi huruf dan spasi
                        $nama = test_input($_POST['nama']);
                        if(empty($nama)){
                            $error_nama = "Nama harus diisi";
                        }
                        elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST["nama"])) {
                            $error_nama .= "Nama hanya boleh berisi huruf dan spasi.";
                        }

                        // validasi jenis kelamin
                        if(empty($_POST['jenis_kelamin'])){
                            $error_jenis_kelamin = "Jenis Kelamin harus diisi";
                        }

                        // validasi kelas
                        if(empty($_POST['kelas'])){
                            $error_kelas = "Kelas harus dipilih";
                        }

                        // validasi ekstrakurikuler
                        if((isset($_POST['kelas']) && ($_POST['kelas'] == "X" || $_POST['kelas'] == "XI")) && empty($_POST['minat'])){
                            $error_ekstrakurikuler = "Minimal satu ekstrakurikuler harus dipilih";
                        }
                    }

                    function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                ?>

                <form action="" method="POST" autocomplete="on" onsubmit="return validateForm(event)">
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS:</label>
                        <input type="text" class="form-control" id="nis" name="nis" maxlength="10" >
                        <div class="error" id="error_nis"><?php if (isset($error_nis)) echo $error_nis;?></div>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
                        <div class="error" id="error_nama"><?php if (isset($error_nama)) echo $error_nama;?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">
                            <label class="form-check-label">Pria</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" >
                            <label class="form-check-label">Wanita</label>
                        </div>
                        <div class="error" id="error_jenis_kelamin"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>
                    </div>

                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas:</label>
                        <select id="kelas" name="kelas" class="form-select" onchange="updateEkstrakurikuler()">
                            <option value="">Pilih Kelas</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                        <div class="error" id="error_kelas"><?php if (isset($error_kelas)) echo $error_kelas;?></div>
                    </div>

                    <div id="ekstrakurikuler" style="display:none;">
                        <label>Ekstrakurikuler:</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="pramuka" >
                            <label class="form-check-label">Pramuka</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="seni tari" >
                            <label class="form-check-label">Seni Tari</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="sinematografi" >
                            <label class="form-check-label">Sinematografi</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="minat[]" value="basket">
                            <label class="form-check-label">Basket</label>
                        </div>
                        <div class="error" id="error_ekstrakurikuler"><?php if (isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler; ?></div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>

                <!-- JavaScript Validasi -->
                <script>
                    function validateForm(event) {
                        let isValid = true;
                        
                        document.getElementById("error_nis").innerText = "";
                        document.getElementById("error_nama").innerText = "";
                        document.getElementById("error_jenis_kelamin").innerText = "";
                        document.getElementById("error_kelas").innerText = "";
                        document.getElementById("error_ekstrakurikuler").innerText = "";

                        // Validasi NIS
                        let nisError = document.getElementById("error_nis").innerText;
                        if (nisError) {
                            document.getElementById("error_nis").innerText = nisError;
                            isValid = false;
                        }

                        // Validasi Nama
                        let namaError = document.getElementById("error_nama").innerText;
                        if (namaError) {
                            document.getElementById("error_nama").innerText = namaError;
                            isValid = false;
                        }

                        // Validasi Jenis Kelamin
                        let jenisKelaminError = document.getElementById("error_jenis_kelamin").innerText;
                        if (jenisKelaminError) {
                            document.getElementById("error_jenis_kelamin").innerText = jenisKelaminError;
                            isValid = false;
                        }

                        // Validasi Kelas
                        let kelasError = document.getElementById("error_kelas").innerText;
                        if (kelasError) {
                            document.getElementById("error_kelas").innerText = kelasError;
                            isValid = false;
                        }

                        // Validasi Ekstrakurikuler
                        let ekstrakurikulerError = document.getElementById("error_ekstrakurikuler").innerText;
                        if (ekstrakurikulerError) {
                            document.getElementById("error_ekstrakurikuler").innerText = ekstrakurikulerError;
                            isValid = false;
                        }

                        if (!isValid) {
                            event.preventDefault();  // Mencegah pengiriman form jika tidak valid
                        }
                    }


                    function updateEkstrakurikuler() {
                        let kelas = document.getElementById("kelas").value;
                        let ekstraDiv = document.getElementById("ekstrakurikuler");

                        if (kelas === "X" || kelas === "XI") {
                            ekstraDiv.style.display = "block";  // Tampilkan opsi ekstrakurikuler
                        } else {
                            ekstraDiv.style.display = "none";  // Sembunyikan opsi ekstrakurikuler
                        }
                    }

                    // Panggil updateEkstrakurikuler saat halaman dimuat untuk menampilkan ekstrakurikuler jika diperlukan
                    document.addEventListener("DOMContentLoaded", updateEkstrakurikuler);
                </script>

                <?php           
                    if (isset($_POST['submit'])) {
                        // Cek apakah tidak ada error
                        if (!isset($error_nis) && !isset($error_nama) && !isset($error_jenis_kelamin) && !isset($error_kelas) && !isset($error_ekstrakurikuler)) {
                            echo "<h3 class='mt-4'>Your input:</h3>";
                            echo 'Nama = '.htmlspecialchars($_POST['nama']).'<br />';
                            echo 'NIS = '.htmlspecialchars($_POST['nis']).'<br />';
                            echo 'Kelas = '.htmlspecialchars($_POST['kelas']).'<br />';
                            echo 'Jenis Kelamin = '.htmlspecialchars($_POST['jenis_kelamin']).'<br />';
                            // Hanya cek minat jika kelas bukan XII
                            if ($_POST['kelas'] != "XII") {
                                if (!empty($_POST['minat'])) {
                                    echo "Minat Ekstrakurikuler: ";
                                    foreach ($_POST['minat'] as $item) {
                                        echo htmlspecialchars($item).", ";
                                    }
                                }
                            } else {
                                echo "Tidak ada ekstrakurikuler.";
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
