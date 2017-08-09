<?php
 
require("../assets/dompdf/dompdf_config.inc.php");//memanggil file dompdf_config.inc.php
require("../assets/dompdf/include/cpdf_adapter.cls.php");
$nama = str_replace(" ", "_", strtoupper($_POST['nama']));
$jkel = $_POST['jkel'];
$hr_lhr = $_POST['hr_lhr'];
$tgl_lhr = $_POST['tgl_lhr'];
$jam_lhr = $_POST['jam_lhr'];
$berat = $_POST['berat'];
$panjang = $_POST['panjang'];
$nama_ibu = strtoupper($_POST['nama_ibu']);
$nama_ayah = strtoupper($_POST['nama_ayah']);
$dr_ob = strtoupper($_POST['dr_ob']);
$dr_an =strtoupper($_POST['dr_an']);
$alamat = strtoupper($_POST['alamat']);
$telp = strtoupper($_POST['telp']);
$lebar = '30%';

//if jkel
if($jkel=="1"){
	$jkel2 =strtoupper("Laki- Laki");
}else if($jkel=="2"){
	$jkel2 =strtoupper("perempuan");
}else{
	$jkel2 =strtoupper("");
}

//if berat 
if($berat==""){
	$berat =strtoupper("___");
}else if($berat !=""){
	$berat =strtoupper($berat);
}

//if panjang 
if($panjang==""){
	$panjang =strtoupper("___");
}else if($panjang !=""){
	$panjang =strtoupper($panjang);
}
 
//yang akan ditampilkan
$html =
  '<html>
  <head>
    <link rel="icon" href="img/favicon.ico">
	<title>
		Form -  PFB
	</title>
  </head>
	<body>'.
  '<img src="../dist/img/logo-rsia-gf.jpg" width="17%" height="17%">
  <center><h2><u>FORMULIR PEMESANAN FOTO BAYI</u></h2></center>'.
  '<h5><U>DATA BAYI</U></h5>'.
  '<table border="0" cellpadding="8px" width="100%">
	<tr>
		<td width="30%">Nama Bayi</td>
		<td width="1%"> : </td>
		<td><u>'.$nama.'</u></td>
	</tr><tr>
		<td>Jenis Kelamin</td>
		<td> : </td>
		<td>'.$jkel2.'</td>
	</tr><tr>
		<td>Hari Lahir</td>
		<td> : </td>
		<td>'.$hr_lhr.'</td>
	</tr><tr>
		<td>Tanggal Lahir</td>
		<td> : </td>
		<td>'.$tgl_lhr.'</td>
	</tr><tr>
		<td>Jam Lahir</td>
		<td> : </td>
		<td>'.$jam_lhr.'</td>
	</tr><tr>
		<td>Berat</td>
		<td> : </td>
		<td>'.$berat.' gram</td>
	</tr><tr>
		<td>Panjang</td>
		<td> : </td>
		<td>'.$panjang.' cm</td>
	</tr><tr>
		<td>Nama Ibu</td>
		<td> : </td>
		<td>'.$nama_ibu.'</td>
	</tr><tr>
		<td>Nama Ayah</td>
		<td> : </td>
		<td>'.$nama_ayah.'</td>
	</tr><tr>
		<td>Dokter Obsgyn</td>
		<td> : </td>
		<td>'.$dr_ob.'</td>
	</tr><tr>
		<td>Dokter Anak</td>
		<td> : </td>
		<td>'.$dr_an.'</td>
	</tr><tr>
		<td>Alamat</td>
		<td> : </td>
		<td>'.$alamat.'</td>
	</tr><tr>
		<td>No. HP</td>
		<td> : </td>
		<td>'.$telp.'</td>
	</tr>'.
  '</table><br/>
	<table border="0" width="100%">
		<tr>
			<td align="right">Jakarta, '.date('d-M-Y').'</td>
		</tr>
	</table>
	<table border="0" style="margin-top:120px" width="100%">
	<tr>
		<td width="40%">&nbsp;</td>
		<td><u>Petugas</u></td>
		<td><u>'.$nama_ayah.'</u></td>
	</tr><tr>
	</table><br/>
	<hr/>
	<div style="font-size:12px">Ket:<br/>
	*)<small> Dengan menandatangani formulir ini berarti Bapak/ Ibu telah menyetujui apabila foto bayi Bapak/ Ibu digunakan untuk kepentingan RSIA Grand Family dan tidak akan menuntut royalty apapun dikemudian hari. <small>
		
	<div>
	
	
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