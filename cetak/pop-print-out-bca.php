<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>ITS-RSIA Grand Family</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->

    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/AdminLTE.css">
    <link rel="stylesheet" href="../assets/css/style-pic.css">

    <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">
    <!--untuk slideshow-->
	<title></title>
</head>

<nav class="navbar">
	<div class="btn-group btn-group-justified" role="group" aria-label="...">
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default btn-sm btn-flat" onClick="window.print()">Print</button>
		</div>
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default btn-sm btn-flat" onClick="window.location.reload();">Refresh</button>
		</div>
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default btn-sm btn-flat" onClick="window.close();">Tutup</button>
		</div>
	</div>	
</nav>
<body id="printarea">
<?php 

$nama_penyetor = trim($_POST['nama_penyetor']);
/*$nama_penyetor = "Agus Ganteng";*/
echo "<script>alert('".$nama_penyetor."')</script>";
 ?>
<table border="0"  width="100%" style="font-size:11px;text-transform:uppercase;font-family:calibri,arial,sans-serif">
	<tr>
		<td>&nbsp;</td>
	</tr><tr>
		<td>&nbsp;</td>
	</tr><tr>
		<td>&nbsp;</td>
	</tr><tr>
		<td>&nbsp;</td>
	</tr>
  </table>
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
			
  </div>
</body>
<script type="text/javascript">
/*	   function PrintDoc() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }*/
</script>
</html>