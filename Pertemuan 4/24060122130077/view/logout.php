<!-- 
Nama          : Fendi Ardianto
NIM           : 24060122130077
Tgl Pembuatan : 24 September 2024
-->

<?php
// file     : logout.php
// deskripsi: untuk logout (menghapus session yang dibuat saat login)

session_start();
if(isset($_SESSION['username'])){
  unset($_SESSION['username']);
  session_destroy();
}
header('Location: login.php');

?>