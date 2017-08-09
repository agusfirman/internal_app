<?php
session_start();
 if(isset($_SESSION['username']) ){
session_destroy();
header('location:index.php');
//echo"<script>alert('Terima Kasih Telah Berpatisaipasi');document.location.href='index.php';</script>";
}
?>