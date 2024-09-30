<!-- 
    Nama File   : user_form_post1.php
    Deskripsi   : form post
    Pembuat     : Rachmad Rifa'i / 24060122120014
    Tanggal     : 11 September 2024
-->

<!DOCTYPE html>
<html>
    <head>
        <title>User Form Get</title>
    </head>
    <body>
    <?php
        if (isset($_POST['submit'])) {
            // Validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
            $nama = test_input($_POST['nama']);
            if (empty($nama)) {
                $error_nama = "Nama harus diisi";
            } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                $error_nama = "Nama hanya dapat berisi huruf dan spasi";
            }

            // Validasi email: tidak boleh kosong, format harus benar
            $email = test_input($_POST['email']);
            if ($email == '') {
                $error_email = "Email harus diisi";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = "Format email tidak benar";
            }

            // Validasi alamat: tidak boleh kosong
            $alamat = test_input($_POST['alamat']);
            if ($alamat == '') {
                $error_alamat = "Alamat harus diisi";
            }

            // Validasi jenis kelamin: tidak boleh kosong
            $jenis_kelamin = $_POST['jenis_kelamin'];
            if($jenis_kelamin == '') {
                $error_jenis_kelamin = "Jenis kelamin harus diisi";
            }

            // Validasi kota: tidak boleh kosong
            $kota = $_POST['kota'];
            if ($kota == '' || $kota == 'kota') {
                $error_kota = "Kota harus diisi";
            }

            // Validasi minat: tidak boleh kosong
            $minat = $_POST['minat'];
            if (empty($minat)) {
                $error_minat = "Peminatan harus dipilih";
            }
        
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>




        <form method="POST" autocomplete="on" action="">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?php if(isset($nama)) {echo $nama;}?>">
                <div class="error"><?php if(isset($error_nama)) echo $error_nama;?></div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value='<?php if(isset($email)) {echo $email;}?>'>
                <div class="error"><?php if(isset($error_email)) echo $error_email;?></div>
            </div>
            <div>
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" class="form-control"><?php if(isset($alamat)) {echo $alamat;}?></textarea>
                <div class="error"><?php if(isset($error_alamat)) echo $error_alamat;?></div>
            </div>
            <div class="form-group">
                <label for="kota">Kota/Kabupaten</label>
                <select id="kota" name="kota" class="form-control">
                    <option value="Semarang" <?php if(isset($kota) && $kota=="Semarang") echo 'selected="true"';?>>Semarang</option>
                    <option value="Jakarta" <?php if(isset($kota) && $kota=="Jakarta") echo 'selected="true"';?>>Jakarta</option>
                    <option value="Bandung" <?php if(isset($kota) && $kota=="Bandung") echo 'selected="true"';?>>Bandung</option>
                    <option value="Surabaya <?php if(isset($kota) && $kota=="Surabaya") echo 'selected="true"';?>">Surabaya</option>
                </select>  
                <div class="error"><?php if(isset($error_kota)) echo $error_kota;?></div>
            </div>
            <label>Jenis Kelamin:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if(isset($jenis_kelamin) && $kota=="pria") echo 'checked';?>>Pria
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if(isset($jenis_kelamin) && $kota=="wanita") echo 'checked';?>>Wanita
                </label>
                <div class="error"><?php if(isset($error_jenis_kelamin)) echo $error_jenis_kelamin;?></div>
            </div>
            <br>
            <label>Peminatan:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="minat[]" value="coding" <?php if(isset($minat) && in_array('coding', $minat)) echo 'checked';?>>Coding
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design" <?php if(isset($minat) && in_array('ux_design', $minat)) echo 'checked';?>>UX Design
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="minat[]" value="data_science" <?php if(isset($minat) && in_array('data_science', $minat)) echo 'checked';?>>Data Science
                </label>
            </div>
            <div class="error"><?php if(isset($error_minat)) echo $error_minat;?></div>
            <br>
            <!-- submit, reset dan button -->
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>

        <?php
            if (isset($_POST["submit"]) ){
                echo"<h3>Your Input:</h3>";
                echo 'Nama = ' .$_POST['nama']. '<br />';
                echo 'Email = ' .$_POST['email']. '<br />';
                echo 'Kota = ' .$_POST['kota']. '<br />';
                echo 'Jenis Kelamin = ' .$_POST['jenis_kelamin']. '<br />';
                echo 'Minat = '.$_POST['minat'].'<br />';

                $minat = $_POST['minat'];
                if (!empty($minat)){
                    echo 'Peminatan yang dipilih: ';
                    foreach ($minat as $minat_item) {
                        echo '<br />'.$minat_item;
                    }
                }
            }  
        ?>
    </body>
</html>