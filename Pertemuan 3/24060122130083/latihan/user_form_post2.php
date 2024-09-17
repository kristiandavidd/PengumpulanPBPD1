<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- cdn tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Form POST</title>
</head>
<body class="bg-gray-100">
    <div class="bg-slate-600 mt-10 p-6 rounded-lg w-[40%] mx-auto">
        <h2 class="text-white text-xl mb-4">Form Mahasiswa</h2>
        <form action="" method="POST" class="flex flex-col space-y-4">
            <!-- Nama -->
            <div class="form-group">
                <label for="nama" class="text-white">Nama:</label>
                <input type="text" name="nama" id="nama" class="w-full px-3 py-2 border border-gray-300 rounded-md" maxlength="50" value="<?php if (isset($nama)) { echo htmlspecialchars($nama); } ?>">
                <div class="text-red-400 mt-1"><?php if (isset($error_nama)) echo $error_nama; ?></div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="text-white">Email:</label>
                <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="<?php if (isset($email)) { echo htmlspecialchars($email); } ?>">
                <div class="text-red-400 mt-1"><?php if (isset($error_email)) echo $error_email; ?></div>
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label for="alamat" class="text-white">Alamat:</label>
                <textarea name="alamat" id="alamat" cols="30" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md"><?php if (isset($alamat)) { echo htmlspecialchars($alamat); } ?></textarea>
                <div class="text-red-400 mt-1"><?php if (isset($error_alamat)) echo $error_alamat; ?></div>
            </div>

            <!-- Kota/Kabupaten -->
            <div class="form-group">
                <label for="kota" class="text-white">Kota/Kabupaten</label>
                <select name="kota" id="kota" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="Semarang" <?php if (isset($kota) && $kota == "Semarang") echo 'selected'; ?>>Semarang</option>
                    <option value="Jakarta" <?php if (isset($kota) && $kota == "Jakarta") echo 'selected'; ?>>Jakarta</option>
                    <option value="Bandung" <?php if (isset($kota) && $kota == "Bandung") echo 'selected'; ?>>Bandung</option>
                    <option value="Surabaya" <?php if (isset($kota) && $kota == "Surabaya") echo 'selected'; ?>>Surabaya</option>
                </select>
                <div class="text-red-400 mt-1"><?php if (isset($error_kota)) echo $error_kota; ?></div>
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group">
                <label class="text-white">Jenis Kelamin</label>
                <div class="flex items-center space-x-4">
                    <label class="inline-flex items-center text-white">
                        <input type="radio" class="form-radio text-blue-500" name="jenis_kelamin" value="pria" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "pria") echo "checked"; ?>>
                        <span class="ml-2">Pria</span>
                    </label>
                    <label class="inline-flex items-center text-white">
                        <input type="radio" class="form-radio text-blue-500" name="jenis_kelamin" value="wanita" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "wanita") echo "checked"; ?>>
                        <span class="ml-2">Wanita</span>
                    </label>
                </div>
                <div class="text-red-400 mt-1"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
            </div>

            <!-- Peminatan -->
            <div class="form-group">
                <label class="text-white">Peminatan</label>
                <div class="flex flex-col space-y-2">
                    <label class="inline-flex items-center text-white">
                        <input type="checkbox" class="form-checkbox text-blue-500" name="minat[]" value="Coding" <?php if (isset($minat) && in_array("Coding", $minat)) echo 'checked'; ?>>
                        <span class="ml-2">Coding</span>
                    </label>
                    <label class="inline-flex items-center text-white">
                        <input type="checkbox" class="form-checkbox text-blue-500" name="minat[]" value="UX Design" <?php if (isset($minat) && in_array("UX Design", $minat)) echo 'checked'; ?>>
                        <span class="ml-2">UX Design</span>
                    </label>
                    <label class="inline-flex items-center text-white">
                        <input type="checkbox" class="form-checkbox text-blue-500" name="minat[]" value="Data Science" <?php if (isset($minat) && in_array("Data Science", $minat)) echo 'checked'; ?>>
                        <span class="ml-2">Data Science</span>
                    </label>
                </div>
                <div class="text-red-400 mt-1"><?php if (isset($error_minat)) echo $error_minat; ?></div>
            </div>

            <!-- Submit dan Reset -->
            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md" name="submit" value="submit">Submit</button>
                <button type="reset" class="bg-red-500 text-white px-4 py-2 rounded-md">Reset</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST["submit"]) && empty($error_nama) && empty($error_email) && empty($error_alamat) && empty($error_kota) && !isset($error_jenis_kelamin) && !isset($error_minat)) {
        echo "<div class='bg-slate-600 mt-10 p-6 rounded-lg w-[40%] mx-auto'>";
        echo "<h3 class='text-white text-xl mb-4'>Your Input</h3>";
        echo "<p class='text-white'>Nama: " . htmlspecialchars($_POST["nama"]) . "</p>";
        echo "<p class='text-white'>Email: " . htmlspecialchars($_POST["email"]) . "</p>";
        echo "<p class='text-white'>Alamat: " . htmlspecialchars($_POST["alamat"]) . "</p>";
        echo "<p class='text-white'>Kota: " . htmlspecialchars($_POST["kota"]) . "</p>";
        echo "<p class='text-white'>Jenis Kelamin: " . htmlspecialchars($_POST["jenis_kelamin"]) . "</p>";
        
        // Validasi Peminatan
        if (isset($_POST["minat"]) && !empty($_POST["minat"])) {
            echo "<p class='text-white'>Peminatan yang dipilih:</p>";
            foreach ($_POST["minat"] as $minat) {
                echo "<p class='text-white'>" . htmlspecialchars($minat) . "</p>";
            }
        } else {
            echo "<p class='text-white'>Tidak ada peminatan yang dipilih</p>";
        }
        echo "</div>";
    }
    ?>
</body>
</html>
