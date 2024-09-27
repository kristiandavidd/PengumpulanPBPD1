<!-- 
Nama          : Fendi Ardianto
NIM           : 24060122130077
Tgl Pembuatan : 24 September 2024
-->

<?php
// file         : destroy_session.php
// deskripsi    : untuk menghapus session cart

session_start();
if(isset($_SESSION['cart'])){
  unset($_SESSION['cart']);
}
?>
<script>
  alert('Cart has been cleared successfully');
  document.location.href='show_cart.php';
</script>