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
$nama_bank = trim($_POST['nama_bank']);
$alm_penyetor = trim($_POST['alm_penyetor']);
$nama_bank = "CIMB NIAGA";
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
  '	<table border="0" width="100%" cellpadding="5" style="position:absolute;left:-5px;font-size:11px;text-transform:uppercase;font-family:calibri,arial,sans-serif">
		<tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right"  rowspan="3" width="10%">&nbsp;</td>
		<td align="left" colspan="2" >'.$norek.'</td>
		<td colspan="3" rowspan="3">&nbsp;</td>
		</tr><tr>
		<td align="left" colspan="2">'.$nama.'</td>
		</tr><tr>
		<td align="left" colspan="2">'.$nama_bank.'</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr><tr>
		<td align="right" >&nbsp;</td>
		<td align="right"  colspan="2" width="35%">&nbsp;</td>
		<td align="center" width="7%">Rp.</td>
		<td  colspan="2	" align="left">'.$rupiah.'</td>
		</tr><tr>
		<td align="right" colspan="3" rowspan="3">&nbsp;</td>
		<td align="left" colspan="2" rowspan="3">'.$terbilang.' RUPIAH</td>
		<td align="left" rowspan="3" width="15%">&nbsp;</td>
		</tr><tr>
		</tr><tr>
		</tr><tr>
		<td align="right" colspan="6">&nbsp;</td>
		</tr>
	</table>
  </div>'.
  '</body></html>';
 
$dompdf = new DOMPDF();
$customPaper = array(0,0,606.6142,419.5276);
$dompdf->set_paper($customPaper);

// load the html content>
$dompdf->load_html($html);
$dompdf->render();
$canvas = $dompdf->get_canvas();
$font = Font_Metrics::get_font("helvetica", "bold");
$dompdf->stream("form-PFB.pdf",array("Attachment"=>0));
 
?>