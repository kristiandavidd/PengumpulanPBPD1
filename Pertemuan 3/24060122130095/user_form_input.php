<!-- Nama  : Syariful Hanif Setiawan
NIM        : 24060122130095
Lab        : PBP D1 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <title>Form Input Siswa</title>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
  <style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>
<body class = " bg-gray-900 text-white">
<?php
  if(isset($_POST['submit'])) { 
    $nama = test_input($_POST['nama']);
    if(empty($nama)){
        $error_nama = "Nama harus diisi";
    } elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
        $error_nama = "Nama hanya dapat berisi huruf dan spasi";
    } 

    $nis = test_input($_POST['nis']);
    if(empty($nis)){
        $error_nis = "NIS harus diisi";
    } elseif (!preg_match('/^[0-9]{10}$/', $nis)) {
        $error_nis = "Format NIS salah";
    }

    $kelas = test_input($_POST['kelas']);
    if(empty($kelas)){
        $error_kelas = "Kelas harus diisi";
    }   
    if(!isset($_POST['jenis_kelamin'])){
        $error_jenis_kelamin = "Jenis kelamin harus diisi";
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




<div class = " bg-gray-800 flex flex-col items-center mx-auto my-5 py-4 space-y-3 rounded-lg w-full max-w-md">
    <form class="max-w-sm mx-auto" method="POST">
    <div class="mb-5">
        <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
        <input type="number" id="nis" name = "nis" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required value="<?php if(isset($nis)) {echo $nis;}?>"/>
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
            <?php if(isset($error_nis)) echo $error_nis?>
		</span>
    </div>
    <div class="mb-5">
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
        <input type="text" id="nama" name = "nama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required value="<?php if(isset($nama)) {echo $nama;}?>"/>
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
            <?php if(isset($error_nama)) echo $error_nama?>
		</span>
    </div>
    <div class = "mb-2">
        <fieldset>
        <label for="nama" class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
        <legend class="sr-only">Kelamin</legend>
        <div class="flex items-center mb-4">
            <input id="country-option-1" type="radio" name="jenis_kelamin" value="pria" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" <?php if(isset($jenis_kelamin) && $jenis_kelamin=="pria") {echo "checked";}?>>
            <label for="country-option-1" class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
            Pria
            </label>
        </div>

        <div class="flex items-center mb-4">
            <input id="country-option-2" type="radio" name="jenis_kelamin" value="wanita" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" <?php if(isset($jenis_kelamin) && $jenis_kelamin=="wanita") {echo "checked";}?>>
            <label for="country-option-2" class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Wanita
            </label>
        </div>
        </fieldset>
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
            <?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin?>
		</span>
    </div>
    <div class="mb-5" >
        <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
        <select id="kelas" name = "kelas" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
        <option value="X" <?php if(isset($kelas) && $kelas=="X") {echo 'selected="true"';}?>>X</option>
        <option value="XI" <?php if(isset($kelas) && $kelas=="XI") {echo 'selected="true"';}?>>XI</option>
        <option value="XII" <?php if(isset($kelas) && $kelas=="XII") {echo 'selected="true"';}?>>XII</option>
        </select>
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
            <?php if(isset($error_kelas)) echo $error_kelas?>
		</span>
    </div>
    <div class = "mb-5" id = "ekstrakurikuler-section">
        <label for="ekskul" class="block mb-3 text-sm font-medium text-gray-900 dark:text-white">Ekstrakurikuler</label>
        <fieldset>
        <legend class="sr-only">Checkbox variants</legend>

            <div class="flex items-center mb-4">
                <input id="checkbox-2" type="checkbox" value="Pramuka" name = "ekskul[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pramuka</label>
            </div>

            <div class="flex items-center mb-4">
                <input id="checkbox-2" type="checkbox" value="Seni Tari" name = "ekskul[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Seni Tari</label>
            </div>

            <div class="flex items-center mb-4">
                <input id="checkbox-2" type="checkbox" value="Sinematografi" name = "ekskul[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sinematografi</label>
            </div>

            <div class="flex items-center mb-4">
                <input id="checkbox-2" type="checkbox" value="Basket" name = "ekskul[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Basket</label>
            </div>
        </fieldset>
        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
            <?php if(isset($error_ekskul)) echo $error_ekskul?>
        </span>
    </div>

    <div class = "px-5 space-x-6">
        <button type="submit" value="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        <button type="reset" value = "Reset" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Reset</button>
    </div>
    
    </form>
</div>

</div>

<script>
    function toggleMinat() {
            var kelas = document.getElementById('kelas').value;
            var ekstrakurikulerSection = document.getElementById('ekstrakurikuler-section');

            if (kelas === 'XII') {
                console.log(kelas);
                ekstrakurikulerSection.style.display = 'none'; 
            } else {
                ekstrakurikulerSection.style.display = 'block'; 
            }
    }

    document.getElementById('kelas').addEventListener('change', toggleMinat);
</script>

<?php
    if(isset($_POST["submit"])) {
        echo '<div class = "bg-gray-800 flex flex-col items-center mx-auto my-5 py-4 space-y-3 rounded-lg w-full max-w-md">';
        echo '<h2 class = "font-bold text-lg mb-3">Your Input</h2>';
        echo "NIS: " . $_POST["nis"]. "<br/>";
        echo "Nama: " . $_POST["nama"]. "<br/>";
        if(!isset($_POST["jenis_kelamin"])) {
            echo "Jenis kelamin belum dipilih<br/>";
        } else {
            echo "Jenis kelamin: " . $_POST["jenis_kelamin"]. "<br/>";
        }
        echo "Kelas: " . $_POST["kelas"]. "<br/>";
        
        if ($kelas != 'XII') {
            if(!isset($_POST['ekskul']) || count($_POST['ekskul']) < 1 || count($_POST['ekskul']) > 3) {
                echo "Ekstrakurikuler belum dipilih";
            } else {
                echo "Ekstrakurikuler: ";
                foreach($_POST['ekskul'] as $ekskul) {
                    ($ekskul == end($_POST['ekskul'])) ? print($ekskul) : print($ekskul . ", ");
                }
            }
        }
        echo '</div>';
    }
?>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>