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
    <title>User Form Get</title>
    <!-- Link Bootstrap CSS  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <!-- Kolom input Form Mahasiswa -->
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">Form Mahasiswa</div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php echo isset($_GET['nama']) ? $_GET['nama'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota/Kabupaten:</label>
                        <select name="kota" id="kota" class="form-control">
                            <option value="semarang" <?php if (isset($_GET['kota']) && $_GET['kota'] == "semarang") echo "selected"; ?>>Semarang</option>
                            <option value="jakarta" <?php if (isset($_GET['kota']) && $_GET['kota'] == "jakarta") echo "selected"; ?>>Jakarta</option>
                            <option value="bandung" <?php if (isset($_GET['kota']) && $_GET['kota'] == "bandung") echo "selected"; ?>>Bandung</option>
                            <option value="surabaya" <?php if (isset($_GET['kota']) && $_GET['kota'] == "surabaya") echo "selected"; ?>>Surabaya</option>
                        </select>
                    </div>
                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" name="jenis_kelamin" class="form-check-input" value="pria" <?php if (isset($_GET['jenis_kelamin']) && $_GET['jenis_kelamin'] == "pria") echo "checked"; ?>>
                            Pria
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" name="jenis_kelamin" class="form-check-input" value="wanita" <?php if (isset($_GET['jenis_kelamin']) && $_GET['jenis_kelamin'] == "wanita") echo "checked"; ?>>
                            Wanita
                        </label>
                    </div>
                    <br>
                    <label>Peminatan:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="minat[]" class="form-check-input" value="coding" <?php if (isset($_GET['minat']) && in_array("coding", $_GET['minat'])) echo "checked"; ?>>
                            Coding
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="minat[]" class="form-check-input" value="ux_design" <?php if (isset($_GET['minat']) && in_array("ux_design", $_GET['minat'])) echo "checked"; ?>>
                            UX Design
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="minat[]" class="form-check-input" value="data_science" <?php if (isset($_GET['minat']) && in_array("data_science", $_GET['minat'])) echo "checked"; ?>>
                            Data Science
                        </label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>

                <!-- Menggunakan metode GET untuk membaca dan menampilkan isian yang dimasukkan ke form -->
                <?php 
                if (isset($_GET["submit"])) {
                    echo "<h3>Your Input:</h3>";
                    echo '<p>Nama: '.$_GET['nama'].'</p>';
                    echo '<p>Email: '.$_GET['email'].'</p>';
                    echo '<p>Kota: '.$_GET['kota'].'</p>';
                    echo '<p>Jenis Kelamin: '.$_GET['jenis_kelamin'].'</p>';
                    echo 'Minat = '.implode(", ", $_GET['minat']).'<br>';
                    $minat = $_GET['minat'];
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
