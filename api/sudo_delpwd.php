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

$ID = $_POST['ID'];
require_once 'connect_db_pdo.php';
$sql = $connect->prepare("DELETE FROM pwd_verify WHERE ID = '" . $ID . "'");
$sql->execute();

echo 'complete';
?>