<?php
	 if (!isset($_SESSION)) {
    session_start();
		}
$username =$_SESSION['username'];
$nik = trim($_POST[nik]);
$nama = trim($_POST[nama]);
$tmp = trim($_POST[tmp]);
$tgl_lhr = trim($_POST[tgl_lhr]);
$telp = trim($_POST[telp]);
$tgl_msk = trim($_POST[tgl_msk]);
$ext = trim($_POST[ext]);

require_once("../assets/PHPMailer/class.smtp.php");
require_once("../assets/PHPMailer/class.phpmailer.php");
$mail = new PHPMailer();
//$mail->IsSMTP(); // telling the class to use SMTP
//$mail->Host = "localhost"; // SMTP server
//IsSMTP(); // send via SMTP
$mail->Host     = "ssl://smtp.gmail.com"; // SMTP server Gmail
$mail->Mailer   = "smtp";
$mail->SMTPAuth = true; // turn on SMTP authentication

$mail->Username = "it@rsiagrandfamily.com";//rsiagrandfamily.internal
$mail->Password = "rsiagf@2015"; // SMTP password
$webmaster_email = "agus.firman@rsiagrandfamily.com"; //Reply to this email ID
$email = "it-group@rsiagrandfamily.com"; // gmail agusabon91@gmail.com //live agusabon91@rsiagrandfamily.com
$email2 ="indra.lesmana@terakorp.com"; //weldi@rsiagrandfamily.com // aries.munandar@rsiagrandfamily.com
//$email3 = "weldidoet@gmail.com"; //gmail weldidoet@gmail.com
$name = "IT Grand Familiy"; // Recipient's name
$mail->From = $webmaster_email;
$mail->FromName =$username ;
$mail->AddAddress($email,$name);
//$mail->AddAddress($email2,$name);
//$mail->AddAddress($email3,$name);
//$mail->addCC("agus.firman@rsiagrandfamily.com");
// $mail->addCC("weldi@rsiagrandfamily.com");
// $mail->addCC("aries.munandar@rsiagrandfamily.com");
// $mail->AddAddress($email3,$name);
//$mail->AddAddress($email2,$name);
$mail->AddReplyTo($webmaster_email,"Agus Firman");
$mail->WordWrap = 50; // set word wrap
//$mail->AddAttachment("asset/img/logo-rsia-gf.jpg"); // attachment
// $mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
$mail->IsHTML(true); // send as HTML
$mail->Subject = "Pengajuan pembuatan akun teramedik. ";
$mail->Body = "
<br/>
Mohon untuk dapat  dibuatkan akun teramedik,<br/>
dengan informasi yang tertera dibawah ini:<br/>
<table>
	<tr>
		<td>NIK</td><td>: $nik</td>
	</tr><tr>
		<td>Nama</td><td>: $nama</td>
	</tr><tr>
		<td>TTL</td><td>: $tmp , $tgl_lhr</td>
	</tr><tr>
		<td>No. Telp</td><td>: $telp</td>
	</tr><tr>
		<td>Tgl Masuk kerja</td><td>: $tgl_msk</td>
	</tr><tr>
		<td>No.Ext</td><td>: $ext</td>
	</tr>
</table><br/>
Pemohon,
<br/><br/><br/>
<u>$username</u>
 "; 
//$mail->AltBody = "This is the body when user views in plain text format"; //Text Body 
if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
echo "<script>alert('Permintaan Berhasil terkirim, Team IT Grand Family Akan Konfirmasi kembali.');document.location.href='../index.php';</script>";
}
?>