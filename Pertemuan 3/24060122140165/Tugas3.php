<!-- Nama : Farrel Ardana Jati -->
<!-- NIM : 24060122140165 -->
<!-- Tanggal Pengerjaan : 15 September 20024 -->
<?php

//Validasi Input
if (isset($_POST['submit'])) {
     

  $nis = test_input($_POST['nis']);
  if (empty($nis)) {
      $error_nis = "NIS harus diisi";
  } elseif (!preg_match("/^[0-9]{10}$/", $nis)) {
      $error_nis = "NIS harus terdiri dari tepat 10 angka";
  }



  //validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi  
  $nama = test_input($_POST['nama']);
  if (empty($nama)) {
      $error_nama = "Nama harus diisi";
  } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
      $error_nama = "Nama hanya dapat berisi huruf dan spasi";
  }


  //validasi jenis kelamin: tidak boleh kosong
  if (!isset($_POST['jenis_kelamin'])) {
    $error_jenis_kelamin = "Jenis kelamin harus diisi";
  }
  //validasi kelas: tidak boleh kosong
  if (!isset($_POST['kelas'])) {
    $error_kelas = "kelas harus diisi";
  }
  //validasi ekstra: tidak boleh kosong
  if (isset($_POST['kelas']) && ($_POST['kelas'] == 'X' || $_POST['kelas'] == 'XI')) {
    if (!isset($_POST['ekstra'])) {
      $error_ekstra = "Anda harus memilih minimal 1 ekstrakurikuler";
    } elseif (count($_POST['ekstra']) > 3) {
      $error_ekstra = "Anda hanya boleh memilih maksimal 3 ekstrakurikuler";
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


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tugas3</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
  <script>
  function toggleekstra() {
    var kelas = document.getElementById("kelas").value;
    var ekstra = document.getElementById("ekstra");

    // Jika kelas X atau XI, tampilkan form ekstrakurikuler
    if (kelas === "X" || kelas === "XI") {
      ekstra.style.display = "block";
    } else {
    // Jika kelas bukan X atau XI, sembunyikan form ekstrakurikuler dan kosongkan checkbox yang dipilih
      ekstra.style.display = "none";
    
      // Hapus semua centang pada checkbox ekstrakurikuler
      var checkboxes = document.querySelectorAll('input[name="ekstra[]"]');
      checkboxes.forEach(function(checkbox) {
        checkbox.checked = false; // Kosongkan setiap checkbox yang terpilih
      });
    }
  }
  </script>

  
</head>
<body onload="toggleekstra()">

 
  <div class="container"><br/>
    <div class="card">
      <div class="card-header">Form Input Siswa</div>
      <div class="card-body">
        <form method="POST" autocomplete="on" action="">

            <!-- FORM NIS -->
          <div class="form-group">
                <label for="nis">NIS:</label>
                <input type="text" class="form-control" id="nis" name="nis" value="<?= (isset($_POST['nis'])) ? $_POST['nis'] : '' ?>">
                <div class="error text-danger"><?= isset($error_nis) ? $error_nis:'' ?>
          </div>
          
            <!-- FORM NAMA -->
          <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if (isset($_POST['nama'])) echo $_POST['nama'] ?>">
            <div class="error text-danger"><?php if (isset($error_nama)) echo $error_nama; ?></div>
          </div>
         
          <!-- FORM KELAS -->
          <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select id="kelas" name="kelas" class="form-control" onchange="toggleekstra()">
              <option value="" selected disabled>-- Pilih Kelas --</option>
              <option value="X" <?= isset($_POST['kelas']) && $_POST['kelas'] == 'X' ? 'selected' : '' ?>>X</option>
              <option value="XI" <?= isset($_POST['kelas']) && $_POST['kelas'] == 'XI' ? 'selected' : '' ?>>XI</option>
              <option value="XII" <?= isset($_POST['kelas']) && $_POST['kelas'] == 'XII' ? 'selected' : '' ?>>XII</option>
            </select>
            <div class="text-danger"><?= isset($error_kelas) ? $error_kelas : '' ?></div>
          </div>

            <!-- FORM JENIS KELAMIN -->
          <label>Jenis Kelamin:</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'pria') echo 'checked' ?> name="jenis_kelamin" value="pria">Pria
            </label>
            <div class="error text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'wanita') echo 'checked' ?> name="jenis_kelamin" value="pria">Wanita
            </label>
            <div class="error text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
          </div>
          <br>


            <!-- FORM EKSTRA KURIKULER -->
            <div id="ekstra" style="display:none;">
            <label>Ekstrakurikuler:</label>
            <label>Ekstrakurikuler:</label>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="ekstra[]" value="Pramuka" <?= isset($_POST['ekstra']) && in_array('Pramuka', $_POST['ekstra']) ? 'checked' : '' ?>> Pramuka
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="ekstra[]" value="Seni Tari" <?= isset($_POST['ekstra']) && in_array('Seni Tari', $_POST['ekstra']) ? 'checked' : '' ?>> Seni Tari
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="ekstra[]" value="Sinematografi" <?= isset($_POST['ekstra']) && in_array('Sinematografi', $_POST['ekstra']) ? 'checked' : '' ?>> Sinematografi
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="ekstra[]" value="Basket" <?= isset($_POST['ekstra']) && in_array('Basket', $_POST['ekstra']) ? 'checked' : '' ?>> Basket
            </div>
              <div class="text-danger"><?= isset($error_ekstra) ? $error_ekstra : '' ?></div>
            </div>
            
          

          <!-- SUBMIT AND RESET -->
          <button type="submit" class="btn btn-primary" name="submit" value="submit">submit
          </button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </form>
      </div>

      <?php
      if (isset($_POST['submit']) && empty($error_nis) && empty($error_nama) && empty($error_jenis_kelamin) && empty($error_kelas) && empty($error_ekstra)) {
        echo "<h3>Your Input:</h3>";
        echo "NIS: " . $_POST['nis'] . "<br>";
        echo "Nama: " . $_POST['nama'] . "<br>";
        echo "Kelas: " . $_POST['kelas'] . "<br>";
        echo "Jenis Kelamin: " . $_POST['jenis_kelamin'] . "<br>";

        if (isset($_POST['ekstra'])) {
          echo "Ekstra yang dipilih: <br>";
          foreach ($_POST['ekstra'] as $ekstra_item) {
            echo "- " . $ekstra_item . "<br>";
          }
        }
      }
      ?>  
</body>
</html>