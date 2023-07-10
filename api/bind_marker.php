<?php
require_once 'connect_db_pdo.php';
$IDs_selected = $_POST['IDs_list'];
$sql = $connect->prepare("SELECT * FROM pindata WHERE ID=" . $IDs_selected . "");
$sql->execute();
$b_result = array();

while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
	$b_ID = $row['ID'];
	$b_coordinate = $row['coordinate'];
	$b_user_name = $row['display_name'];
	$b_loca_name = $row['loca_name'];
	$b_loca_type = $row['loca_type'];
	$b_loca_detail = $row['loca_detail'];
	$b_rating = $row['rating'];
	$b_img_path = $row['img_path'];
	$b_last_edit = $row['last_edit'];
}
$b_coordinate_explode = explode(",", $b_coordinate);
$b_lat = $b_coordinate_explode[0];
$b_lng = $b_coordinate_explode[1];

if ($b_loca_type == 'loca_food') {
	$b_loca_type_n = 'ร้านอาหาร';
} else if ($b_loca_type == 'loca_tamiya') {
	$b_loca_type_n = 'ทามิยะ';
} else if ($b_loca_type == 'loca_alc') {
	$b_loca_type_n = 'ร้านนั่งชิล';
} else if ($b_loca_type == 'loca_cafe') {
	$b_loca_type_n = 'คาเฟ่';
} else if ($b_loca_type == 'loca_hotel') {
	$b_loca_type_n = 'ที่พัก';
}

$rating_point = "";
if ($b_rating == "1") {
	$rating_point = "<span style='color:#D02912'>♥</span>♥♥♥♥";
} elseif ($b_rating == "2") {
	$rating_point = "<span style='color:#D02912'>♥♥</span>♥♥♥";
} elseif ($b_rating == "3") {
	$rating_point = "<span style='color:#D02912'>♥♥♥</span>♥♥";
} elseif ($b_rating == "4") {
	$rating_point = "<span style='color:#D02912'>♥♥♥♥</span>♥";
} elseif ($b_rating == "5") {
	$rating_point = "<span style='color:#D02912'>♥♥♥♥♥</span>";
}

$b_result = [$b_ID, $b_lat, $b_lng, $b_user_name, $b_loca_name, $b_loca_type, $b_loca_detail, $b_rating, $b_img_path, $b_loca_type_n, $rating_point, $b_last_edit];
echo json_encode($b_result);
