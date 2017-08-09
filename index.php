<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>ITS-RSIA Grand Family</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style-pic.css">
    <link rel="stylesheet" href="assets/css/jquerysctipttop.css">
    <link rel="stylesheet" href="assets/datepicker/datepicker3.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-clockpicker.css" />
    <link rel="stylesheet" href="assets/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/skins/_all-skins.min.css">
    <!--untuk slideshow-->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-image-gallery.css">
    <link rel="stylesheet" href="assets/css/buttons.dataTables.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]

    ////ambil url cdn
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
-->
<script src="assets/jQuery/jQuery-2.1.4.min.js"></script>
<script src="assets/datatables/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/buttons.flash.min.js"></script>
<script src="assets/js/jszip.min.js"></script>
<script src="assets/js/pdfmake.min.js"></script>
<script src="assets/js/vfs_fonts.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>
<script src="assets/js/buttons.print.min.js"></script>

</head>
  <body class="hold-transition skin-blue sidebar-mini skin-yellow-light">

  <?php
  include"include/koneksi.php";
     if (!isset($_SESSION)) {
        session_start();
      }
    $username   =$_SESSION['username'];
    $level      =$_SESSION['level'];
    $jkel       =$_SESSION['jkel'];

    if(isset($username)){
        $page = $_GET['page'];
        $p            = base64_decode($_GET['page']);
        if(empty($page)){
          $judul_page   = "" ;
        }else{
          $judul_page   = $p;
        }

    if($jkel =="L"){
      $pic = "assets/img/avatar5.png";
    }else if($jkel =="P"){
       $pic = "assets/img/avatar2.png";
    }
     ?>
    <div class="wrapper">
      <!-- header logo: style can be found in header.less -->
      <header class="main-header">
       <?php
        include"header.php";
        ?>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <?php
        include"side-menu.php";
         ?>
      </aside>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1><?php echo ucfirst($judul_page); ?>
          </h1>
          <ol class="breadcrumb navbar-left">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><?php echo ucfirst($judul_page); ?></a></li>
            <li class="active"></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
            <?php
              include"content.php";
             ?>
             <br/>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer" style="position: fixed;">
       <?php
       include"footer.php";
        ?>
      </footer>
    </div><!-- ./wrapper -->
<?php
}else{
include"controllers/login/index.php";
}
?>
<!-- jQuery 2.1.4
    <script src="assets/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>-->
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DataTables -->
    <script src="assets/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/datatables/dataTables.bootstrap.min.js"></script>
    <script src="assets/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-clockpicker.js"></script>
    <!-- SlimScroll -->
    <script src="assets/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="assets/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/js/demo.js"></script>
    <script src="assets/js/jquery.blueimp-gallery.min.js"></script>
    <script src="assets/js/bootstrap-image-gallery.js"></script>


    <!-- page script -->
    <script type="text/javascript" src="assets/js/aplikasi.js"></script>
<!--
<script type="text/javascript" src="assets/jQuery/jqzoom.js"></script>
<script type="text/javascript">
$("#bzoom").zoom({
  zoom_area_width: 350,
    autoplay_interval :3000,
    small_thumbs : 6,
    autoplay : false
});
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function(){
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();


</script> -->

  </body>
</html>
