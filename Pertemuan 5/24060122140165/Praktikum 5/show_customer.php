<!-- File         : show_customer.php -->
<!-- Deskripsi    : menampilkan data customers -->
<?php include('./header.php') ?>
<br>
<div class="card">
    <div class="card-header">Show Customers Data</div>
    <div class="card-body">

        <select name="customer" id="customer" class="form-control" onchange="showCustomer(this.value)">
            <option value="">--Select a Customer--</option>
            <?php
            require_once('./db_login.php'); // Menghubungkan ke database

            // Menyusun query untuk mengambil data customers
            $query = "SELECT * FROM customers ORDER BY customerid";
            $result = $db->query($query);

            // Mengecek apakah query berhasil dijalankan
            if (!$result) {
                die("Could not query the database: <br />" . $db->error);
            }

            // Mengambil dan menampilkan data dari hasil query
            while ($row = $result->fetch_object()) {
                echo '<option value="' . $row->customerid . '">' . $row->name . '</option>';
            }

            // Membersihkan memori dan menutup koneksi
            $result->free();
            $db->close();
            ?>
        </select>

        <br>
        <!-- Div ini digunakan untuk menampilkan detail customer yang dipilih -->
        <div id="detail_customer"></div>

    </div>
</div>
<br>
<?php include('./footer.php') ?>
