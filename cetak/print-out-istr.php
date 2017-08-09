<?php
 
require("../assets/dompdf/dompdf_config.inc.php");

//memanggil file dompdf_config.inc.php
require("../assets/dompdf/include/cpdf_adapter.cls.php");
$nama 	= str_replace(" ", "_", strtoupper($_POST['nm_pemohon']));
$nip = $_POST['nip'];
$bagian 		= $_POST['bagian'];
$jabatan 		= $_POST['jabatan'];
$lok_awal 		= $_POST['lok_awal'];
$lok_tujuan 		= $_POST['lok_tujuan'];
$tgl 			= $_POST['tgl'];
$nm_soft 		= $_POST['nm_soft'];
$jumlah 		= $_POST['jumlah'];
$keterangan 		= $_POST['keterangan'];
$approved 		= 'dr. Robby Heryanto';
$xl ="&nbsp";
$day = date('D', strtotime($tanggal));
$dayList = array(
	'Sun' => 'Minggu',
	'Mon' => 'Senin',
	'Tue' => 'Selasa',
	'Wed' => 'Rabu',
	'Thu' => 'Kamis',
	'Fri' => 'Jumat',
	'Sat' => 'Sabtu'
);

$hari =$dayList[$day];
$bln = date('m');
$thn = date('Y');
//yang akan ditampilkan
$html =
  '<html>
  <head>
    <link rel="icon" href="img/favicon.ico">
	<title>
		Form -  ISTR</title>
	<style>
		.kotak{
		border-style: solid;
		border-width: 1px;
		border-color: #000;
	}
</style>
  </head>
	<body>'.
  '<div >
  	<table width="100%" >
	  	<tr >
	  		<td width="30%"><img src="../assets/img/logo-rsia-gf.jpg" width="150px" height="50px"></td>
	  		<td>
	  			<center>
	  				<div style="font-size: 24px">Surat Pernyataan 
	  				<br/>
	  				<b>Installasi Software Tidak Resmi / Unlicensed</b></div>
	  				
	  				No Surat :../SP-Unlicensed/X/2017
	  			</center>
	  		</td>
	  	</tr>
	  		<!--<div style="text-align:right;position:relative;top:-40px;left:-10px"> '.$hari.'</div>-->	 
	  	</table>
  </div><hr/>'.
  '<div style="margin-top:30">
  <table width="100%" style="line-height:250%;padding:20px">
	<tr>
		<td colspan="6">Saya yang bertanda tangan di bawah ini:</td>
	</tr<tr>
		<td>NIP</td>
		<td> : </td>
		<td>'.$nip.'</td>
	</tr><tr>
		<td width="20%">Nama Pegawai</td>
		<td width="1%"> : </td>
		<td width="30%">'.$nama.'</td>
	</tr><tr >
		<td colspan="6">Menyatakan bahwa pada hari ini <b>'.$hari.'</b> tanggal <b>'.$bln.'</b> tahun <b>'.$thn.'</b> telah menyetujui untuk melakukan installasi Software <b>Unlicensed</b>/ Tidak Resmi untuk program/ software <b>'.$nm_soft.'</b> pada komputer / PC '.$bagian.'.
		<p/> Demikian surat pernyataan ini saya buat, dan sekaligus saya menyatakan sanggup menerima segala resiko/ konsekuensi hukum yang berkaitan dengan hak legalitas dari installasi dan pemakaian software tersebut.  </td>
	</tr>
	</table>
	</div>
	<div>
	<table border="0" style="margin-top:100px;margin-left:20px" width="100%">
	<tr>
		<td width="70%">&nbsp;</td>
		<td width="30%">Yang Menyatakan,</td>
	</tr><tr>
		<td colspan="2">&nbsp;</td>
	</tr><tr>
		<td colspan="2">&nbsp;</td>
	</tr><tr>
		<td colspan="2">&nbsp;</td>
	</tr><tr>
		<td>&nbsp;
		</td>
		<td><u>'.$nama.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
		
	</tr><tr>
		 <td>&nbsp;</td>
                 <td>'.$bagian.'</td>
	</tr><tr>
		<td colspan="2">&nbsp;</td>
	</tr><tr>
		<td colspan="2">Mengetahui,</td>
	</tr><tr>
		<td width="40%"> Kadiv/ Kabag</td>
		<td width="40%">Menyetujui,</td>
	</tr><tr>
		<td colspan="2">&nbsp;</td>
	</tr><tr>
		<td colspan="2">&nbsp;</td>
	</tr><tr>
		<td colspan="2">&nbsp;</td>
	</tr><tr>
		<td><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
</td>
		<td><u>'.$approved.'</u></td>
	</tr><tr>
		<td>'.$lok_tujuan.'</td>
		<td>Direktur RSIA Grand Family</td>
	</tr>
	</table>
	</div>'.
  '</body></html>';
 
$dompdf = new DOMPDF();
$customPaper = array(0,0,160,160);
$dompdf->set_paper("A4");

// load the html content
$dompdf->load_html($html);
$dompdf->render();
$canvas = $dompdf->get_canvas();
$font = Font_Metrics::get_font("helvetica", "bold");
$dompdf->stream("form-istr.pdf",array("Attachment"=>0));
 
?>