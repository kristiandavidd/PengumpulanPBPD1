<!-- 
    Nama : Alfonso Clement Sutantio
    NIM : 24060122130080
    Tanggal : 27/09/2024
    File : show_server_time.php
 -->

<?php include('pertemuan5/header.php'); ?>
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
<?php include('pertemuan5/footer.php'); ?>

