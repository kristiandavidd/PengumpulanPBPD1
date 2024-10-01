<!-- Nama: Nashwan Adenaya -->
<!-- NIM: 24060122130084 -->
<!-- Tanggal Pengerjaan: 13 September 2024 -->

<?php
$errorMessages = [];
$nis = $nama = $jenis_kelamin = $kelas = $errorJk =  $errorNama =$errorNis = $errorEskul ='';
$eskul = [];

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Mengecek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['submit'])) {
    $nis = test_input($_POST['nis']) ;
    $nama = test_input($_POST['nama']) ;
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
    $kelas = $_POST['kelas'] ?? '';
    $eskul = $_POST['eskul'] ?? [];

    
    // Validasi NIS harus 10 karakter dan hanya angka
    if (!preg_match('/^[0-9]{10}$/', $nis)) {
      $errorMessages[] = $errorNis = "NIS harus 10 karakter dan hanya berisi angka.";
    }
    
    // Validasi Kelas X dan XI harus memilih minimal 1 eskul dan maksimal 3, kelas XII tidak perlu memilih
    if ($kelas === 'X' || $kelas === 'XI') {
      if (count($eskul) < 1 || count($eskul) > 3) {
        $errorMessages[] = $errorEskul = "Untuk kelas ". htmlspecialchars($kelas) .", Anda harus memilih minimal 1 ekstrakurikuler dan maksimal 3.";
      }
    }
    
    if (empty($nis) || empty($nama) || empty($jenis_kelamin) || empty($kelas)) {
        $errorMessages[] = "Semua field harus diisi.";
        if (empty($nis)) {
          $errorNis = "NIS harus diisi!";
        }
        if (empty($nama)) {
          $errorNama = "Nama harus diisi!";
        }
        if (empty($jenis_kelamin)) {
          $errorJk = "Pilih jenis kelamin!";
        }
        if (empty($kelas)) {
          $errorKelas = "Pilih kelas!";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Form Siswa</title>
  <style>
    #eskul {
      display: none;
    }
    .error{
      color:red;
    }

  </style>
  <script>
    function toggleEskul(){
      var kelas = document.getElementById('kelas');
      var eskul = document.getElementById('eskul');

      if (kelas.value === 'X' || kelas.value === 'XI'){
        eskul.style.display = 'block';
      }else{
        eskul.style.display = 'none';
      }

    }
    document.addEventListener('DOMContentLoaded', function() {
          var resetButton = document.querySelector('input[type="reset"]');

          resetButton.addEventListener('click', function(event) {
              event.preventDefault(); 
              var form = document.querySelector('form');
              form.reset(); 
              window.location.href = window.location.href; 
          });
      });
  </script>
</head>
<body onload="toggleEskul()">
  <div class="card m-5" >
    <?php if (!empty($errorMessages)): ?>
      <div class=" w-25 text-bg-danger ">
        <p class="my-auto mx-3">Pastikan semua format field sudah benar!</p>
      </div> 
    <?php endif; ?>
    <div class="card-header">
      Form Input Siswa
    </div>
    <div class="card-body">
      <form action="" method="POST" autocomplete="on">
        
        <div class="form-group mb-3">
          <label for="nis">NIS:</label>
          <input type="text" name="nis" class="form-control" id="nis" placeholder="Masukkan NIS" value="<?php if (isset($nis)) {echo $nis;} ?>">
          <div class="error"><?php if (isset($errorNis)) { echo $errorNis; }?></div>
        </div>
        
        <div class="form-group mb-3">
          <label for="nama">Nama:</label>
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" value="<?php if (isset($nama)){echo $nama;}?>">
          <div class="error"><?php if (isset($errorNama)) {echo $errorNama;}?></div>
        </div>
        
        <label>Jenis Kelamin:</label>
        <div class="error"><?php if (isset($errorJk)){echo $errorJk;}?></div>
        <div class="form-check ">
          <label class="form-check-label">
            <input type="radio"  class="form-check-input" name="jenis_kelamin" value="Pria" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "Pria"){echo "checked";}?>>Pria
          </label>
        </div>
        
        <div class="form-check mb-3">
          <label class="form-check-label">
            <input type="radio"  class="form-check-input" name="jenis_kelamin" value="Wanita" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "Wanita"){echo "checked";}?>>Wanita
          </label>
        </div>
        
        <div class="form-group mb-3">
          <label for="kelas">Kelas:</label>
          <div class="error"><?php if (isset($errorKelas)){echo $errorKelas;}?></div>
          <select name="kelas" id="kelas" class="form-select" onchange="toggleEskul()">
            <option value="" disabled selected value>-- Pilih Kelas --</option>
            <option value="X" <?php if (isset($kelas)&& $kelas == "X"){echo 'selected="true"';} ?>>X</option>
            <option value="XI" <?php if (isset($kelas)&& $kelas == "XI"){echo 'selected="true"';} ?>>XI</option>
            <option value="XII" <?php if (isset($kelas)&& $kelas == "XII"){echo 'selected="true"';} ?>>XII</option>
          </select>
        </div>
        
        <div id="eskul" class="mb-4">
          <label for="">Ekstrakulikuler:</label>
          <div class="error"><?php if (isset($errorEskul)){echo $errorEskul;}?></div>
          <div class="form-check">
            <label class="from-check-label">
              <input type="checkbox" class="form-check-input" name="eskul[]" value="Pramuka" <?php if (isset($eskul) && in_array('Pramuka',$eskul)){echo "checked";}?>>Pramuka
            </label>
          </div>
          <div class="form-check">
            <label class="from-check-label">
              <input type="checkbox" class="form-check-input" name="eskul[]" value="Seni Tari" <?php if (isset($eskul) && in_array('Seni Tari',$eskul)){echo "checked";}?>>Seni Tari
            </label>
          </div>
          <div class="form-check">
            <label class="from-check-label">
              <input type="checkbox" class="form-check-input" name="eskul[]" value="Sinematografi" <?php if (isset($eskul) && in_array('Sinematografi',$eskul)){echo "checked";}?>>Sinematorgrafi
            </label>
          </div>
          <div class="form-check">
            <label class="from-check-label">
              <input type="checkbox" class="form-check-input" name="eskul[]" value="Basket" <?php if (isset($eskul) && in_array('Basket',$eskul)){echo "checked";}?>>Basket
            </label>
          </div>
        </div>

        <input type="submit" class="btn btn-primary"></input>
        <input type="reset" class="btn btn-danger"></input>
      </form>
    </div>
  </div>

  <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errorMessages)): ?>
    <div class="card mx-5 mt-3">
      <div class="card-header">
      Info Siswa
      </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"> <strong>Nama:</strong> <?php echo $nama; ?> </li>
          <li class="list-group-item"> <strong>Nis:</strong> <?php echo $nis; ?> </li> 
          <li class="list-group-item"> <strong>Jenis Kelamin:</strong> <?php echo $jenis_kelamin; ?> </li>
          <li class="list-group-item"> <strong>Kelas:</strong> <?php echo $kelas; ?> </li>
          <?php if ($kelas === "XI" || $kelas === "X"): ?><li class="list-group-item"> <strong>Eskul:</strong> <?php echo implode(", ", $eskul); ?><?php endif; ?> </li> 
        </ul>
    </div>
  <?php endif; ?>
</body>
</html>