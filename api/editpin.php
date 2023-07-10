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

if (isset($_POST['user_coor2_edit']) && isset($_POST['user_name_edit']) && isset($_POST['loca_name_edit']) && isset($_POST['loca_type_edit']) && isset($_POST['loca_detail_edit']) && isset($_POST['stars_edit'])) {
	if ($_POST['loca_type_edit'] == 'loca_alc') {
		$prefix = 'alc';
	} elseif ($_POST['loca_type_edit'] == 'loca_cafe') {
		$prefix = 'cf';
	} elseif ($_POST['loca_type_edit'] == 'loca_food') {
		$prefix = 'fd';
	} elseif ($_POST['loca_type_edit'] == 'loca_tamiya') {
		$prefix = 'tmy';
	} elseif ($_POST['loca_type_edit'] == 'loca_hotel') {
		$prefix = 'hotel';
	}

	require_once 'connect_db_pdo.php';

	$user_coor = $_POST['user_coor2_edit'];
	$display_name = $_POST['user_name_edit'];
	$loca_name = $_POST['loca_name_edit'];
	$loca_type = $_POST['loca_type_edit'];
	$loca_detail = $_POST['loca_detail_edit'];
	$rating = $_POST['stars_edit'];
	$last_edit = $_SESSION["username_name"];
	if (isset($_FILES['file_edit'])) {
		$FILES = $_FILES['file_edit'];
	}

	$stmt = $connect->prepare("UPDATE pindata SET coordinate=:coordinate, loca_name=:loca_name, loca_type=:loca_type, loca_detail=:loca_detail, rating=:rating, last_edit=:last_edit WHERE coordinate='" . $user_coor . "'");
	$stmt->bindParam(':coordinate', $user_coor, PDO::PARAM_STR);
	$stmt->bindParam(':loca_name', $loca_name, PDO::PARAM_STR);
	$stmt->bindParam(':loca_type', $loca_type, PDO::PARAM_STR);
	$stmt->bindParam(':loca_detail', $loca_detail, PDO::PARAM_STR);
	$stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
	$stmt->bindParam(':last_edit', $last_edit, PDO::PARAM_STR);
	$result = $stmt->execute();

	if (isset($_FILES['file_edit'])) {
		$id_img = $connect->prepare("SELECT ID FROM pindata WHERE coordinate='" . $user_coor . "'");
		$id_img->execute();
		$result__id = $id_img->fetch(PDO::FETCH_ASSOC);
		$temp = explode(".", $_FILES["file_edit"]["name"]);
		$name_file = $prefix . '_' . $result__id['ID'] . '.' . end($temp);
		$tmp_name = $_FILES['file_edit']['tmp_name'];
		$locate_img = "loca_img/";
		move_uploaded_file($tmp_name, '../' . $locate_img . $name_file);
		$loca_path = "" . $locate_img . $name_file . "";
		$sqll = "UPDATE pindata SET img_path = '" . $loca_path . "' WHERE ID=" . $result__id['ID'] . "";
		$path_update = $connect->prepare("UPDATE pindata SET img_path = '" . $loca_path . "' WHERE ID=" . $result__id['ID'] . "");
		$update_path = $path_update->execute();
	}

	$loca_type_2 = explode('_', $loca_type);
	echo $loca_type_2[1];
	die();
}
