<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Form Pengguna</title>
</head>
<body>

    <!-- form dimulai di sini -->
    <form action="" method="GET"> 
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
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
        if (isset($_GET["submit"])){
            echo "<h3>Your Input:</h3>";
            echo 'Nama = ' . $_GET['nama'] . '<br />';
            echo 'Email = ' . $_GET['email'] . '<br />';
            echo 'Kota = ' . $_GET['kota'] . '<br />';
            echo 'Jenis Kelamin = ' . $_GET['jenis_kelamin'] . '<br />';
            
            if (!empty($_GET['minat'])) {
                echo 'Minat: <br />';
                $minat = $_GET['minat'];
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
