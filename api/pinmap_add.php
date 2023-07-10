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

if (isset($_POST['user_coor2']) && isset($_POST['user_name']) && isset($_POST['loca_name']) && isset($_POST['loca_type']) && isset($_POST['loca_detail']) && isset($_POST['stars']) && isset($_FILES['file'])) {
	if ($_POST['loca_type'] == 'loca_alc') {
		$prefix = 'alc';
	} elseif ($_POST['loca_type'] == 'loca_cafe') {
		$prefix = 'cf';
	} elseif ($_POST['loca_type'] == 'loca_food') {
		$prefix = 'fd';
	} elseif ($_POST['loca_type'] == 'loca_tamiya') {
		$prefix = 'tmy';
	}

	require_once 'connect_db_pdo.php';

	$user_coor = $_POST['user_coor2'];
	$display_name = $_POST['user_name'];
	$loca_name = $_POST['loca_name'];
	$loca_type = $_POST['loca_type'];
	$loca_detail = $_POST['loca_detail'];
	$rating = $_POST['stars'];
	$FILES = $_FILES['file'];
	$username_name = $_SESSION["username"];
	$_blank_edit = '-';

	$stmt = $connect->prepare("INSERT INTO pindata (coordinate, user_name,display_name , loca_name, loca_type, loca_detail, rating, last_edit) VALUES (:coordinate, :user_name,:display_name, :loca_name, :loca_type, :loca_detail, :rating, :last_edit)");
	$stmt->bindParam(':coordinate', $user_coor, PDO::PARAM_STR);
	$stmt->bindParam(':user_name', $username_name, PDO::PARAM_STR);
	$stmt->bindParam(':display_name', $display_name, PDO::PARAM_STR);
	$stmt->bindParam(':loca_name', $loca_name, PDO::PARAM_STR);
	$stmt->bindParam(':loca_type', $loca_type, PDO::PARAM_STR);
	$stmt->bindParam(':loca_detail', $loca_detail, PDO::PARAM_STR);
	$stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
	$stmt->bindParam(':last_edit', $_blank_edit, PDO::PARAM_STR);
	$result = $stmt->execute();


	$id_img = $connect->prepare("SELECT ID FROM pindata WHERE coordinate='" . $user_coor . "'");
	$id_img->execute();
	$result__id = $id_img->fetch(PDO::FETCH_ASSOC);
	$temp = explode(".", $_FILES["file"]["name"]);
	$name_file = $prefix . '_' . $result__id['ID'] . '.' . end($temp);
	$tmp_name = $_FILES['file']['tmp_name'];
	$locate_img = "loca_img/";
	move_uploaded_file($tmp_name, '../' . $locate_img . $name_file);
	$loca_path = "" . $locate_img . $name_file . "";
	$sqll = "UPDATE pindata SET img_path = '" . $loca_path . "' WHERE ID=" . $result__id['ID'] . "";
	$path_update = $connect->prepare("UPDATE pindata SET img_path = '" . $loca_path . "' WHERE ID=" . $result__id['ID'] . "");
	$update_path = $path_update->execute();

	if ($update_path) {
		$loca_type_2 = explode('_', $loca_type);
		echo $loca_type_2[1];
		die();
	} else {
		echo 'failed';
		die();
	}
}
?>