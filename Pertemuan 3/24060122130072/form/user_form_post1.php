<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="js/script.js"></script>
    <title>Form</title>
</head>
<body>
    <?php 
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if (isset($_POST['submit'])) {
            //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
            $nama = test_input($_POST['nama']);
            if (empty($nama)) {
                $error_nama = "Nama harus diisi";
            } elseif (!preg_match("/^[a-zA-Z]*$/", $nama)) {
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }
            //validasi email: tidak boleh kosong, format harus benar
            $email = test_input($_POST['email']);
            if ($email == '') {
                $error_email = "Email harus diisi";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = "Format email tidak benar";
            }
            //validasi alamat: tidak boleh kosong
            if (test_input($_POST['alamat']) == '') {
                $error_alamat = "Alamat harus diisi";
            } else {
                $alamat = test_input($_POST['alamat']);
            }
            //validasijenis kelamin tidak boleh kosong
            if ($_POST['jenis_kelamin'] == '') {
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            } else {
                $jenis_kelamin = test_input($_POST['jenis_kelamin']);
            }
            //validasi kota: tidak boleh kosong
            if ($_POST['kota'] == '' || $_POST['kota'] == 'kota') {
                $error_kota = "Kota harus diisi";
            } else {
                $kota = test_input($_POST['kota']);
            }
            //validasi minat: tidak boleh kosong
            if (empty($_POST['minat'])) {
                $error_minat = "Peminatan harus dipilih";
            } else {
                $minat = $_POST['minat'];
            }
        }
     ?>

    <div class="card w-50 mx-auto my-4 px-4 py-4">
    <form action="" method="post">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="kota">Kota/Kabupaten:</label>
            <select name="kota" id="kota" class="form-control">
                <option value="semarang">Semarang</option>
                <option value="jakarta">Jakarta</option>
                <option value="bandung">Bandung</option>
                <option value="surabaya">Surabaya</option>
            </select>
        </div>
        <label>Jenis Kelamin</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" name="jenis_kelamin" class="form-check-input" value="pria">
                Pria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" name="jenis_kelamin" class="form-check-input" value="wanita">
                Wanita
            </label>
        </div>
        <br>
        <label>Peminatan:</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" name="minat[]" class="form-check-input" value="coding">
                Coding
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" name="minat[]" class="form-check-input" value="ux_design">
                UX Design
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" name="minat[]" class="form-check-input" value="data_science">
                Data Science
            </label>
        </div>
        <br>
        <!-- Submit, reset button -->
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        <button type="reset" class="btn btn-danger">reset</button>
    </form>
    <br>
    <div class="card w-100 mx-auto px-4 py-4">
    <?php 
        if (isset($_POST["submit"])) {
            echo "<h3>Your Input:</h3>";
            echo 'Nama = '.$_POST['nama'].'<br>';
            echo 'Email = '.$_POST['email'].'<br>';
            echo 'Kota = '.$_POST['kota'].'<br>';
            echo 'Jenis Kelamin = '.$_POST['jenis_kelamin'].'<br>';

            $minat = $_POST['minat'];
            if (!empty($minat)) {
                echo "peminatan yang dipilih: ";
                foreach ($minat as $minat_item) {
                    echo '<br>'.$minat_item;
                }
            }
        }
    ?>
    </div>
    </div>

    <br>
    <div class="mx-auto" style="text-align: center;">
        <a href="index.php" class="">Back</a>
    </div>

</body>
</html>