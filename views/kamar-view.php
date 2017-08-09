<!-- <script type="text/javascript">alert("test")</script> -->
<div class="box-body">
	<div class="col-md-12">
	<ul id="nav" class="nav nav-tabs nav-justified">
	<?php  
  $sql="select * from rooms";
		$result=$mysqli->query($sql);
    echo "<script>alert('".$result."')</script>";
		while ($data2 = mysqli_free_result($result)) { 
		    	 echo '
				 		 <li role="presentation"  >
				 		 	<a href="index.php?page='. base64_encode('kamar-view').'&cat='.base64_encode($data2[id_room]).'">'.ucwords($data2[nama_room]).'</a>
				 		 </li>
					 ';


		    }    
	 ?>
		
	</ul>
		
			<?php 
			 if($_GET['page']=base64_encode('kamar-view')&& ['cat'] !=""){
					$d_cat = base64_decode($_GET['cat']);
				$query=$mysqli->query("select * from rooms where id_room='$d_cat' ");
				$data = $query->fetch_array();
				$foto = $data[foto]; 
			}
			?>
		<br/>
      <div class="carousel carousel-showmanymoveone slide" id="carousel123">
        <div class="carousel-inner" >
        <?php 
           if($_GET['page']=base64_encode('kamar-view')&& ['cat'] !=""){
              $d_cat = base64_decode($_GET['cat']);
            $query=$mysqli->query("select * from rooms where id_room='$d_cat' ");
            $data = $query->fetch_array();
          }
      ?>
          <div class="item active">
            <div class="col-xs-3"><a href="assets/images/foto/<?php echo $data[foto1]; ?>" class="info" data-gallery><img src="assets/images/foto/<?php echo $data[foto1]; ?>" class="img-responsive"></a></div>
          </div>
          <div class="item">
            <div class="col-xs-3"><a data-gallery class="info" href="assets/images/foto/<?php echo $data[foto2]; ?>"><img src="assets/images/foto/<?php echo $data[foto2]; ?>" class="img-responsive"></a></div>
          </div>
          <div class="item">
            <div class="col-xs-3"><a data-gallery class="info" href="assets/images/foto/<?php echo $data[foto3]; ?>"><img src="assets/images/foto/<?php echo $data[foto3]; ?>" class="img-responsive"></a></div>
          </div>          
          <div class="item">
            <div class="col-xs-3"><a data-gallery class="info" href="assets/images/foto/<?php echo $data[foto4]; ?>"><img src="assets/images/foto/<?php echo $data[foto4]; ?>" class="img-responsive"></a></div>
          </div>
          <div class="item">
            <div class="col-xs-3"><a data-gallery class="info" href="assets/images/foto/<?php echo $data[foto5]; ?>"><img src="assets/images/foto/<?php echo $data[foto5]; ?>" class="img-responsive"></a></div>
          </div>
          <div class="item">
            <div class="col-xs-3"><a data-gallery class="info" href="assets/images/foto/<?php echo $data[foto6]; ?>"><img src="assets/images/foto/<?php echo $data[foto6]; ?>" class="img-responsive"></a></div>
          </div>
        </div>
        <a class="left carousel-control" href="#carousel123" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
        <a class="right carousel-control" href="#carousel123" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
      </div>


    <!-- untuk deskripsi room -->
      <h4 class="text-red">Fasilitas <?php echo ucwords($data[nama_room]); ?></h4>
      <hr/>
      <ul class="fa-ul">
          <?php 
          $no=1;
          $fasilitas = $data[fasilitas]; 
          $pecah = explode(",",$fasilitas);
          foreach ($pecah as $value) {
          echo'<li style="font-size:14px">'.$no.'. '.ucwords($value).' </li>';
          $no++;
          } 
          ?>
      </ul>
    <!-- end deskripsi room -->

  </div>
</div>

<script> 
$(document).ready(function () {

     var url = window.location;
        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.nav a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');

  $('#carousel123').carousel({
     interval: 3600
      });

  $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<4;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
});

</script>

<div class="modal fade" id="m_detail" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body" >
        </div>
      </div>
    </div>
  </div>

  
<style> 
.transition {
    -webkit-transform: scale(4); 
    -moz-transform: scale(4);
    -o-transform: scale(4);
    transform: scale(4);
}
.carousel-showmanymoveone .carousel-control {
  width: 4%;
  background-image: none;
 }
 .carousel-showmanymoveone .carousel-control.left {
  margin-left: 15px;
 }
 .carousel-showmanymoveone .carousel-control.right {
  margin-right: 15px;
 }
 .carousel-showmanymoveone .cloneditem-1,
 .carousel-showmanymoveone .cloneditem-2,
 .carousel-showmanymoveone .cloneditem-3 {
  display: none;
 }
 @media all and (min-width: 768px) {
  .carousel-showmanymoveone .carousel-inner > .active.left,
  .carousel-showmanymoveone .carousel-inner > .prev {
    left: -50%;
  }
  .carousel-showmanymoveone .carousel-inner > .active.right,
  .carousel-showmanymoveone .carousel-inner > .next {
    left: 50%;
  }
  .carousel-showmanymoveone .carousel-inner > .left,
  .carousel-showmanymoveone .carousel-inner > .prev.right,
  .carousel-showmanymoveone .carousel-inner > .active {
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
    display: block;
  }
 }
 @media all and (min-width: 768px) and (transform-3d), all and (min-width: 768px) and (-webkit-transform-3d) {
  .carousel-showmanymoveone .carousel-inner > .item.active.right,
  .carousel-showmanymoveone .carousel-inner > .item.next {
    -webkit-transform: translate3d(50%, 0, 0);
            transform: translate3d(50%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.active.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev {
    -webkit-transform: translate3d(-50%, 0, 0);
            transform: translate3d(-50%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev.right,
  .carousel-showmanymoveone .carousel-inner > .item.active {
    -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
    left: 0;
  }
 }
 @media all and (min-width: 992px) {
  .carousel-showmanymoveone .carousel-inner > .active.left,
  .carousel-showmanymoveone .carousel-inner > .prev {
    left: -25%;
  }
  .carousel-showmanymoveone .carousel-inner > .active.right,
  .carousel-showmanymoveone .carousel-inner > .next {
    left: 25%;
  }
  .carousel-showmanymoveone .carousel-inner > .left,
  .carousel-showmanymoveone .carousel-inner > .prev.right,
  .carousel-showmanymoveone .carousel-inner > .active {
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner .cloneditem-2,
  .carousel-showmanymoveone .carousel-inner .cloneditem-3 {
    display: block;
  }
 }
 @media all and (min-width: 992px) and (transform-3d), all and (min-width: 992px) and (-webkit-transform-3d) {
  .carousel-showmanymoveone .carousel-inner > .item.active.right,
  .carousel-showmanymoveone .carousel-inner > .item.next {
    -webkit-transform: translate3d(25%, 0, 0);
            transform: translate3d(25%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.active.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev {
    -webkit-transform: translate3d(-25%, 0, 0);
            transform: translate3d(-25%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev.right,
  .carousel-showmanymoveone .carousel-inner > .item.active {
    -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
    left: 0;
  }
 } 
</style>

<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>