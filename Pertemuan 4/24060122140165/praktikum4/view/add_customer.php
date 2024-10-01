<!-- Nama : Farrel Ardana Jati -->
<!-- Nim : 24060122140165 -->
<!-- Tanggal Pengerjaan : 21 September 2024 -->
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="card mt-4">
        <div class="card-body">
            <h2>Add Customer Data</h2>

            <?php
            require_once('../lib/db_login.php');

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $city = $_POST['city'];

                // Insert data customer baru
                $query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";
                $result = $db->query($query);

                if ($result) {
                    echo "<div class='alert alert-success'>Customer added successfully!</div>";
                    header("Location: view_customer.php");
                } else {
                    echo "<div class='alert alert-danger'>Failed to add customer.</div>";
                }
            }

            $db->close();
            ?>

            <!-- Form Tambah Customer -->
            <form action="add_customer.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City:</label>
                    <input type="text" class="form-control" name="city" id="city" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Add Customer</button>
                <a href="view_customer2.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>
