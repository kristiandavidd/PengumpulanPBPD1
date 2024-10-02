<!-- 
Nama : Ardy Hasan Rona Akhmad
NIM : 24060122130053
Tanggal : 2 Oktober 2024
Lab : PBP D1
Tugas Pertemuan 5
-->

<!--File: show_server_time.html
Deskripsi menampilkan waktu server dengan ajax
-->
<?php include('../header.html'); ?><br>
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

<!-- <div class="card">
<div class="card-header">Ajax Server Time</div>
<div class="card-body">
<button class="btn btn-success" onclick="get_server_time()">Show Server Time
</button>
<br><br>
<div id="showtime"></div>
</div>
</div> -->
<?php include('../footer.html'); ?><br>