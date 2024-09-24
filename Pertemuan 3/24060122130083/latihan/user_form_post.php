<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Form POST</title>
    <style>
        .error { color: #FF0000; }
    </style>
</head>
<body class="bg-gray-100">

<div class="bg-slate-600 mt-10 p-6 rounded-lg w-[40%] mx-auto">
    <h2 class="text-white text-xl mb-4">Form POST</h2>

    <form action="" autocomplete="on" method="POST" class="flex flex-col space-y-4">
        <!-- Nama -->
        <div class="form-group">
            <label for="nama" class="text-white">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md" maxlength="50" value="<?php if (isset($_POST['nama'])) echo htmlspecialchars($_POST['nama']); ?>">
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email" class="text-white">Email:</label>
            <input type="email" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md" name="email" id="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
        </div>

        <!-- Alamat -->
        <div class="form-group">
            <label for="alamat" class="text-white">Alamat:</label>
            <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md"><?php if (isset($_POST['alamat'])) echo htmlspecialchars($_POST['alamat']); ?></textarea>
        </div>

        <!-- Kota/Kabupaten -->
        <div class="form-group">
            <label for="kota" class="text-white">Kota/Kabupaten</label>
            <select name="kota" id="kota" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md">
                <option value="Semarang" <?php if (isset($_POST['kota']) && $_POST['kota'] == 'Semarang') echo 'selected'; ?>>Semarang</option>
                <option value="Jakarta" <?php if (isset($_POST['kota']) && $_POST['kota'] == 'Jakarta') echo 'selected'; ?>>Jakarta</option>
                <option value="Bandung" <?php if (isset($_POST['kota']) && $_POST['kota'] == 'Bandung') echo 'selected'; ?>>Bandung</option>
                <option value="Surabaya" <?php if (isset($_POST['kota']) && $_POST['kota'] == 'Surabaya') echo 'selected'; ?>>Surabaya</option>
            </select>
        </div>

        <!-- Jenis Kelamin -->
        <label class="text-white">Jenis Kelamin</label>
        <div class="form-check">
            <label class="form-check-label text-white">
                <input type="radio" class="form-check-input mr-2" name="jenis_kelamin" value="pria" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'pria') echo 'checked'; ?>>Pria
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label text-white">
                <input type="radio" class="form-check-input mr-2" name="jenis_kelamin" value="wanita" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'wanita') echo 'checked'; ?>>Wanita
            </label>
        </div>

        <!-- Peminatan -->
        <label class="text-white">Peminatan</label>
        <div class="form-check">
            <label class="form-check-label text-white">
                <input type="checkbox" class="form-check-input mr-2" name="minat[]" value="Coding" <?php if (isset($_POST['minat']) && in_array('Coding', $_POST['minat'])) echo 'checked'; ?>>Coding
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label text-white">
                <input type="checkbox" class="form-check-input mr-2" name="minat[]" value="UX Design" <?php if (isset($_POST['minat']) && in_array('UX Design', $_POST['minat'])) echo 'checked'; ?>>UX Design
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label text-white">
                <input type="checkbox" class="form-check-input mr-2" name="minat[]" value="Data Science" <?php if (isset($_POST['minat']) && in_array('Data Science', $_POST['minat'])) echo 'checked'; ?>>Data Science
            </label>
        </div>

        <!-- Submit dan Reset -->
        <div class="flex space-x-4 mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md" name="submit" value="submit">Submit</button>
            <button type="reset" class="bg-red-500 text-white px-4 py-2 rounded-md">Reset</button>
        </div>
    </form>

    <!-- PHP untuk menampilkan data -->
    <?php
    if (isset($_POST["submit"])) {
        echo "<h3 class='text-white font-bold mt-6'>Your Input</h3>";
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
    }
    ?>
</div>

</body>
</html>
