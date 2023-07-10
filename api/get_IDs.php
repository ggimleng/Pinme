<?php
require_once 'connect_db_pdo.php';
$rating_selected = $_POST['rating_selected'];
if (isset($_POST['type_selected'])) {
	$type_selected = $_POST['type_selected'];
} else {
	$type_selected = array();
}

$ID_array = array();

$rating_tmp = "";
foreach ($rating_selected as $key => $value) {
	$rating_tmp = $rating_tmp . ',' . $value;
}
$rating_filtered = '0' . $rating_tmp;

if (in_array('#filter_food', $type_selected)) {
	$sql = $connect->prepare("SELECT * FROM pindata WHERE loca_type='loca_food' AND rating IN(" . $rating_filtered . ")");
	$sql->execute();
	while ($sql_filter = $sql->fetch(PDO::FETCH_ASSOC)) {
		array_push($ID_array, $sql_filter['ID']);
	}
}

if (in_array('#filter_tamiya', $type_selected)) {
	$sql = $connect->prepare("SELECT * FROM pindata WHERE loca_type='loca_tamiya' AND rating IN(" . $rating_filtered . ")");
	$sql->execute();
	while ($sql_filter = $sql->fetch(PDO::FETCH_ASSOC)) {
		array_push($ID_array, $sql_filter['ID']);
	}
}

if (in_array('#filter_alc', $type_selected)) {
	$sql = $connect->prepare("SELECT * FROM pindata WHERE loca_type='loca_alc' AND rating IN(" . $rating_filtered . ")");
	$sql->execute();
	while ($sql_filter = $sql->fetch(PDO::FETCH_ASSOC)) {
		array_push($ID_array, $sql_filter['ID']);
	}
}

if (in_array('#filter_cafe', $type_selected)) {
	$sql = $connect->prepare("SELECT * FROM pindata WHERE loca_type='loca_cafe' AND rating IN(" . $rating_filtered . ")");
	$sql->execute();
	while ($sql_filter = $sql->fetch(PDO::FETCH_ASSOC)) {
		array_push($ID_array, $sql_filter['ID']);
	}
}

if (in_array('#filter_hotel', $type_selected)) {
	$sql = $connect->prepare("SELECT * FROM pindata WHERE loca_type='loca_hotel' AND rating IN(" . $rating_filtered . ")");
	$sql->execute();
	while ($sql_filter = $sql->fetch(PDO::FETCH_ASSOC)) {
		array_push($ID_array, $sql_filter['ID']);
	}
}
echo json_encode($ID_array);
?>