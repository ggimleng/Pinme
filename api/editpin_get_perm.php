<?php
session_start();
if ($_SESSION["pwd_check"] == 'USER' or $_SESSION["pwd_check"] == 'VIP' or $_SESSION["pwd_check"] == 'ADMIN') {
	$session_stat = 'true';
} else {
	$_SESSION["pwd_check"] = 'none';
	$session_stat = 'false';
	echo $session_stat;
	die();
}

if ($session_stat != 'true') {
	echo $session_stat;
	die();
}

$id_edit = $_POST['id_edit'];
$loca_data = array();

require_once 'connect_db_pdo.php';
$stmt = $connect->prepare("SELECT * FROM pindata WHERE ID='" . $id_edit . "'");
$stmt->execute();
while ($id_getdata = $stmt->fetch(PDO::FETCH_ASSOC)) {
	array_push($loca_data, $id_getdata['ID']);
	array_push($loca_data, $id_getdata['coordinate']);
	array_push($loca_data, $id_getdata['display_name']);
	array_push($loca_data, $id_getdata['loca_name']);
	array_push($loca_data, $id_getdata['loca_type']);
	array_push($loca_data, $id_getdata['loca_detail']);
	array_push($loca_data, $id_getdata['rating']);
	array_push($loca_data, $id_getdata['img_path']);
	if ($session_stat == 'true') {
		$sql = $connect->prepare("SELECT * FROM pindata WHERE ID = '" . $id_edit . "'");
		$sql->execute();
		$result_sql = $sql->fetch(PDO::FETCH_ASSOC);
		$edit_pin_username = $result_sql['user_name'];
		if ($edit_pin_username == $_SESSION["username"]) {
			array_push($loca_data, 'access');
		} elseif ($_SESSION["pwd_check"] == 'ADMIN') {
			array_push($loca_data, 'access');
		} else {
			// prevent user to edit other pin
			/*array_push($loca_data, 'denied');*/
			array_push($loca_data, 'access');
		}
	}
}

echo json_encode($loca_data);
?>