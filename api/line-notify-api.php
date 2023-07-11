<?php
session_start();
if ($_SESSION["pwd_check"] == 'USER' or $_SESSION["pwd_check"] == 'VIP' or $_SESSION["pwd_check"] == 'ADMIN') {
	$session_stat = 'true';
} else {
	$_SESSION["pwd_check"] = 'none';
	$session_stat = 'false';
}

if ($session_stat != 'true') {
	die();
}

$user_coor = $_POST['user_coor2'];
$user_name = $_POST['user_name'];
$loca_name = $_POST['loca_name'];
$loca_type = $_POST['loca_type'];
$loca_detail = $_POST['loca_detail'];
$rating = $_POST['stars'];
$FILES = $_FILES['file'];

require_once 'connect_db_pdo.php';
$id_img = $connect->prepare("SELECT * FROM pindata WHERE coordinate='" . $user_coor . "'");
$id_img->execute();
$result__id = $id_img->fetch(PDO::FETCH_ASSOC);
$id_obj = $result__id['ID'];

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
	$url = "https://";
} else {
	$url = "http://";
}
$url .= $_SERVER['HTTP_HOST'];
$url_request = $_SERVER['REQUEST_URI'];
$url_request_split = explode('/api/', $url_request);
$url_sub_path = $url_request_split[0];
$url .= $url_sub_path . '/index.php?id=' . $id_obj;

if ($rating == '1') {
	$rating_text = '❤️';
} elseif ($rating == '2') {
	$rating_text = '❤️❤️';
} elseif ($rating == '3') {
	$rating_text = '❤️❤️❤️';
} elseif ($rating == '4') {
	$rating_text = '❤️❤️❤️❤️';
} elseif ($rating == '5') {
	$rating_text = '❤️❤️❤️❤️❤️';
}

if ($loca_type == 'loca_food') {
	$loca_type_text = 'ร้านอาหาร';
} elseif ($loca_type == 'loca_tamiya') {
	$loca_type_text = 'ทามิยะ';
} elseif ($loca_type == 'loca_alc') {
	$loca_type_text = 'ร้านนั่งชิล';
} elseif ($loca_type == 'loca_cafe') {
	$loca_type_text = 'คาเฟ่';
} elseif ($loca_type == 'loca_hotel') {
	$loca_type_text = 'ที่พัก';
}

$message = "\n" . '📍 ชื่อหมุด : ' . $loca_name . "\n" . '📪 ประเภท : ' . $loca_type_text . "\n" . '💬 รายละเอียด : ' . $loca_detail . "\n" . '💖 ความพึงพอใจ : ' . $rating_text . "\n" . '👤 ผู้ปักหมุด : ' . $user_name . "\n" . '📪 ดูหมุด : ' . $url;

if ($message <> "") {
	sendlinemesg();
	$res = notify_message($message);
	echo "true";
} else {
	echo "false";
}

function sendlinemesg()
{

	define('LINE_API', "https://notify-api.line.me/api/notify");
	define('LINE_TOKEN', '');

	function notify_message($message)
	{
		$queryData = array('message' => $message);
		$queryData = http_build_query($queryData, '', '&');
		$headerOptions = array(
			'http' => array(
				'method' => 'POST',
				'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
				. "Authorization: Bearer " . LINE_TOKEN . "\r\n"
				. "Content-Length: " . strlen($queryData) . "\r\n",
				'content' => $queryData
			)
		);
		$context = stream_context_create($headerOptions);
		$result = file_get_contents(LINE_API, FALSE, $context);
		$res = json_decode($result);
		return $res;

	}

}
