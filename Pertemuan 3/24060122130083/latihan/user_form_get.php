<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- cdn tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Form Get</title>
</head>

<body class="bg-gray-100">
    <div class="bg-slate-600 mt-10 p-6 rounded-lg w-[40%] mx-auto">
        <h2 class="text-white text-xl mb-4">Form Get</h2>
        <form action="" method="GET" class="flex flex-col space-y-4">

            <!-- Nama -->
            <div class="form-group">
                <label for="nama" class="text-white">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md" maxlength="50">
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="text-white">Email:</label>
                <input type="email" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md" name="email" id="email">
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label for="alamat" class="text-white">Alamat:</label>
                <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
            </div>

            <!-- Kota/Kabupaten -->
            <div class="form-group">
                <label for="kota" class="text-white">Kota/Kabupaten</label>
                <select name="kota" id="kota" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="Semarang">Semarang</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Surabaya">Surabaya</option>
                </select>
            </div>

            <!-- Jenis Kelamin -->
            <label class="text-white">Jenis Kelamin</label>
            <div class="form-check">
                <label class="form-check-label text-white">
                    <input type="radio" class="form-check-input mr-2" name="jenis_kelamin" value="pria">Pria
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label text-white">
                    <input type="radio" class="form-check-input mr-2" name="jenis_kelamin" value="wanita">Wanita
                </label>
            </div>

            <!-- Peminatan -->
            <label class="text-white">Peminatan</label>
            <div class="form-check">
                <label class="form-check-label text-white">
                    <input type="checkbox" class="form-check-input mr-2" name="minat[]" value="Coding">Coding
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label text-white">
                    <input type="checkbox" class="form-check-input mr-2" name="minat[]" value="UX Design">UX Design
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label text-white">
                    <input type="checkbox" class="form-check-input mr-2" name="minat[]" value="Data Science">Data Science
                </label>
            </div>

            <!-- Submit dan Reset -->
            <br>
            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md" name="submit" value="submit">Submit</button>
                <button type="reset" class="bg-red-500 text-white px-4 py-2 rounded-md">Reset</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_GET["submit"])) {
        echo "<h3 class='text-slate-600 font-bold mt-6'>Your Input</h3>";
        echo "<p>NAMA: " . htmlspecialchars($_GET["nama"]) . "</p>";
        echo "<p>EMAIL: " . htmlspecialchars($_GET["email"]) . "</p>";
        echo "<p>ALAMAT: " . htmlspecialchars($_GET["alamat"]) . "</p>";
        echo "<p>KOTA: " . htmlspecialchars($_GET["kota"]) . "</p>";
        echo "<p>JENIS KELAMIN: " . htmlspecialchars($_GET["jenis_kelamin"]) . "</p>";
        
        // Validasi Peminatan
        if (isset($_GET["minat"])) {
            echo "<p>PEMINATAN YANG DIPILIH:</p>";
            foreach ($_GET["minat"] as $minat) {
                echo "<p>" . htmlspecialchars($minat) . "</p>";
            }
        } else {
            echo "<p>TIDAK ADA PEMINATAN YANG DIPILIH</p>";
        }
    }
    ?>
    <!-- PHP untuk menampilkan data -->
</body>

</html>
