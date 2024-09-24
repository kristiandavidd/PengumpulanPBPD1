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
    <!-- Kolom input Form Mahasiswa -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Form Mahasiswa</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota/Kabupaten:</label>
                        <select name="kota" id="kota" class="form-select">
                            <option value="semarang">Semarang</option>
                            <option value="jakarta">Jakarta</option>
                            <option value="bandung">Bandung</option>
                            <option value="surabaya">Surabaya</option>
                        </select>
                    </div>
                    <label class="form-label">Jenis Kelamin:</label>
                    <div class="form-check">
                        <input type="radio" name="jenis_kelamin" class="form-check-input" value="pria" id="pria">
                        <label class="form-check-label" for="pria">Pria</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="radio" name="jenis_kelamin" class="form-check-input" value="wanita" id="wanita">
                        <label class="form-check-label" for="wanita">Wanita</label>
                    </div>

                    <label class="form-label">Peminatan:</label>
                    <div class="form-check">
                        <input type="checkbox" name="minat[]" class="form-check-input" value="coding" id="coding">
                        <label class="form-check-label" for="coding">Coding</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="minat[]" class="form-check-input" value="ux_design" id="ux_design">
                        <label class="form-check-label" for="ux_design">UX Design</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" name="minat[]" class="form-check-input" value="data_science" id="data_science">
                        <label class="form-check-label" for="data_science">Data Science</label>
                    </div>

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
                    echo 'Minat = '.implode(", ", $_POST['minat']).'<br>';
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
