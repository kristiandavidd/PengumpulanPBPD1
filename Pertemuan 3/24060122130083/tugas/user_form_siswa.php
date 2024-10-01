<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Form Input Siswa</title>
    <style>
        .error { color: #FF0000; }
    </style>
</head>
<body class="bg-gray-100">

<?php
  if(isset($_POST['submit'])) {
    $nama = test_input($_POST['nama']);
    if(empty($nama)){
        $error_nama = "Nama harus diisi";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
        $error_nama = "Nama hanya dapat berisi huruf dan spasi";
    } 

    $nis = test_input($_POST['nis']);
    if(empty($nis)){
        $error_nis = "NIS harus diisi";
    }
    elseif (!preg_match('/^[0-9]{10}$/', $nis)) {
        $error_nis = "Format NIS salah";
    }

    if(!isset($_POST['jenis_kelamin'])){
        $error_jenis_kelamin = "Jenis kelamin harus diisi";
    }
    $kelas = test_input($_POST['kelas']);
    if(empty($kelas)){
        $error_kelas = "Kelas harus diisi";
    }   
    if ($kelas != 'XII') {
        if(!isset($_POST['ekskul']) || count($_POST['ekskul']) < 1 || count($_POST['ekskul']) > 3) {
            $error_ekskul = "Pilih 1-3 ekstrakurikuler";
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

<div class="bg-gray-700 mt-10 p-6 rounded-lg w-[30%] mx-auto">
    <h2 class="text-white text-center font-semibold text-xl mb-4">Form Input Siswa</h2>

    <form action="" autocomplete="on" method="POST" class="flex flex-col space-y-4">

        <div class="form-group">
            <label for="nis" class="text-white">NIS :</label>
            <input type="number" name="nis" id="nis" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md" minlength="10" maxlength="10" value="<?php if(isset($nis)) {echo $nis;}?>">
            <div class="error"><?php if(isset($error_nis)) echo $error_nis?></div>
        </div>

        <div class="form-group">
            <label for="nama" class="text-white">Nama :</label>
            <input type="text" name="nama" id="nama" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md" maxlength="50" value="<?php if(isset($nama)) {echo $nama;}?>">
            <div class="error"><?php if(isset($error_nama)) echo $error_nama?></div>
        </div>

        <label class="text-white">Jenis Kelamin</label>
        <div class="form-check">
            <label class="form-check-label text-white">
                <input type="radio" class="form-check-input mr-2" name="jenis_kelamin" value="pria" <?php if(isset($jenis_kelamin) && $jenis_kelamin=="pria") {echo "checked";}?>>Pria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label text-white">
                <input type="radio" class="form-check-input mr-2" name="jenis_kelamin" value="wanita" <?php if(isset($jenis_kelamin) && $jenis_kelamin=="wanita") {echo "checked";}?>>Wanita
            </label>
        </div>
        <div class="error"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin?></div>

        <div class="form-group">
            <label for="kelas" class="text-white">Kelas</label>
            <select name="kelas" id="kelas" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md" onchange="toggleEkstrakurikuler()">
                <option value="X" <?php if(isset($kelas) && $kelas=="X") {echo 'selected="true"';}?>>X</option>
                <option value="XI" <?php if(isset($kelas) && $kelas=="XI") {echo 'selected="true"';}?>>XI</option>
                <option value="XII" <?php if(isset($kelas) && $kelas=="XII") {echo 'selected="true"';}?>>XII</option>
            </select>
            <div class="error"><?php if(isset($error_kelas)) echo $error_kelas?></div>
        </div>

        <div id="ekstrakurikuler">
            <label class="text-white">Ekstrakurikuler</label>
            <div class="form-check">
                <label class="form-check-label text-white">
                    <input type="checkbox" class="form-check-input mr-2" name="ekskul[]" value="Pramuka">Pramuka
                </label>
            </div>
            
            <div class="form-check">
                <label class="form-check-label text-white">
                    <input type="checkbox" class="form-check-input mr-2" name="ekskul[]" value="Seni Tari">Seni Tari
                </label>
            </div>
            
            <div class="form-check">
                <label class="form-check-label text-white">
                    <input type="checkbox" class="form-check-input mr-2" name="ekskul[]" value="Sinematografi">Sinematografi
                </label>
            </div>
            
            <div class="form-check">
                <label class="form-check-label text-white">
                    <input type="checkbox" class="form-check-input mr-2" name="ekskul[]" value="Basket">Basket
                </label>
                <div class="error"><?php if(isset($error_ekskul)) echo $error_ekskul?></div>
            </div>
        </div>

        <br>
        <!-- submit, reset buttons -->
        <div class="flex justify-center space-x-4">
            <button type="submit" class="bg-blue-500 text-white w-40 py-2 rounded-md" name="submit" value="submit">Submit</button>
            <button type="reset" class="bg-red-500 text-white w-40 py-2 rounded-md">Reset</button>
        </div>

    </form>

    <?php
    if(isset($_POST["submit"])) {
        echo "<div class='mt-6 bg-gray-200 p-4 rounded-md shadow-md'>";
        echo "<h3 class='text-lg font-semibold mb-2'>Your Input</h3>";
        echo "<p><strong>NIS:</strong> " . $_POST["nis"]. "</p>";
        echo "<p><strong>Nama:</strong> " . $_POST["nama"]. "</p>";
        if(!isset($_POST["jenis_kelamin"])) {
            echo "<p>Jenis kelamin belum dipilih</p>";
        } else {
            echo "<p><strong>Jenis kelamin:</strong> " . $_POST["jenis_kelamin"]. "</p>";
        }
        echo "<p><strong>Kelas:</strong> " . $_POST["kelas"]. "</p>";
        
        if ($kelas != 'XII') {
            if(!isset($_POST['ekskul']) || count($_POST['ekskul']) < 1 || count($_POST['ekskul']) > 3) {
                echo "<p>Ekstrakurikuler belum dipilih</p>";
            } else {
                echo "<p><strong>Ekstrakurikuler:</strong> ";
                foreach($_POST['ekskul'] as $ekskul) {
                    echo $ekskul . ", ";
                }
                echo "</p>";
            }
        }
        echo "</div>";
    }
    ?>
</div>

<script>
function toggleEkstrakurikuler() {
    var kelasSelect = document.getElementById("kelas");
    var ekstrakurikulerDiv = document.getElementById("ekstrakurikuler");
    
    if (kelasSelect.value == "XII") {
        ekstrakurikulerDiv.style.display = "none";
    } else {
        ekstrakurikulerDiv.style.display = "block";
    }
}
</script>

</body>
</html>
