<?php
session_start();
if ($_SESSION["pwd_check"] == 'USER' or $_SESSION["pwd_check"] == 'VIP' or $_SESSION["pwd_check"] == 'ADMIN') {
	$session_stat = 'true';
} else {
	$_SESSION["pwd_check"] = 'none';
	$session_stat = 'false';
}

if ($session_stat == 'true') {
	$del_result = array();
	require_once 'connect_db_pdo.php';
	$ID = $_POST['ID'];
	$sql = $connect->prepare("SELECT * FROM pindata WHERE ID = '" . $ID . "'");
	$sql->execute();
	while ($result__verify = $sql->fetch(PDO::FETCH_ASSOC)) {
		$loca_type = $result__verify['loca_type'];
		array_push($del_result, $loca_type);
		$sql_del = $connect->prepare("DELETE FROM pindata WHERE ID = '" . $ID . "'");
		$sql_del->execute();
		array_push($del_result, 'del_complete');
		echo json_encode($del_result);
		die();
	}
}
else {
	echo json_encode('failed');
}
?>