<?php
require("../assets/dompdf/dompdf_config.inc.php");//memanggil file dompdf_config.inc.php
require("../assets/dompdf/include/cpdf_adapter.cls.php");
include("../include/terbilang-class.php");
$id = trim($_POST['nama']);

include("../include/koneksi.php");
$query = mysql_query("SELECT nama_dokter FROM dt_dokter WHERE id='$id'");
$data = mysql_fetch_array($query);
$nama = $data['nama_dokter'];
$norek =  trim($_POST['norek']);
$nama_penyetor = trim($_POST['nama_penyetor']);
$alm_penyetor = trim($_POST['alm_penyetor']);
$nama_bank = "MANDIRI";
$nominal = $_POST['nominal'];
$rupiah = number_format($nominal);
$terbilang = terbilang(intval($nominal)); 
// Angka 1250000 merupakan angka yang akan di konversi
//echo $terbilang;

 
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
  '	<table border="0" width="105%" style="font-size:12px;text-transform:uppercase;font-family:calibri,arial,sans-serif">
		<tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="left" colspan="6"  >&nbsp;</td>
		</tr><tr>
		<td align="right" width="15%">&nbsp;</td>
		<td align="right" >&nbsp;</td>
		<td align="right" >&nbsp;</td>
		<td align="right" >&nbsp;</td>
		<td align="right" >&nbsp;</td>
		<td align="right"  >&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="4">&nbsp;</td>
		<td  colspan="2" ><div style="margin-left:50px">'.$nama_penyetor.'<div></td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" >&nbsp;</td>
		<td align="left"  colspan="5" >'.$nama.'</td>
		</tr><tr>
		<td align="right" >&nbsp;</td>
		<td align="left" colspan="5" >'.$norek.' </td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6"  >&nbsp;</td>
		</tr><tr>
		<td align="right" >&nbsp;</td>
		<td align="left" colspan="5"  >'.$nama_bank.'</td>
		</tr><tr>
		<td align="left" colspan="5"  >&nbsp;</td>
		<td align="center" >'.$rupiah.'</td>
		</tr><tr>
		<td align="right" colspan="6"  >&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6" >&nbsp;</td>
		</tr><tr>
		<td align="left" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="left" colspan="5"  >&nbsp;</td>
		<td align="left">'.$rupiah.'</td>
		</tr><tr>
		<td align="left" colspan="6"  >&nbsp;</td>
		</tr><tr>
		<td align="left" colspan="4"  >&nbsp;</td>
		<td align="left" colspan="2">'. $terbilang.' RUPIAH.</td>
		</tr>
	</table>
  </div>'.
  '</body></html>';
 
$dompdf = new DOMPDF();
$customPaper = array(0,0,603.779527559,480.622047244);
//$customPaper = array(0,0,603.779527559,443.622047244);
$dompdf->set_paper($customPaper);

// load the html content>
$dompdf->load_html($html);
$dompdf->render();
$canvas = $dompdf->get_canvas();
$font = Font_Metrics::get_font("helvetica", "bold");
$dompdf->stream("form-PFB.pdf",array("Attachment"=>0));
 
?>