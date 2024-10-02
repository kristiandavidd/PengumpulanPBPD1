
<!-- Deskripsi  : membuat program berbasis PHP dengan bantuan AJAX-->

<?php include('./header.php') ?>

<div class="row w-50 mx-auto mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">Search Judul Buku</div>
            <div class="card-body">
                <form action="" method="GET" class="mb-4">
                    <input type="text" id="search" placeholder="Cari Judul Buku Di Sini ^^" class="px-3 py-2">
                </form>
                <div id="searchResult"></div>
            </div>
        </div>
    </div>
</div>

<?php include('./footer.php') ?>