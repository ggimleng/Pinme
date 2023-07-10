<?php
session_start();
if (isset($_SESSION["pwd_check"])) {
	if ($_SESSION["pwd_check"] == 'USER' or $_SESSION["pwd_check"] == 'VIP') {
		$session_stat = 'true';
	} else if ($_SESSION["pwd_check"] == 'ADMIN') {
		echo 'perm_access';
		die();
	} else {
		$_SESSION["pwd_check"] = 'none';
		$session_stat = 'false';
		echo $session_stat;
		die();
	}
} else {
	$_SESSION["pwd_check"] = 'none';
	$session_stat = 'false';
	echo $session_stat;
	die();
}

if ($session_stat == 'true') {
	require_once 'connect_db_pdo.php';
	$ID = $_POST['ID'];
	$sql = $connect->prepare("SELECT * FROM pindata WHERE ID = '" . $ID . "'");
	$sql->execute();
	$result_sql = $sql->fetch(PDO::FETCH_ASSOC);
	$pin_username = $result_sql['user_name'];
	if ($pin_username == $_SESSION["username"]) {
		echo 'perm_access';
	} else {
		echo 'perm_denied';
	}
}
?>