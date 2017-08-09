<?php
require("../assets/dompdf/dompdf_config.inc.php");//memanggil file dompdf_config.inc.php
require("../assets/dompdf/include/cpdf_adapter.cls.php");
include("../include/terbilang-class.php");

session_start();
include("../include/koneksi.php");
$users = $_SESSION[username];
$id = trim($_POST['nama']);
$query = mysql_query("SELECT nama_dokter FROM dt_dokter WHERE id='$id'");
$data = mysql_fetch_array($query);
$nama =  $data['nama_dokter'];
$norek =  trim($_POST['norek']);
$nama_penyetor = trim($_POST['nama_penyetor']);
$alm_penyetor = trim($_POST['alm_penyetor']);
$telp = $_POST['telp'];
$nominal = trim($_POST['nominal']);
$rupiah = number_format($nominal);
$terbilang = terbilang(intval($nominal)); 
if($users=='ignasia.yoan'){
	$rek_family='';
}else{
$rek_family = '168 306 1020';
}
$html =
  '<html>
  <head>
    <link rel="icon" href="../assets/img/favicon.ico">
	<title>
		Form -  PFB
	</title>
  </head>
	<body>'.
  '<table border="0"  width="100%" style="font-size:11px;text-transform:uppercase;font-family:calibri,arial,sans-serif">
	<tr>
		<td>&nbsp;</td>
	</tr><tr>
		<td>&nbsp;</td>
	</tr><tr>
		<td>&nbsp;</td>
	</tr><tr>
		<td>&nbsp;</td>
	</tr>'.
  '</table>
	<table border="0" width="100%" style="font-size:11px;text-transform:uppercase;font-family:calibri,arial,sans-serif">
	<tr>
		<td width="50%">
			<table border="0" width="100%">
				<tr>
					<td width="30%">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td align="left">'.$norek.' </td>
				</tr><tr>
					<td width="30%">&nbsp;</td>
					<td align="left" style="font-size:10px;" colspan="2">'.$nama.'</td>
				</tr><tr>
					<td width="30%">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td align="left">&nbsp;</td>
				</tr><tr>
					<td width="30%">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td align="left">&nbsp;</td>
				</tr><tr>
					<td width="30%">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td align="left">&nbsp;</td>
				</tr><tr>
					<td width="30%">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td align="left" >'.$nama_penyetor.'</td>
				</tr><tr>
					<td width="30%">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td align="left">'.$alm_penyetor.'</td>
				</tr><tr>
					<td width="30%">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td align="left">
						<table border="0" width="100%">
							<tr>
								<td width="60%">&nbsp;</td>
								<td>'.$telp.'</td>
							</tr>
						</table>
					</td>
				</tr><tr>
					<td width="30%">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td align="left">
						<table border="0" width="100%">
							<tr>
								<td width="60%">&nbsp;</td>
								<td>'.$rek_family.'</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>	
		</td>
		<td width="50%">
			<table border="0" width="100%">
			<tr>
				<td width="75%"><div style="position:relative;left:50px">TUNAI</div></td>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
				<td width="">'.$rupiah.'</td>
			</tr><tr>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
			</tr><tr>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
			</tr><tr>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
			</tr><tr>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
			</tr><tr>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
				<td width="">&nbsp;</td>
				<td width="">'.$rupiah.'</td>
			</tr>
		</table>		
		</td>
	<tr>
	</table>
	<div style="position:absolute;top:265px;left:400px;font-size:11px;text-transform:uppercase;font-family:calibri,arial,sans-serif">'. $terbilang.' RUPIAH.</div></td>
			
  </div>'.
  '</body></html>';
 
$dompdf = new DOMPDF();
$customPaper = array(0,8, 569.7638,280.63);
$dompdf->set_paper($customPaper);

// load the html content>
$dompdf->load_html($html);
$dompdf->render();
$canvas = $dompdf->get_canvas();
$font = Font_Metrics::get_font("helvetica", "bold");
$dompdf->stream("form-PFB.pdf",array("Attachment"=>0));
 
?>