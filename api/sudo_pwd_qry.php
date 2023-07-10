<?php
session_start();
if ($_SESSION["pwd_sudo"] == 'SUDO') {
	$session_stat = 'true';
} else {
	$_SESSION["pwd_sudo"] = 'none';
	$session_stat = 'false';
	echo 'failed';
	die();
}

require_once 'connect_db_pdo.php';
$sql = $connect->prepare("SELECT * FROM pwd_verify");
$sql->execute();
$pwd_array = array();

while ($pwd_row = $sql->fetch(PDO::FETCH_ASSOC)) {
	$pwd_ID = $pwd_row['ID'];
	$username_v = $pwd_row['username'];
	$pwd_note = $pwd_row['note'];
	$display_name = $pwd_row['display_name'];
	$pwd_permission = $pwd_row['permission_lv'];
	$temp_array = array($pwd_ID, $username_v, $pwd_note, $display_name, $pwd_permission);
	array_push($pwd_array, $temp_array);
}

echo json_encode($pwd_array);
?>