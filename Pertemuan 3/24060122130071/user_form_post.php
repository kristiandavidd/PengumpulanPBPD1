<!--Nama  : Muthia Zhafira Sahnah -->
<!-- NIM  :  24060122130071-->
<!-- Tanggal  Pengerjaan : 16 September 2024-->
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Form Pengguna</title>
</head>
<body>
    <!-- form dimulai di sini -->
    <!-- fungsi autocomplete:
    1.  Menghemat waktu: Memungkinkan pengguna untuk mengisi formulir lebih cepat dengan memanfaatkan data
    yang pernah diinput sebelumnya, seperti nama, email, alamat, dan informasi lain.
    2. Meningkatkan pengalaman pengguna: Pengguna tidak perlu mengetikkan ulang data yang sama berulang-ulang. -->
    <form action="" autocomplete="on" method="POST"> 
        <div class="form-group"> 
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat lengkap"></textarea>
        </div>
        <div class="form-group">
            <label for="kota">Kota/Kabupaten:</label>
            <select id="kota" name="kota" class="form-control">
                <option value="Semarang">Semarang</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Bandung">Bandung</option>
                <option value="Surabaya">Surabaya</option>
            </select>
        </div>
        <div>Jenis Kelamin:</div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita
            </label>
        </div>
        <br>
        <label>Peminatan:</label>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="coding">Coding
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design">UX Design
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data Science
            </label>
        </div>

        <!-- submit, reset dan button -->
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>

    <!-- PHP Logic -->
    <?php
        if (isset($_POST["submit"])){
            echo "<h3>Your Input:</h3>";
            echo 'Nama = ' . $_POST['nama'] . '<br />';
            echo 'Email = ' . $_POST['email'] . '<br />';
            echo 'Kota = ' . $_POST['kota'] . '<br />';
            echo 'Jenis Kelamin = ' . $_POST['jenis_kelamin'] . '<br />';
            
            if (!empty($_POST['minat'])) {
                echo 'Minat: <br />';
                $minat = $_POST['minat'];
                foreach($minat as $minat_item) {
                    echo '- ' . $minat_item . '<br />';
                }
            } else {
                echo 'Tidak ada minat yang dipilih.<br />';
            }
        }
    ?>

</body>
</html>

<!-- kalo misalnya pake get dia bakalan ngirim data pake URL!>
