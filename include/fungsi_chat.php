<?php 
session_start();
include"koneksi.php";
//jika ada pesan masuk
if ($_GET['action'] == "chatheartbeat") { 
	
	$sql = "select * from pesan where (pesan.penerima = '".mysql_real_escape_string($_SESSION['username'])."' AND recd = 0) order by id_pesan ASC";
	$query = mysql_query($sql);
	$items = '';
	$chatBoxes = array();

	while ($chat = mysql_fetch_array($query)) {
		$pengirim = $chat['pengirim'];
		$query_user = mysql_query("SELECT  nama from guru where nip='$pengirim'
										union
										select nama from siswa where nisn='$pengirim'
										");
		$data= mysql_fetch_array($query_user);
		
		if (!isset($_SESSION['openChatBoxes'][$chat['pengirim']]) && isset($_SESSION['chatHistory'][$chat['pengirim']])) {
			$items = $_SESSION['chatHistory'][$chat['pengirim']];
		}

		$chat['isi'] = sanitize($chat['isi']);

		$items .= <<<EOD
					   {
			"s": "0",
			"f": "{$chat['pengirim']}",
			"n": "{$data['nama']}",
			"m": "{$chat['isi']}"
	   },
EOD;

	if (!isset($_SESSION['chatHistory'][$chat['pengirim']])) {
		$_SESSION['chatHistory'][$chat['pengirim']] = '';
	}

	$_SESSION['chatHistory'][$chat['pengirim']] .= <<<EOD
						   {
			"s": "0",
			"f": "{$chat['pengirim']}",
			"n": "{$data['nama']}",
			"m": "{$chat['isi']}"
	   },
EOD;
		
		unset($_SESSION['tsChatBoxes'][$chat['pengirim']]);
		$_SESSION['openChatBoxes'][$chat['pengirim']] = $chat['wkt_pesan'];
	}

	if (!empty($_SESSION['openChatBoxes'])) {
	foreach ($_SESSION['openChatBoxes'] as $chatbox => $time) {
		if (!isset($_SESSION['tsChatBoxes'][$chatbox])) {
			$now = time()-strtotime($time);
			$time = date('Y-m-d H:i:s', strtotime($time));

			$message = "Sent at $time";
			if ($now > 180) {
				$items .= <<<EOD
{
"s": "2",
"f": "$chatbox",
"m": "{$message}"
},
EOD;

	if (!isset($_SESSION['chatHistory'][$chatbox])) {
		$_SESSION['chatHistory'][$chatbox] = '';
	}

	$_SESSION['chatHistory'][$chatbox] .= <<<EOD
		{
"s": "2",
"f": "$chatbox",
"m": "{$message}"
},
EOD;
			$_SESSION['tsChatBoxes'][$chatbox] = 1;
		}
		}
	}
}

	$sql = "update pesan set recd = 1 where pesan.penerima = '".mysql_real_escape_string($_SESSION['username'])."' and recd = 0";
	$query = mysql_query($sql);

	if ($items != '') {
		$items = substr($items, 0, -1);
	}
header('Content-type: application/json');
?>
{"items": [	<?php echo $items;?>]}
<?php
exit(0);
} 

//jika ada aksi kirim pesan
if ($_GET['action'] == "sendchat") {
	echo"<script>alert('OK');</script>";
	$from = $_SESSION['username'];
	$to = $_POST['to'];
	$message = $_POST['message'];
	$log = date("H:i d M Y");
	$sql_update_log = mysql_query("update users set `log`='$log', `st_on`='1' where `username`='$from'");
	$_SESSION['openChatBoxes'][$_POST['to']] = date('Y-m-d H:i:s', time());
	
	$messagesan = sanitize($message);

	if (!isset($_SESSION['chatHistory'][$_POST['to']])) {
		$_SESSION['chatHistory'][$_POST['to']] = '';
	}

	$_SESSION['chatHistory'][$_POST['to']] .= <<<EOD
					   {
			"s": "1",
			"f": "{$to}",
			"m": "{$messagesan}"
	   },
EOD;


	unset($_SESSION['tsChatBoxes'][$_POST['to']]);

	$sql = "insert into pesan (pesan.pengirim,pesan.penerima,isi,wkt_pesan) values ('".mysql_real_escape_string($from)."', '".mysql_real_escape_string($to)."','".mysql_real_escape_string($message)."',NOW())";
	$query = mysql_query($sql);
	echo "1";
	exit(0);
} 

//jika ada aksi keluar dari chat pesan
if ($_GET['action'] == "closechat") { 
	unset($_SESSION['openChatBoxes'][$_POST['chatbox']]);
	echo "1";
	exit(0);
} 

//jika ada aksi session pesan
if ($_GET['action'] == "startchatsession") { 

	$items = '';
	if (!empty($_SESSION['openChatBoxes'])) {
		foreach ($_SESSION['openChatBoxes'] as $chatbox => $void) {
			$items .= chatBoxSession($chatbox);
		}
	}


	if ($items != '') {
		$items = substr($items, 0, -1);
	}

header('Content-type: application/json');
?>
{"username": "<?php echo $_SESSION['username'];?>",
"nama": "<?php echo $_SESSION['nama'];?>",
		"items": [<?php echo $items;?> ] }
<?php
exit(0);
} 

if (!isset($_SESSION['chatHistory'])) {
	$_SESSION['chatHistory'] = array();	
}

if (!isset($_SESSION['openChatBoxes'])) {
	$_SESSION['openChatBoxes'] = array();	
}

function chatBoxSession($chatbox) {
	
	$items = '';
	
	if (isset($_SESSION['chatHistory'][$chatbox])) {
		$items = $_SESSION['chatHistory'][$chatbox];
	}

	return $items;
}


function sanitize($text) {
	$text = htmlspecialchars($text, ENT_QUOTES);
	$text = str_replace("\n\r","\n",$text);
	$text = str_replace("\r\n","\n",$text);
	$text = str_replace("\n","<br>",$text);
	return $text;
}
?>