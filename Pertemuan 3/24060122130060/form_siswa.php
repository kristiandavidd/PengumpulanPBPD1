

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
        
    </style>
    <?php
    $niserr = $namaerr = $jekelerr = $kelaserr = $ekstraerr = "";
    $nis = $nama = $jekel = $kelas = "";
    $ekstra = [];
    $submit = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $submit = true;
        //Validasi NIS
        if(empty($_POST['nis'])){
            $niserr = "NIS harus diisi";
        } else if (!preg_match("/^[0-9]{10}$/", $_POST['nis'])){
            $niserr = "NIS harus diisi dengan 10 angka";
        } else {
            $nis = resetInput($_POST['nis']);
        }

        //Validasi nama
        if(empty($_POST['nama'])){
            $namaerr = "Nama harus diisi";
        } else {
            $nama = resetInput($_POST['nama']);
        }

        //Validasi Jekel
        if(empty($_POST['jekel'])){
            $jekelerr = "Jenis kelamin harus diisi";
        } else {
            $jekel = resetInput($_POST["jekel"]);
        }

        //Validasi Kelas
        if(empty($_POST['kelas'])){
            $kelaserr = "Kelas Harus Dipilih";
        } else {
            $kelas = resetInput($_POST['kelas']);
        }

        //Validasi Ekstra
        if ($_POST['kelas'] != "XII"){
            if (empty($_POST['ekskul'])){
                $ekstraerr = "Pilih minimal 1 Ekstrakurikuler";
            } else if (count($_POST['ekskul']) > 3){
                $ekstraerr = "Pilihlah maksimal 3 pilihan";
            } else {
                $ekstra = $_POST['ekskul'];
            }
        }

        if(empty($niserr) && empty($namaerr) & empty($jekelerr) && empty($kelaserr) && empty($ekstraerr)){
            echo "<script>alert('Form Berhasil di Submit!')</script>";
            echo "<script>window.location.href = window.location.href</script>";
        }
    }

    function resetInput($data){
        return htmlspecialchars(stripslashes(trim($data)));
    }
    ?>
    <div>
        <h2>Form Input Siswa</h2>
    </div>
    <form action="" method="post">
        <div class="form-group">
            <label for = "nis">NIS : </label>
            <input type="text" class ="form-control" id="nis" name="nis" placeholder="Masukkan NIS" value="<?php echo $nis;?>">
            <br>
            <?php if($submit && !empty($niserr)): ?>
                <span class="error">* <?php echo $niserr;?></span>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for = "nama">Nama : </label>
            <input type="text" class ="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?php echo $nama;?>">
            <br>
            <?php if($submit && !empty($namaerr)): ?>
                <span class="error">* <?php echo $namaerr;?></span>
            <?php endif; ?>
        </div>
        <label>Jenis Kelamin</label>
        <br>
        <input type="radio" name="jenis_kelamin" class="form-check-input" value="Pria" <?php if (isset($jekel) && $jekel=="Pria") echo "checked";?>>Pria
        <br>
        <input type="radio" name="jenis_kelamin" class="form-check-input" value="Wanita" <?php if (isset($jekel) && $jekel=="Wanita") echo "checked";?>>Wanita
        <br>
        <?php if($submit && !empty($jekelerr)): ?>
            <span class="error">* <?php echo $jekelerr;?></span>
        <?php endif; ?>
        <div class="form-group">
            <label for="kelas">Kelas :</label>
            <select name="kelas" id="kelas" class="form-control">
                <option value="">--- Pilih Kelas ---</option>
                <option value="x"<?php if($kelas == "X") echo "selected";?>>X</option>
                <option value="xi"<?php if($kelas == "XI") echo "selected";?>>XI</option>
                <option value="xii" <?php if($kelas == "XII") echo "selected";?>>XII</option>
            </select>
            <br>
            <?php if($submit && !empty($kelaserr)): ?>
            <span class="error">* <?php echo $kelaserr;?></span>
        <?php endif; ?>
        </div>
        <br>
        <div id="ekstra">
            <label>Ekstrakurikuler : </label>
            <div class="form-check">
            <label class="form-check-label">
            <input type="checkbox" name="ekskul[]" class="form-check-input" value="Pramuka" <?php if(in_array("Pramuka", $ekstra)) echo "checked";?>>
                Pramuka
            </label>
            <br>
            <label class="form-check-label">
                <input type="checkbox" name="ekskul[]" class="form-check-input" value="seni_tari" <?php if(in_array("Seni Tari", $ekstra)) echo "checked";?>>
                Seni Tari
            </label>
            <br>
            <label class="form-check-label">
                <input type="checkbox" name="ekskul[]" class="form-check-input" value="sinematografi" <?php if(in_array("Sinematografi", $ekstra)) echo "checked";?>>
                    Sinematografi
            </label>
            <br>
            <label class="form-check-label">
                <input type="checkbox" name="ekskul[]" class="form-check-input" value="basket" <?php if(in_array("Basket", $ekstra)) echo "checked";?>>
                Basket
            </label>
            <br>
            <?php if($submit && !empty($ekstraerr)): ?>
            <span class="error">* <?php echo $ekstraerr;?></span>
        <?php endif; ?>
        </div>
        <br>
        <!--Submit reset button-->
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        <button type="reset" class="btn btn-danger" onclick = "resetForm()">Reset</button>
    </form>

    <script>
        function Ekstra(){
            let kelas = document.getElementById("kelas").value;
            let ekskul = document.getElementById("ekstra");

            if (kelas === "XII"){
                ekskul.style.display = "none";
            } else {
                ekskul.style.display = "block";
            }
        }

        document.querySelector('input[type="reset"]).addEventListener('click', function() {
            Ekstra();    
        }, 0);

        Ekstra();   
    </script>
</body>
</html>