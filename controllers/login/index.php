
<?php
    session_start();
$username =$_SESSION['username'];
$level =$_SESSION['level'];
if(isset($username)){
	header("location:../index.php");
}else{
include"views/login/login.php";
include"models/regis/regis.php";
} 
?>
<!-- <script src="assets/jQuery/jQuery-2.1.4.min.js"></script> -->
<script>
</script>
