<!-- 
    Nama File   : logout.php
    Deskripsi   : logout
    Pembuat     : Rachmad Rifa'i / 24060122120014
    Tanggal     : 18 September 2024
-->

<?php
session_start();
if (isset($_SESSION["username"])){
    unset($_SESSION["username"]);
    session_destroy();
}
header("Location: login.php")
?>