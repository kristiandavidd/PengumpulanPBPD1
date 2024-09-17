<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>


    <div class="card w-50 mx-auto my-4 px-4 py-4">
    <form action="" method="get">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
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
    <?php 
        if (isset($_GET["submit"])) {
            echo "<h3>Your Input:</h3>";
            echo 'Nama = '.$_GET['nama'].'<br>';
            echo 'Email = '.$_GET['email'].'<br>';
            echo 'Kota = '.$_GET['kota'].'<br>';
            echo 'Jenis Kelamin = '.$_GET['jenis_kelamin'].'<br>';

            $minat = $_GET['minat'];
            if (!empty($minat)) {
                echo "peminatan yang dipilih: ";
                foreach ($minat as $minat_item) {
                    echo '<br>'.$minat_item;
                }
            }
        }
    ?>
    </div>
    
    <br>
    <div class="mx-auto" style="text-align: center;">
        <a href="index.php" class="">Back</a>
    </div>

</body>
</html>