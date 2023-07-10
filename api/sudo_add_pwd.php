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

if ($_POST['permission'] == 'DEFAULT') {
	$r_permission = 'USER';
} elseif ($_POST['permission'] == 'PRIVILEGE') {
	$r_permission = 'VIP';
} elseif ($_POST['permission'] == 'OWNER') {
	$r_permission = 'ADMIN';
}

require_once 'connect_db_pdo.php';

$username_v = $_POST['username_v'];
$display_name = $_POST['display_name'];
$password_v = $_POST['pwd_v'];
$note = $_POST['note'];
$rank = $r_permission;

$passs = password_hash($password_v, PASSWORD_DEFAULT);
$sql_update = $connect->prepare("INSERT INTO pwd_verify (note, username, pwd, display_name, permission_lv) VALUES (:note, :username_v, :passs, :display_name, :rank)");
$sql_update->bindParam(':note', $note, PDO::PARAM_STR);
$sql_update->bindParam(':username_v', $username_v, PDO::PARAM_STR);
$sql_update->bindParam(':passs', $passs, PDO::PARAM_STR);
$sql_update->bindParam(':display_name', $display_name, PDO::PARAM_STR);
$sql_update->bindParam(':rank', $rank, PDO::PARAM_STR);
$sql_update->execute();

echo 'pass';
?>