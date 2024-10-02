<!-- Nama       : Nashwan Adenaya -->
<!-- NIM        : 24060121130084 -->
<!-- Lab        : D1 -->
<!-- Tanggal    : 28 September 2024-->
<!-- Deskripsi  : membuat program berbasis PHP dengan bantuan AJAX-->

<?php include('./header.php'); ?>
<div class="row w-75 mx-auto text-center">
    <div class="col">
        <div class="card mt-5">
            <div class="card-header">Ajax Server Time</div>
            <div class="card-body">
                <div class="mb-4 h1" id="showtime"></div>
                <button class="btn btn-success" onclick="get_server_time()">Show Server Time</button>
                <br><br>
            </div>
        </div>
    </div>
</div>
<?php include('./footer.php'); ?>

