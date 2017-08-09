
<div class="container">
<div class="row">
<div class="col-xs-2 col-sm-4"></div>
<div class="col-xs-8 col-md-4 ">
<div class="login-box" style="box-shadow:black 0px 0px 45px;margin-top:100px"> 
	<div class="panel-heading red">	
		<h4 style="text-align:center;"><b>PLEASE LOGIN</b></h4>
	</div> 
	<div class="login-box-body">
		<form id="form_login" name="form_login" action="" method="post" onSubmit="">
		 	<div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" placeholder="Username"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
			<input type="submit"  name="btn_masuk"  id="btn_login" class="btn btn-block btn-sm btn-warning btn-flat" value="Masuk"/>
		</form>
<footer class="text-center">Daftar Akun Baru Klik <a href="javasccript.void(0);" class="daftar"><i>Disini</a></i></footer>
<div class="row">
	<div class="col-md-6 text-center">
		<a href="http://192.168.6.8/" target="_blank"><img src="assets/images/gftube.png" alt="" width="100" height="100" title="Video Tutorial Internal"></a> 		
	</div>
	<div class="col-md-6 text-center">
		<a href="http://internal.rsiagf.com/sparkweb/SparkWeb.html" target="_blank"><img src="assets/images/gfm.png" alt="" width="100" height="100" title="Messenger Internal"></a>
	</div>
</div>
	


</div>



	<div class="panel-footer panel-danger ">
				<center>Created by Team IT-RSIA Grand Family</center>
				<footer class="text-center" style="color:red;font-weight:red">copyright &copy; <?php echo date('Y'); ?>
					<div id="clock"></div>
				</footer> 

	</div> 
</div>
</div>
</div>
<div class="col-xs-2 col-sm-4">
</div>
</div>

<script type="text/javascript">

//start realtime

    var detik = <?php echo date('s'); ?>;
    var menit = <?php echo date('i'); ?>;
    var jam   = <?php echo date('H'); ?>;
     
    function clock()
    {
        if (detik!=0 && detik%60==0) {
            menit++;
            detik=0;
        }
        second = detik;
         
        if (menit!=0 && menit%60==0) {
            jam++;
            menit=0;
        }
        minute = menit;
         
        if (jam!=0 && jam%24==0) {
            jam=0;
        }
        hour = jam;
         
        if (detik<10){
            second='0'+detik;
        }
        if (menit<10){
            minute='0'+menit;
        }
         
        if (jam<10){
            hour='0'+jam;
        }
        waktu = hour+':'+minute+':'+second;
         
        document.getElementById("clock").innerHTML = waktu;
        detik++;
    }
 
    setInterval(clock,1000);
//End realtime
</script>
