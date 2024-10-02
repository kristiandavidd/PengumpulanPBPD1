<!-- Nama : Muhammad Naufal Izzudin -->
<!-- Nim : 24060122120018 -->
<!-- Tanggal Pengerjaan : 25 September 2024 -->

<?php include("header.php") ?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">Add Customer Data</div>
            <div class="card-body">
                <form method="GET" autocomplete="on">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <textarea class="form-control" id="address" rows="3" name="address"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="city">City:</label>
                        <select name="city" id="city" class="form-control" required>
                            <option value="none">--Select a city--</option>
                            <option value="Airport West">Airport West</option>
                            <option value="Box Hill">Box Hill</option>
                            <option value="Yarraville">Yarraville</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="add_customer_get()">Add Customer (GET)</button>
                    <button type="button" class="btn btn-secondary" onclick="add_customer_post()">Add Customer (POST)</button>
                </form>
                <br>
                <div id="add_response"></div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php") ?>