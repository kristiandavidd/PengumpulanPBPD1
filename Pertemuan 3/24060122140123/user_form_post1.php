<!-- 
 Nama               : Alya Safina
 NIM                : 24060122140123
 Tanggal pengerjaan : 17 September 2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form Post</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
// Validasi isi data yang dimasukkan ke form
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Aturan validasi isian form
if (isset($_POST["submit"])) {
    // Validasi nama
    $nama = test_input($_POST['nama']);
    if (empty($nama)) {
        $error_nama = "Nama harus diisi";
    } 
    elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $error_nama = "Nama hanya dapat berisi huruf dan spasi";
    }
    // Validasi email
    $email = test_input($_POST['email']);
    if (empty($email)) {
        $error_email = "Email harus diisi";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Format email tidak benar";
    }
    // Validasi alamat
    $alamat = test_input($_POST['alamat']);
    if (empty($alamat)) {
        $error_alamat = "Alamat harus diisi";
    }
    // Validasi jenis kelamin      
    if (!isset($_POST['jenis_kelamin'])) {
        $error_jenis_kelamin = "Jenis kelamin harus diisi";
    }
    // Validasi kota
    $kota = $_POST['kota'];
    if (empty($kota)) {
        $error_kota = "Kota harus diisi";
    }
    // Validasi minat
    $minat = isset($_POST['minat']) ? $_POST['minat'] : [];
    if (empty($minat)) {
        $error_minat = "Peminatan harus dipilih";
    }        
}
?>

<!-- Kolom input Form Mahasiswa -->
<div class="container mt-5">
    <div class="card">
        <div class="card-header">Form Mahasiswa</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
                    <!-- Menampilkan pesan error -->
                    <div class="text-danger"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email">
                    <!-- Menampilkan pesan error -->
                    <div class="text-danger"><?php if (isset($error_email)) echo $error_email; ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" id="alamat" name="alamat"></textarea>
                    <!-- Menampilkan pesan error -->
                    <div class="text-danger"><?php if (isset($error_alamat)) echo $error_alamat; ?></div>
                </div>
                <div class="form-group mb-3">
                    <label for="kota">Kota/Kabupaten:</label>
                    <select name="kota" id="kota" class="form-control">
                        <option value="semarang">Semarang</option>
                        <option value="jakarta">Jakarta</option>
                        <option value="bandung">Bandung</option>
                        <option value="surabaya">Surabaya</option>
                    </select>
                    <!-- Menampilkan pesan error -->
                    <div class="text-danger"><?php if (isset($error_kota)) echo $error_kota; ?></div>
                </div>
                <label>Jenis Kelamin:</label>
                <div class="form-check">
                    <input type="radio" name="jenis_kelamin" class="form-check-input" value="pria">
                    <label class="form-check-label">Pria</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="jenis_kelamin" class="form-check-input" value="wanita">
                    <label class="form-check-label">Wanita</label>
                </div>
                <!-- Menampilkan pesan error -->
                <div class="text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                <br>
                <label>Peminatan:</label>
                <div class="form-check">
                    <input type="checkbox" name="minat[]" class="form-check-input" value="coding">
                    <label class="form-check-label">Coding</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="minat[]" class="form-check-input" value="ux_design">
                    <label class="form-check-label">UX Design</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="minat[]" class="form-check-input" value="data_science">
                    <label class="form-check-label">Data Science</label>
                </div>
                <!-- Menampilkan pesan error -->
                <div class="text-danger"><?php if (isset($error_minat)) echo $error_minat; ?></div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>

             <!-- Menggunakan metode POST untuk membaca dan menampilkan isian yang dimasukkan ke form -->
            <?php 
            if (isset($_POST["submit"])) {
                echo "<h3>Your Input:</h3>";
                echo '<p>Nama: '.$_POST['nama'].'</p>';
                echo '<p>Email: '.$_POST['email'].'</p>';
                echo '<p>Kota: '.$_POST['kota'].'</p>';
                echo '<p>Jenis Kelamin: '.$_POST['jenis_kelamin'].'</p>';
                echo 'Minat = ';
                $minat = $_POST['minat'];
                if (!empty($minat)) {
                    echo "Peminatan yang dipilih: ";
                    foreach ($minat as $minat_item) {
                        echo '<br>'.$minat_item;
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
