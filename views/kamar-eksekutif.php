<!--untuk slideshow-->
<link href="assets/css/amazon_scroller.css" rel="stylesheet" type="text/css"></link>
<script type="text/javascript" src="assets/js/amazon_scroller.js"></script>
<!---untuk zoom image-->
<script type="text/javascript" src="assets/js/jquery.bigPicture.js"></script> 
<script type="text/javascript" src="assets/js/jquer.bigPicture-min.js"></script> 
<script type="text/javascript" src="assets/js/jquery.bigPicture-pack.js"></script> 
<script type="text/javascript" src="assets/js/jquery.easing.js"></script>  
<link rel="stylesheet" type="text/css" href="assets/css/core.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/skin.css"/> 
<script language="javascript" type="text/javascript">

	$(function() {
		$("#amazon_scroller1").amazon_scroller({
			scroller_title_show: 'enable',
			scroller_time_interval: '4000',
			scroller_window_background_color: "#CCC",
			scroller_window_padding: '5',
			scroller_border_size: '0',
			scroller_border_color: '#000',
			scroller_images_width: '320',
			scroller_images_height: '250',
			scroller_title_size: '12',
			scroller_title_color: 'black',
			scroller_show_count: '2',
			directory: 'assets/images'
		});
		$("#amazon_scroller2").amazon_scroller({
			scroller_title_show: 'disable',
			scroller_time_interval: '3000',
			scroller_window_background_color: "none",
			scroller_window_padding: '10',
			scroller_border_size: '0',
			scroller_border_color: '#CCC',
			scroller_images_width: '100',
			scroller_images_height: '80',
			scroller_title_size: '12',
			scroller_title_color: 'black',
			scroller_show_count: '3',
			directory: 'images'
		});
		$("#amazon_scroller3").amazon_scroller({
			scroller_title_show: 'enable',
			scroller_time_interval: '3000',
			scroller_window_background_color: "none",
			scroller_window_padding: '10',
			scroller_border_size: '0',
			scroller_border_color: '#9C6',
			scroller_images_width: '320',
			scroller_images_height: '250',
			scroller_title_size: '11',
			scroller_title_color: 'black',
			scroller_show_count: '2',
			directory: 'assets/images'
		});
	});
</script>

<div class="box-body">
<?php 

		$query=mysql_query("select * from room where id_room='k001'");
		$data = mysql_fetch_array($query);

?>
	
	<div class="col-md-9">
	<ul class="nav nav-pills nav-justified">
		<li role="presentation" class="active"><a href="#">EKSEKUTIF</a></li>
		<li role="presentation"><a href="#">VIP</a></li>
		<li role="presentation"><a href="#">UTAMA</a></li>
		<li role="presentation"><a href="#">STANDART A</a></li>
		<li role="presentation"><a href="#">STANDART B</a></li>
	</ul>
	<hr/>
		
<div id="content">
	<div id="amazon_scroller3" class="amazon_scroller">
		<div class="amazon_scroller_mask">
		
			<ul>
				
		    <?php 
				$foto = $data[foto]; 
				$pecah = explode(",",$foto);
				foreach ($pecah as $value) {
					echo'<li>
							<a href="assets/images/foto/'.$value.'" title="" class="info thumbnail" name="gambar">
							<img src="assets/images/foto/'.$value.'" width="60px" height="60px" title="Klik photo"/>
							</a>
						</li>';
			}
			?>
		
			</ul>
			
		</div>
		<ul class="amazon_scroller_nav">
			<li></li>
			<li></li>
		</ul>
		<div style="clear: both"></div>
	</div>
</div>
 

	</div>
	<div class="col-md-3">
	<h3 class="text-red">Fasilitas</h3>
	<hr/>
	<ul class="fa-ul">
		<?php 
		$fasilitas = $data[fasilitas]; 
			$pecah = explode(",",$fasilitas);
			foreach ($pecah as $value) {
				echo'<li style="font-size:14px"><i class="fa-li fa fa-check-square"></i>'.ucwords($value).' </li>';
			} 
		 ?>
	</ul>
	</div>
</div>



<script language="javascript"> 
$('a.info').bigPicture({
  'enableInfo': true,
  'infoPosition': 'bottom'
}); 
</script>















