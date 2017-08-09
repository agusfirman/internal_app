<?php
 
require("../assets/dompdf/dompdf_config.inc.php");//memanggil file dompdf_config.inc.php
require("../assets/dompdf/include/cpdf_adapter.cls.php");
$nama = str_replace(" ", "_", strtoupper($_POST['nama']));
$nip = $_POST['nip'];
$bagian = $_POST['bagian'];
$jabatan = $_POST['jabatan'];
$isi_pesan = $_POST['isi_pesan'];
$approved = 'dr. Susi Anggraini';

//yang akan ditampilkan
$html =
  '<html>
  <head>
    <link rel="icon" href="img/favicon.ico">
	<title>
		Form -  SMS Blast
		
	</title>
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
	  		<td><center><h1 style="font-size: 30px">FORM PENGAJUAN <br/>SMS BLAST</h1>
	  		</center></td>
	  	</tr>
	  		<div style="text-align:right;position:relative;top:-40px;left:-10px"> '.date('d-m-Y').'</div>
	  </table>
  </div>'.
  '<div >
  <table width="100%">
	<tr>
		<td width="20%">Nama Pegawai</td>
		<td width="1%"> : </td>
		<td width="30%">'.$nama.'</td>
		<td width="20%">Bagian</td>
		<td width="1%"> : </td>
		<td>'.$bagian.'</td>
	</tr><tr>
		<td>NIP</td>
		<td> : </td>
		<td>'.$nip.'</td>
		<td>Jabatan</td>
		<td> : </td>
		<td>'.$jabatan.'</td>
	</tr>
	</table>
	</div>
	<div style="width:100%;height:500px" class="kotak">
	<table width="100%">
		<tr>
			<td align="left" valign="top" width="20%">Isi SMS Blast :</td>
			<td align="left">'.$isi_pesan.'</td>
		</tr>
	</table>
	</div>
	<div>
	<table border="0" style="margin-top:180px;margin-left:20px" width="120%">
	<tr>
		<td width="40%">Diajukan Oleh,</td>
		<td width="40%">Menyetujui,</td>
	</tr><tr>
		<td colspan="2">&nbsp;</td>
	</tr><tr>
		<td colspan="2">&nbsp;</td>
	</tr><tr>
		<td colspan="2">&nbsp;</td>
	</tr><tr>
		<td><u>'.$nama.'</u></td>
		<td><u>'.$approved.'</u></td>
	</tr><tr>
		<td>'.$bagian.'</td>
		<td>Direktur Operasional</td>
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
$dompdf->stream("form-PFB.pdf",array("Attachment"=>0));
 
?>