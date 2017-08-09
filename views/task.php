<div class="box-body"> 
  <div class="col-md-12">
  <ul id="nav" class="nav nav-tabs nav-justified">
  <?php  
         echo "
           <li role=presentation  >
            <a href='index.php?page=". base64_encode('task')."&ID=".base64_encode('cat_task')."'><i class='fa fa-list'></i><span> Kategori Task</span></a>
           </li>
           <li role=presentation  >
            <a href='index.php?page=". base64_encode('task')."&ID=".base64_encode('sub_cat_task')."'><i class='fa fa-list'></i><span> Sub Kategori Task</span></a>
           </li>
         ";

  ?>

  </ul>

  </div>
  <div class="content">
<?php
if (!isset($_SESSION)) {
session_start();
}
$username =$_SESSION['username'];
if(isset($username)){
  include"include/koneksi.php";
  $pages_dir = 'views/task';
        if(!empty($_GET['ID'])){
          $pages = scandir($pages_dir, 0);
          unset($pages[0], $pages[1]);
     
          $p = base64_decode($_GET['ID']);
          // $pecah = explode($key,$p);
          // $p2 = $pecah[0];
          if(in_array($p.'.php', $pages)){
            include($pages_dir.'/'.$p.'.php');
          } else {
            echo "Not Found";
          }
        } else {
          include($pages_dir.'/404.php');
        }
        
}else{
  echo"<script>alert('anda belum login');</script>";
}
?>

</div>
<script>
  
$(document).ready(function () {
     var url = window.location;
        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.nav a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script>