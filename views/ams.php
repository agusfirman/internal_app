<div class="box-body">
  <div class="col-md-12">
    <ul id="nav" class="nav nav-tabs nav-justified">
  <?php  
         echo "
           <li role=presentation  >
            <a href='index.php?page=". base64_encode('ams')."&ID=".base64_encode('printer')."'><i class='fa fa-user'></i><span> Perawatan Printer</span></a>
           </li>
           <li role=presentation  >
            <a href='index.php?page=". base64_encode('ams')."&ID=".base64_encode('pc')."'><i class='fa fa-users'></i><span> Perawatan PC</span></a>
           </li>
           <li role=presentation  >
            <a href='index.php?page=". base64_encode('ams')."&ID=".base64_encode('p_brang_it')."'><i class='fa fa-users'></i><span> Peminjaman Barang IT</span></a>
           </li>
         ";
    ?>
    </ul>
  </div>
  <div id="content">
  <?php
  if (!isset($_SESSION)) {
  session_start();
  }
  $username =$_SESSION['username'];
  //echo $username;
  if(isset($username)){
    include"include/koneksi.php";
    $pages_dir = 'views/ams';
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
