<!--
    Nama                : Zikry Alfahri Akram
    NIM                 : 24060122120033
    Tanggal Pengerjaan  : Kamis, 26 September 2024
    Nama File           : show_customer.php
-->

<?php include('../header.html') ?>
<div class="row w-50 mx-auto mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">Show Customer Data</div>
            <div class="card-body">
                <select name="customer" id="customer" class="form-select" onchange="showCustomer(this.value)">
                    <option value="">-- Select a Customer --</option>
                    <?php
                        require_once('../lib/db_login.php');

                        // Assign A Query
                        $query = "SELECT * FROM customers ORDER BY customerid";

                        // Execute the query
                        $result = $db->query($query);

                        if (!$result) { // Tampilkan pesan error jika query gagal dieksekusi
                            die("Could not query the database: <br>" . $db->error);
                        }

                        // Fetch and display the result
                        while ($row = $result->fetch_object()) {
                            echo '<option value="' . $row->customerid . '">' . $row->name . '</option>';
                        }

                        // Free the memory and close DB connection
                        $result->free();
                        $db->close();
                    ?>
                </select>
                <br>
                <div id="detail_customer"></div>
            </div>
        </div>
    </div>
</div>
<?php include('../footer.html') ?>