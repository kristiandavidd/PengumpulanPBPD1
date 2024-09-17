<!--Nama : Muhammad Naufal -->
<!--NIM : 24060120140157 -->
<!--Tanggal Pengerjaan : 17-09-2024 -->

<!DOCTYPE HTML>
<html>
    <head>
        <title>Form Input Siswa</title>
        <style>
            .border1, .border2{
                border: 1px solid black;
                width: 500px;
                padding: 20px;
                margin: 1px;
            }
            .border1{
                background-color: lightcyan;
            }
            .form-control{
                width: 500px;
            }
            .form-group{
                margin-bottom: 5px;
            }
            label{
                margin-bottom: 5px;
            }
            .btn-primary{
                width: 60px;
                height: 25px;
                border-color: white;
                background-color: dodgerblue;
                color: white;
            }
            .btn-danger{
                width: 60px;
                height: 25px;
                border-color: white;
                background-color: red;
                color: white;
            }
            
        </style>
    </head>
    <body>
        <p class="border1"> Form Input Siswa </p>
        <div class="border2">
            <?php
                if(isset($_POST['submit'])){
                    //validasi nis : nis tidak boleh kosong, hanya dapat berisi huruf dan spasi
                    $nis = test_input($_POST['nis']);
                    if(empty($nis)){
                        $error_nis = "NIS harus diisi";
                    }else if(!preg_match("/^[0-9]*$/", $nis)){
                        $error_nis = "NIS hanya boleh berisi angka";
                    }else if(strlen($nis) != 10){
                        $error_nis = "NIS harus terdiri atas 10 angka";
                    }
                    //validasi nama : tidak boleh kosong, format harus benar
                    $nama = test_input($_POST['nama']);
                    if($nama == ''){
                        $error_nama = "Nama harus diisi";
                    } elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)){
                        $error_nama = "Nama hanya boleh berisi huruf dan spasi";
                    }
                    //validasi jenis kelamin : tidak boleh kosong
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    if($jenis_kelamin == ''){
                        $error_jenis_kelamin = "Jenis kelamin harus diisi";
                    }
                    //validasi ekstrakurikuler : tidak boleh kosong
                    $ekstrakurikuler = $_POST['ekstrakurikuler'];
                    if($ekstrakurikuler == ''){
                        $error_ekstrakurikuler = "Ekstrakurikuler harus diisi";
                    } elseif(count($ekstrakurikuler) < 1 || count($ekstrakurikuler) > 3){
                        $error_ekstrakurikuler = "Hanya boleh memilih 1-3 ekstrakurikuler";
                    }
                }

                function test_input($data){
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
            ?>

            <form method="POST" autocomplete="on" action="">
                <div class="form-group">
                    <label for="nis">NIS:</label> <br>
                    <input type="text" class="form-control" id="nis" name="nis" value="<?php if(isset($nis)) {echo $nis;} ?>">
                    <div class="error"> <?php if(isset($error_nis)) echo $error_nis ?> </div>
                </div>
                <div class="form-group">
                    <label for="nama">Nama:</label> <br>
                    <input type="text" class="form-control" id="nama" name="nama">
                    <div class="error"> <?php if(isset($error_nama)) echo $error_nama ?> </div>
                </div>
                <label>Jenis Kelamin:</label> <br>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" 
                        <?php if(isset($jenis_kelamin) && $jenis_kelamin =="pria") echo "checked"; ?> >Pria 
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita"
                        <?php if(isset($jenis_kelamin) && $jenis_kelamin =="wanita") echo "checked"; ?> >Wanita 
                    </label>
                </div>
                <div class="error"> <?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin ?> </div>
                <br>
                <div class="form-group">
                    <label for="kelas">Kelas</label> <br>
                    <select id="kelas" name="kelas" class="form-control" onchange="exKelas()">
                        <option value="0" disabled selected>----</option>
                        <option value="X" <?php if(isset($kelas) && $kelas =="X") echo 'selected="true"'; ?>>X</option>
                        <option value="XI" <?php if(isset($kelas) && $kelas =="XI") echo 'selected="true"'; ?>>XI</option>
                        <option value="XII" <?php if(isset($kelas) && $kelas =="XII") echo 'selected="true"'; ?>>XII</option>
                    </select>
                    <div class="error"> <?php if(isset($error_kelas)) echo $error_kelas ?> </div>
                </div>
                
                <div id="ekstrakurikuler">
                    <label>Ekstrakurikuler:</label> <br>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="pramuka"
                            <?php if(isset($ekstrakurikuler) && in_array('pramuka',$ekstrakurikuler)) echo "checked"; ?> >Pramuka
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="seni_tari"
                            <?php if(isset($ekstrakurikuler) && in_array('seni_tari',$ekstrakurikuler)) echo "checked"; ?>>Seni Tari
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="sinematografi"
                            <?php if(isset($ekstrakurikuler) && in_array('sinematografi',$ekstrakurikuler)) echo "checked"; ?>>Sinematografi
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ekstrakurikuler[]" value="basket"
                            <?php if(isset($ekstrakurikuler) && in_array('basket',$ekstrakurikuler)) echo "checked"; ?>>Basket
                        </label>
                    </div>
                    <div class="error"> <?php if(isset($error_ekstrakurikuler)) echo $error_ekstrakurikuler ?> </div>
                    <br>
                </div>
                <!-- submit, reset, dan button -->
                <button type="submit" class="btn-primary" name="submit" value="submit">Submit</button>
                <button type="reset" class="btn-danger">Reset</button>

                
            </form>
        </div>
        <script> 
            function exKelas(){
                var x = document.getElementById('ekstrakurikuler');
                var y = document.getElementById('kelas');

                if(y.value == "XII"){
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
         </script>
    </body>
</html>