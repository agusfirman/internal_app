
<div class="box-body">
	<div class="col-md-12">
	<ul id="nav" class="nav nav-tabs nav-justified">
	<?php 
	echo "
		<li><a href='index.php?page=". base64_encode('setoran_bank')."&form=". base64_encode('form-bca')." '>
			<i class='fa fa-money'></i> BCA</a></li>
		<li><a href='index.php?page=". base64_encode('setoran_bank')."&form=". base64_encode('form-cimb')." '>
				<i class='fa fa-money'></i> CIMB NIAGA</a></li>
		<li><a href='index.php?page=". base64_encode('setoran_bank')."&form=". base64_encode('form-cimb-old')." '>
				<i class='fa fa-money'></i> CIMB NIAGA OLD</a></li>
		<li><a href='index.php?page=". base64_encode('setoran_bank')."&form=". base64_encode('form-mandiri')." '>
				<i class='fa fa-money'></i> MANDIRI</a></li>

	"; ?>
      
    </ul>
    </div>
<div id="content">
		<?php 
		if (!isset($_SESSION)) {
		session_start();
		}
		$username =$_SESSION['username'];
		if(isset($username)){
			$pages_dir = 'views/setoran_bank';
						if(!empty($_GET['form'])){
							$pages = scandir($pages_dir, 0);
							unset($pages[0], $pages[1]);
				 
							$p = base64_decode($_GET['form']);
							// $pecah = explode($key,$p);
							// $p2 = $pecah[0];
							if(in_array($p.'.php', $pages)){
								include($pages_dir.'/'.$p.'.php');
							} else {
								echo "Not Found";
							}
						} else {
							include($pages_dir.'/form-bca.php');
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