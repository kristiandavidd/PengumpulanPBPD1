<!-- Nama   : Qun Alfadrian Setyowahyu Putro -->
<!-- NIM    : 24060122130072 -->
<!-- Tanggal: 17 September 2024 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="js/script.js"></script>
    <title>Formulir Ekstrakurikuler</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php 
        require "process.php";
     ?>

    <div class="card text-dark bg-light mx-auto my-4" style="width: 32rem;">
        <div class="card-header">
            <h5 class="card-title">Form Input Siswa</h5>
        </div>
        <div class="card-body">
            <form id="formInputSiswa" class="needs-validation" action="" method="post" novalidate>
                <div class="form-group mb-3">
                    <label for="nis" class="form-label">NIS:</label>
                    <input type="text" name="nis" id="nis" class="form-control" 
                    onkeypress="ValidateNIS(); return isNumberKey(event)" onchange="ValidateNIS()"
                    value="<?php if (isset($nis)) {echo $nis;} ?>" required>
                    <div id="nisEmpty" class="invalid-feedback">
                        NIS harus diisi.
                    </div>
                    <div id="nisInvalid" class="invalid-feedback">
                        NIS harus berupa angka dan memiliki 10 karakter.
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control" 
                    onkeypress="ValidateNama()" onchange="ValidateNama()"
                    value="<?php if (isset($nama)) {echo $nama;} ?>" required>
                    <div id="namaEmpty" class="invalid-feedback">
                        Nama harus diisi.
                    </div>
                    <div id="namaInvalid" class="invalid-feedback" style="display: block">
                        <?php if (isset($namaErr)) echo $namaErr; else echo ""; ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="mb-1" for="">Jenis Kelamin</label>
                    <div class="form-check mb-1">
                        <label class="form-check-label">
                            <input type="radio" id="radioPria" name="jenis_kelamin" 
                            class="form-check-input" value="pria"
                            <?php if (isset($jenisKelamin) && $jenisKelamin=="pria") {echo "checked";} ?>>
                            Pria
                        </label>
                    </div>
                    <div class="form-check mb-1">
                        <label class="form-check-label">
                            <input type="radio" id="radioWanita" name="jenis_kelamin" 
                            class="form-check-input" value="wanita"
                            <?php if (isset($jenisKelamin) && $jenisKelamin=="wanita") {echo "checked";} ?>>
                            Wanita
                        </label>
                    </div>
                    <div id="genderErr" class="invalid-feedback" style="display: block">
                        <?php if (isset($jenisKelaminErr)) echo $jenisKelaminErr; else echo ""; ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="kelas" class="form-label">Kelas:</label>
                    <select name="kelas" id="kelas" class="form-control" onchange="ValidateKelas()">
                        <option value="10">X</option>
                        <option value="11">XI</option>
                        <option value="12">XII</option>
                    </select>
                </div>
                <div id="ekstrakurikuler-group" class="form-group mb-3">
                    <label>Ekstrakurikuler</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="ekstrakurikuler[]" class="ekstrakurikuler form-check-input" 
                            value="pramuka" onchange="ValidateEkstrakurikuler()"
                            <?php if (isset($ekstrakurikuler) && in_array('pramuka', $ekstrakurikuler)) echo 'checked'; ?>>
                            Pramuka
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="ekstrakurikuler[]" class="ekstrakurikuler form-check-input" 
                            value="seni_tari" onchange="ValidateEkstrakurikuler()"
                            <?php if (isset($ekstrakurikuler) && in_array('seni_tari', $ekstrakurikuler)) echo 'checked'; ?>>
                            Seni Tari
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="ekstrakurikuler[]" class="ekstrakurikuler form-check-input" 
                            value="sinematografi" onchange="ValidateEkstrakurikuler()"
                            <?php if (isset($ekstrakurikuler) && in_array('sinematografi', $ekstrakurikuler)) echo 'checked'; ?>>
                            Sinematografi
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="ekstrakurikuler[]" class="ekstrakurikuler form-check-input" 
                            value="basket" onchange="ValidateEkstrakurikuler()"
                            <?php if (isset($ekstrakurikuler) && in_array('basket', $ekstrakurikuler)) echo 'checked'; ?>>
                            Basket
                        </label>
                    </div>
                    <div id="ekstrakurikulerMinErr" class="invalid-feedback">
                        Harus memilih setidaknya 1 Ekstrakurikuler.
                    </div>
                    <div id="ekstrakurikulerMaxErr" class="invalid-feedback">
                        Hanya boleh memilih paling banyak 3 Ekstrakurikuler.
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                <button type="reset" class="btn btn-danger" name="reset">Reset</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        echo    '<div id="outputCard" class="card text-dark bg-light mx-auto my-4" style="width: 32rem;">
                    <div class="card-header text-light bg-success">
                    <h5 class="card-title">Masukan Anda</h5>
                </div>
                <div class="card-body">
                    <div class="my-b3">
                        <h6>NIS</h6>
                        <p>'.$nis.'</p>
                    </div>
                    <div class="my-b3">
                        <h6>Nama</h6>
                        <p>'.$nama.'</p>
                    </div>
                    <div class="my-b3">
                        <h6>Jenis Kelamin</h6>
                        <p>'.$jenisKelamin.'</p>
                    </div>
                    <div class="my-b3">
                        <h6>Kelas</h6>
                        <p>'.$kelas.'</p>
                    </div>';
                
                    if (!empty($ekstrakurikuler)) {
                        echo '<div class="my-b3">
                            <h6>Ekstrakurikuler Dipilih</h6>';
                            foreach ($ekstrakurikuler as $item) {
                                echo $item;
                            }
                        echo '</div>';
                    }
        echo    '</div>
            </div>';
    }
    ?>
</body>
</html>