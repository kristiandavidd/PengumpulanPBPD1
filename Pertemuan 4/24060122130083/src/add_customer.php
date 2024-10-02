<?php
require_once('../lib/db_login.php');
if (isset($_POST["submit"])) {
    $valid = TRUE;
    $name = test_input($_POST['name']) ?? "";

    // Validasi terhadap field name
    if ($name == '') {
        $error_name = "Name is required";
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }

    // Validasi terhadap field address
    $address = test_input($_POST['address']);
    if ($address == '') {
        $error_address = "Address is required";
        $valid = FALSE;
    }

    // Validasi terhadap field city
    $city = $_POST['city'];
    if ($city == '' || $city == 'none') {
        $error_city = "City is required";
        $valid = FALSE;
    }

    // Insert data ke dalam database jika valid
    if ($valid) {
        $query = "INSERT INTO customers (name, address, city) VALUES (?, ?, ?)";

        // Persiapkan statement SQL
        $stmt = $db->prepare($query);
        if (!$stmt) {
            die("Gagal mempersiapkan statement: " . $db->error);
        }

        // Bind parameter ke placeholder
        $stmt->bind_param("sss", $name, $address, $city);

        // Eksekusi statement
        if ($stmt->execute()) {
            echo "Data berhasil dimasukkan.";
            $db->close();
            header('Location: view_customer.php');
        } else {
            echo "Gagal memasukkan data: " . $stmt->error;
        }
    }
}
?>

<?php include('../components/header.html') ?>

<div class="bg-gray-700 text-white min-h-screen p-6">
    <div class="p-4 bg-gray-100 text-black rounded-lg shadow-md">
        <div class="text-xl font-semibold mb-4">Add Customer Data</div>
        
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama:</label>
                <input type="text" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" value="">
                <?php if (isset($error_name)): ?>
                    <p class="text-red-500 text-xs italic mt-2"><?php echo $error_name; ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Address:</label>
                <textarea class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="address" id="address" rows="5"></textarea>
                <?php if (isset($error_address)): ?>
                    <p class="text-red-500 text-xs italic mt-2"><?php echo $error_address; ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="city">City:</label>
                <select name="city" id="city" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="none" <?php if (!isset($city)) echo 'selected'; ?>>--Select a city--</option>
                    <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo 'selected'; ?>>Airport West</option>
                    <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo 'selected'; ?>>Box Hill</option>
                    <option value="Yarraville" <?php if (isset($city) && $city == "Yarraville") echo 'selected'; ?>>Yarraville</option>
                </select>
                <?php if (isset($error_city)): ?>
                    <p class="text-red-500 text-xs italic mt-2"><?php echo $error_city; ?></p>
                <?php endif; ?>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600" name="submit" value="submit">
                    Submit
                </button>
                <a href="view_customer.php" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 ml-4">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>


<?php
$db->close();
?>
