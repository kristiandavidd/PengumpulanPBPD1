<!-- 
    Nama File   : show_server_time.php
    Deskripsi   : menampilkan waktu server
    Pembuat     : Rachmad Rifa'i / 24060122120014
    Tanggal     : 25 September 2024
-->

<?php include("header.html");?><br>
<div class="card">
    <div class="card-header">Ajax Server Time</div>
    <div class="card-body">
        <button class="btn btn-success" onclick="get_server_time()">Show Server Time</button>
        <br><br>
        <div id="showtime"></div>
        
    </div>
</div>
<?php include("footer.html");?><br>