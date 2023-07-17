<html>

<head>
	<title>Pinme | Web map</title>
	<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta charset="UTF-8">
	<!--CSS-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
		integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/L.switchBasemap.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
	<link href="css/all.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/leaflet-routing-machine.css" />
	<link rel="stylesheet" href="css/Control.Geocoder.css" />
	<link rel="stylesheet" href="css/bootstrap-switch-button.min.css" />
	<link rel="stylesheet" href="css/L.Control.Locate.min.css" />
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/rating.css" />
	<link rel="stylesheet" href="css/sidebar.css" />
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
		rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<!--JS-->
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"
		integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<script src="js/bootstrap-switch-button.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
		integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
	<script src="js/L.switchBasemap.js"></script>
	<script src="js/leaflet-routing-machine.js"></script>
	<script src="js/Control.Geocoder.js"></script>
	<script src='js/turf.min.js'></script>
	<script src='js/L.Control.Locate.min.js'></script>
	<script src='js/leaflet.ajax.min.js'></script>
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
</head>

<body>

	<div id="Sidenav" class="sidenav" style="height: 0px;">
		<p>
			<a class="btn btn-primary text-white" id="passcode_signin" role="button" aria-expanded="false"
				aria-controls="passcode_collapse" onclick="pc_modal()">
				เข้าสู่ระบบ
			</a>
		</p>
		<p>
			<a id="button_for_navigator" class="btn btn-primary text-white" data-toggle="collapse"
				data-target="#navigator_collapse" role="button" aria-expanded="false" aria-controls="navigator_collapse"
				onclick="close_collapes('navigator')">
				เส้นทาง
			</a>
		</p>
		<div class="collapse navigator_collapse" id="navigator_collapse" data-bs-parent="#Sidenav">
			<div class="card_nav card-body" id="navigator_osrm">
			</div>
		</div>
		<p>
			<a id="button_for_filter" class="btn btn-primary text-white" data-toggle="collapse"
				data-target="#filter_collapse" role="button" aria-expanded="false" aria-controls="filter_collapse"
				onclick="close_collapes('filter')">
				ตัวกรอง
			</a>
		</p>
		<div class="collapse filter_collapse" id="filter_collapse" data-bs-parent="#Sidenav">
			<div class="card_nav card-body">
				<div class="filter_box">
					<table class="filter_form" border="0" cellspacing="0" cellpadding="5">
						<tr>
							<td>ร้านอาหาร</td>
							<td><input id="filter_food" type="checkbox" checked data-toggle="toggle" data-style="ios"
									data-onstyle="outline-success" data-offstyle="outline-danger">
							</td>
							<td rowspan="5"><button class="btn" aria-controls="filter_rating_collapse"><i
										class="fa-solid fa-arrow-right fa-lg" style="color: #264a1c;"
										onclick="close_collapes('filter_rating')"></i></button></td>
						</tr>
						<tr>
							<td>คาเฟ่</td>
							<td><input id="filter_cafe" type="checkbox" checked data-toggle="toggle" data-style="ios"
									data-onstyle="outline-success" data-offstyle="outline-danger">
							</td>
						</tr>
						<tr>
							<td>ร้านนั่งชิล</td>
							<td><input id="filter_alc" type="checkbox" checked data-toggle="toggle" data-style="ios"
									data-onstyle="outline-success" data-offstyle="outline-danger"></td>
						</tr>
						<tr>
							<td>ทามิยะ</td>
							<td><input id="filter_tamiya" type="checkbox" checked data-toggle="toggle" data-style="ios"
									data-onstyle="outline-success" data-offstyle="outline-danger">
							</td>
						</tr>
						<tr>
							<td>ที่พัก</td>
							<td><input id="filter_hotel" type="checkbox" checked data-toggle="toggle" data-style="ios"
									data-onstyle="outline-success" data-offstyle="outline-danger">
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="collapse filter_rating_collapse" id="filter_rating_collapse" data-bs-parent="#Sidenav">
			<div class="card_nav card-body">
				<div class="filter_rating_box">
					<table class="filter_rating_form" border="0" cellspacing="0" cellpadding="5">
						<tr>
							<td>
								<font color="#FF3D22">♥</font>♥♥♥♥
							</td>
							<td><input id="filter_r1" type="checkbox" checked data-toggle="toggle" data-style="ios"
									data-onstyle="outline-success" data-offstyle="outline-danger"></td>
							<td rowspan="5"><button onclick="close_collapes('filter_rating_back')" class="btn"
									aria-controls="filter_rating_collapse"><i class="fa-solid fa-arrow-left fa-lg"
										style="color: #264a1c;"></i></button></td>
						</tr>
						<tr>
							<td>
								<font color="#FF3D22">♥♥</font>♥♥♥
							</td>
							<td><input id="filter_r2" type="checkbox" checked data-toggle="toggle" data-style="ios"
									data-onstyle="outline-success" data-offstyle="outline-danger"></td>
						</tr>
						<tr>
							<td>
								<font color="#FF3D22">♥♥♥</font>♥♥
							</td>
							<td><input id="filter_r3" type="checkbox" checked data-toggle="toggle" data-style="ios"
									data-onstyle="outline-success" data-offstyle="outline-danger"></td>
						</tr>
						<tr>
							<td>
								<font color="#FF3D22">♥♥♥♥</font>♥
							</td>
							<td><input id="filter_r4" type="checkbox" checked data-toggle="toggle" data-style="ios"
									data-onstyle="outline-success" data-offstyle="outline-danger"></td>
						</tr>
						<tr>
							<td>
								<font color="#FF3D22">♥♥♥♥♥</font>
							</td>
							<td><input id="filter_r5" type="checkbox" checked data-toggle="toggle" data-style="ios"
									data-onstyle="outline-success" data-offstyle="outline-danger"></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div id="pc_modal" class="modal fade" style="--bs-modal-width: 400px;">
		<div class="modal-dialog" style="top: 30%;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fa-solid fa-lock"></i> ยืนยันผู้ใช้งาน</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form name="pc_form" id="pc_form" method="post">
					<table class="modal_form" border="0" cellspacing="0" cellpadding="10">
						<tr>
							<td class="modal_font"><i class="fa-solid fa-user"></i> บัญชีผู้ใช้</td>
							<td><input class="textInput modal_font" type="text" name="username_u" required></td>
						</tr>
						<tr>
							<td class="modal_font"><i class="fa-solid fa-key"></i> รหัสผ่าน</td>
							<td><input class="textInput modal_font" type="password" name="passcode" required></td>
						</tr>
					</table>
					<br>
					<center><button type="submit" class="btn btn-primary modal_font">เข้าสู่ระบบ</button></center>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="img_preview" style="z-index: 1100;" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span
							aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				</div>
				<div class="modal-body">
					<img src="#" id="imagepreview" style="width: 100%">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="img_preview_2" style="z-index: 1100;" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span
							aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				</div>
				<div class="modal-body">
					<img src="assets/img/no_photo.jpg" id="imagepreview_2" style="width: 100%">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="img_preview_3" style="z-index: 1100;" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span
							aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				</div>
				<div class="modal-body">
					<img src="assets/img/no_photo.jpg" id="imagepreview_3" style="width: 100%">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				</div>
			</div>
		</div>
	</div>


	<div id="pinModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fa-solid fa-map-pin"></i> เพิ่มหมุด</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form name="pin_map" id="pin_map" method="post" enctype=multipart/form-data>
					<table class="modal_form" border="0" cellspacing="0" cellpadding="10">
						<tr>
							<td class="modal_font"><i class="fa-solid fa-map-location-dot"></i> พิกัดจุดที่เลือก</td>
							<td><input id="user_coor2" class="textInput modal_font" style="border: 0px solid;"
									type="text" name="user_coor2" readonly required></td>
						</tr>
						<tr>
							<td class="modal_font"><i class="fa-solid fa-user"></i> ชื่อผู้ปักหมุด</td>
							<td><input id="pin_username" class="textInput modal_font" type="text" name="user_name"
									readonly required></td>
						</tr>

						<tr>
							<td class="modal_font"><i class="fa-sharp fa-solid fa-location-pin"></i> ชื่อสถานที่</td>
							<td><input class="textInput modal_font" type="text" name="loca_name" required></td>
						</tr>

						<tr>
							<td class="modal_font"><i class="fa-solid fa-flag"></i> ประเภท</td>
							<td><select name="loca_type" id="loca_type">
									<option value="loca_food" class="modal_font">ร้านอาหาร</option>
									<option value="loca_cafe" class="modal_font">คาเฟ่</option>
									<option value="loca_alc" class="modal_font">ร้านนั่งชิล</option>
									<option value="loca_tamiya" class="modal_font">ทามิยะ</option>
									<option value="loca_hotel" class="modal_font">ที่พัก</option>
								</select></td>
						</tr>
						<tr>
							<td class="modal_font"><i class="fa-solid fa-message"></i> รายละเอียด</td>
							<td><textarea class="modal_font" rows='4' name='loca_detail'
									style='border: 1 solid #99FF00'></textarea>

						<tr>
							<td class="modal_font"><i class="fa-solid fa-heart"></i> ความพึงพอใจ</td>

							<td>
								<div class="rating">
									<label>
										<input type="radio" name="stars" value="1" />
										<span class="icon">♥</span>
									</label>
									<label>
										<input type="radio" name="stars" value="2" />
										<span class="icon">♥</span>
										<span class="icon">♥</span>
									</label>
									<label>
										<input type="radio" name="stars" value="3" />
										<span class="icon">♥</span>
										<span class="icon">♥</span>
										<span class="icon">♥</span>
									</label>
									<label>
										<input type="radio" name="stars" value="4" />
										<span class="icon">♥</span>
										<span class="icon">♥</span>
										<span class="icon">♥</span>
										<span class="icon">♥</span>
									</label>
									<label>
										<input type="radio" name="stars" value="5" />
										<span class="icon">♥</span>
										<span class="icon">♥</span>
										<span class="icon">♥</span>
										<span class="icon">♥</span>
										<span class="icon">♥</span>
									</label>
								</div>
							</td>
						</tr>

						<tr>
							<td class="modal_font"><i class="fa-sharp fa-solid fa-image"></i> รูปภาพเพิ่มเติม</td>
							<td>
								<input class="form-control form-control-sm font_modal" id="file" type="file" multiple
									name="file" accept="image/*" required>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><a href="javascript:$('#img_preview_2').modal('show');">(พรีวิวภาพที่เลือก)</a></td>
						</tr>
						<tr>
							<td class="modal_font"><i class="fa-brands fa-line"></i> แจ้งเตือนลงไลน์</td>
							<td><input id="line_noti_check" name="line_noti_check" type="checkbox" checked
									data-toggle="toggle" data-size="small" data-onstyle="success" data-on="✓"
									data-off="✖"></td>
						</tr>
					</table>
					<br>
					<center><button id="addpin_button" type="submit" class="btn btn-primary modal_font">เพิ่มหมุด</button></center>
				</form>
			</div>
		</div>
	</div>

	<div id="editpin" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fa-solid fa-map-pin"></i> แก้ไขหมุด</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form name="pin_map_edit" id="pin_map_edit" method="post" enctype=multipart/form-data>
					<table class="modal_form" border="0" cellspacing="0" cellpadding="10">
						<tr>
							<td class="modal_font"><i class="fa-solid fa-map-location-dot"></i> พิกัดจุดที่เลือก</td>
							<td><input id="user_coor2_edit" class="textInput modal_font" style="border: 0px solid;"
									type="text" name="user_coor2_edit" readonly required></td>
						</tr>
						<tr>
							<td class="modal_font"><i class="fa-solid fa-user"></i> ชื่อผู้ปักหมุด</td>
							<td><input class="textInput modal_font" type="text" id="user_name_edit"
									name="user_name_edit" readonly required></td>
						</tr>

						<tr>
							<td class="modal_font"><i class="fa-sharp fa-solid fa-location-pin"></i> ชื่อสถานที่</td>
							<td><input class="textInput modal_font" type="text" id="loca_name_edit"
									name="loca_name_edit" required></td>
						</tr>

						<tr>
							<td class="modal_font"><i class="fa-solid fa-flag"></i> ประเภท</td>
							<td><select name="loca_type_edit" id="loca_type_edit">
									<option value="loca_food" class="modal_font">ร้านอาหาร</option>
									<option value="loca_cafe" class="modal_font">คาเฟ่</option>
									<option value="loca_alc" class="modal_font">ร้านนั่งชิล</option>
									<option value="loca_tamiya" class="modal_font">ทามิยะ</option>
									<option value="loca_hotel" class="modal_font">ที่พัก</option>
								</select></td>
						</tr>
						<tr>
							<td class="modal_font"><i class="fa-solid fa-message"></i> รายละเอียด</td>
							<td><textarea class="modal_font" rows='4' name='loca_detail_edit' id="loca_detail_edit"
									style='border: 1 solid #99FF00'></textarea>

						<tr>
							<td class="modal_font"><i class="fa-solid fa-heart"></i> ความพึงพอใจ</td>

							<td>
								<div class="rating">
									<label>
										<input type="radio" id="rating_1" name="stars_edit" value="1" />
										<span class="icon">♥</span>
									</label>
									<label>
										<input type="radio" id="rating_2" name="stars_edit" value="2" />
										<span class="icon">♥</span>
										<span class="icon">♥</span>
									</label>
									<label>
										<input type="radio" id="rating_3" name="stars_edit" value="3" />
										<span class="icon">♥</span>
										<span class="icon">♥</span>
										<span class="icon">♥</span>
									</label>
									<label>
										<input type="radio" id="rating_4" name="stars_edit" value="4" />
										<span class="icon">♥</span>
										<span class="icon">♥</span>
										<span class="icon">♥</span>
										<span class="icon">♥</span>
									</label>
									<label>
										<input type="radio" id="rating_5" name="stars_edit" value="5" />
										<span class="icon">♥</span>
										<span class="icon">♥</span>
										<span class="icon">♥</span>
										<span class="icon">♥</span>
										<span class="icon">♥</span>
									</label>
								</div>
							</td>
						</tr>

						<tr>
							<td class="modal_font"><i class="fa-sharp fa-solid fa-image"></i> รูปภาพเพิ่มเติม</td>
							<td>
								<input class="form-control form-control-sm font_modal" id="file_edit" type="file"
									multiple name="file_edit" accept="image/*">
							</td>
						</tr>
						<tr>
							<td class="modal_font"> </td>
							<td class="modal_font">
								<a href="javascript:$('#img_preview').modal('show');">(ดูภาพก่อนหน้า)</a>
								<a href="javascript:$('#img_preview_3').modal('show');">(ดูภาพที่เลือก)</a>
							</td>
						</tr>
					</table>
					<br>
					<center><button type="submit" class="btn btn-primary modal_font">แก้ไขหมุด</button></center>
				</form>
			</div>
		</div>
	</div>

	<div id="delpin_confirm" class="modal fade">
		<div class="modal-dialog" style="top: 30%;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fa-solid fa-trash fa-shake"></i></i> ยืนยันการลบหมุด</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<p>ต้องการลบหมุดที่เลือกใช่หรือไม่<br><br></p>
					<center><button id="delpin_button" type="button" class="btn btn-danger">ลบหมุด</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>
					</center>
				</div>
			</div>
		</div>
	</div>

	<nav class="navbar bg-secondary text-uppercase fixed-bottom" style="padding-bottom: 1px;padding-top: 1px;"
		id="mainNav">
		<div class="container" id="main_navbar" style="margin-bottom: 0px;">
			<a class="navbar-brand"><i class="fa-solid fa-location-pin fa-bounce"></i> Pin<font color="#FF6666">me
				</font></a>
			<button class="navbar-toggler text-uppercase font-weight-bold text-white rounded" type="button"
				data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
				aria-expanded="false" aria-label="Toggle navigation" onclick="openNav()"><i id="menu_icon"
					class="fa-solid fa-bars fa-lg"></i></button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ms-auto">
				</ul>
			</div>
		</div>
	</nav>
	<div id="map" style="height: 100%;"></div>
	<script>
		var map = L.map('map').setView([13.746268, 100.5258001], 5);

		var rating_array = [0, 1, 2, 3, 4, 5];

		var loca_food = L.icon({
			iconUrl: 'assets/img/loca_food.png',
			iconSize: [30, 30],
		});

		var loca_tamiya = L.icon({
			iconUrl: 'assets/img/loca_tamiya.png',
			iconSize: [30, 30],
		});

		var loca_cafe = L.icon({
			iconUrl: 'assets/img/loca_cafe.png',
			iconSize: [30, 30],
		});

		var loca_alc = L.icon({
			iconUrl: 'assets/img/loca_alc.png',
			shadowSize: [30, 34],
			iconSize: [30, 30],
		});

		var loca_hotel = L.icon({
			iconUrl: 'assets/img/loca_hotel.png',
			shadowSize: [30, 34],
			iconSize: [30, 30],
		});





		function get_IDs(type_func) {
			const rating_arr = new Array();
			for (i in [...Array(5).keys()]) {
				var num_rating = parseInt(i) + 1;
				var r_num = '#filter_r' + num_rating;
				if ($(r_num).is(':checked')) {
					rating_arr.push(num_rating);
				}
			}
			if (type_func == 'all') {
				var filter_list = ['filter_food', 'filter_tamiya', 'filter_alc', 'filter_cafe', 'filter_hotel'];
			}
			else if (type_func == 'food') {
				var filter_list = ['filter_food'];
			}
			else if (type_func == 'tamiya') {
				var filter_list = ['filter_tamiya'];
			}
			else if (type_func == 'alc') {
				var filter_list = ['filter_alc'];
			}
			else if (type_func == 'cafe') {
				var filter_list = ['filter_cafe'];
			}
			else if (type_func == 'hotel') {
				var filter_list = ['filter_hotel'];
			}

			const type_arr = new Array();
			for (i in [...Array(filter_list.length).keys()]) {
				var type_name = '#' + filter_list[i];
				if ($(type_name).is(':checked')) {
					type_arr.push(type_name);
				}
			}
			$.ajax({
				url: "api/get_IDs.php",
				type: "POST",
				data: { 'rating_selected': rating_arr, 'type_selected': type_arr },
				success: function (data) {
					var data = JSON.parse(data);
					Bind_marker(data);
				}
			})
		}

		function Bind_marker(data) {
			for (var i = 0; i < data.length; i++) {
				data_spt = data[i];
				$.ajax({
					url: "api/bind_marker.php",
					type: "POST",
					data: { 'IDs_list': data_spt },
					success: function (data) {
						var data = JSON.parse(data);
						var b_ID = data[0];
						var b_lat = data[1];
						var b_lng = data[2];
						var b_user_name = data[3];
						var b_loca_name = data[4];
						var b_loca_type = data[5];
						var b_loca_detail = data[6];
						var b_rating = data[7];
						var b_img_path = data[8];
						var b_latlng = L.latLng(parseFloat(b_lat), parseFloat(b_lng));
						var b_loca_type_n = data[9];
						var b_rating_point = data[10];
						var b_last_edit = data[11];
						if (b_loca_type == 'loca_food') {
							var marker = L.marker(b_latlng, { icon: loca_food }).addTo(map);
							marker.bindPopup("<input type='hidden' id='ID' name='ID' value='" + b_ID + "'>\
								<b><center>" + b_loca_name + "</center>\
								</b><br><b>ประเภท:</b> " + b_loca_type_n + "<br><b>รายละเอียด:</b> " + b_loca_detail + " <br><br>\
								<center><img width='200px'src='" + b_img_path + "'></center><br>\
								<b>ความพึงพอใจ:</b> " + b_rating_point + "<br><b>ผู้เพิ่มหมุด:</b> " + b_user_name + "<br>\
								<b>แก้ไขล่าสุด:</b> " + b_last_edit + "<br><br>\
								<input id='start_driving' type='button' value='เริ่มเดินทาง'  name='start_driving' class='btn btn-primary btn-sm btn-block' onclick='start_driving("+ b_lat + "," + b_lng + ")'><br>\
								<input id='start_driving_gmap' type='button' value='เดินทางบน Google Map' style='margin-top: 3px;'  name='start_driving_gmap' class='btn btn-dark btn-sm btn-block' onclick='start_driving_gmap("+ b_lat + "," + b_lng + ")'><br>\
								<input id='editpin' type='button' value='แก้ไขหมุด' style='margin-top: 3px;'  name='editpin' class='btn btn-secondary btn-sm btn-block' onclick='editpin(" + b_ID + ")'><br>\
								<input id='delete_pin_button' type='button' value='ลบหมุด' style='margin-top: 3px;'  name='delpin_map' class='btn btn-danger btn-sm btn-block' onclick='delpin_check(" + b_ID + ")'>")
						}
						else if (b_loca_type == 'loca_tamiya') {
							var marker = L.marker(b_latlng, { icon: loca_tamiya }).addTo(map);
							marker.bindPopup("<input type='hidden' id='ID' name='ID' value='" + b_ID + "'>\
								<b><center>" + b_loca_name + "</center>\
								</b><br><b>ประเภท:</b> " + b_loca_type_n + "<br><b>รายละเอียด:</b> " + b_loca_detail + " <br><br>\
								<center><img width='200px'src='" + b_img_path + "'></center><br>\
								<b>ความพึงพอใจ:</b> " + b_rating_point + "<br><b>ผู้เพิ่มหมุด:</b> " + b_user_name + "<br>\
								<b>แก้ไขล่าสุด:</b> " + b_last_edit + "<br><br>\
								<input id='start_driving' type='button' value='เริ่มเดินทาง'  name='start_driving' class='btn btn-primary btn-sm btn-block' onclick='start_driving("+ b_lat + "," + b_lng + ")'><br>\
								<input id='start_driving_gmap' type='button' value='เดินทางบน Google Map' style='margin-top: 3px;'  name='start_driving_gmap' class='btn btn-dark btn-sm btn-block' onclick='start_driving_gmap("+ b_lat + "," + b_lng + ")'><br>\
								<input id='editpin' type='button' value='แก้ไขหมุด' style='margin-top: 3px;'  name='editpin' class='btn btn-secondary btn-sm btn-block' onclick='editpin(" + b_ID + ")'><br>\
								<input id='delete_pin_button' type='button' value='ลบหมุด' style='margin-top: 3px;'  name='delpin_map' class='btn btn-danger btn-sm btn-block' onclick='delpin_check(" + b_ID + ")'>")
						}
						else if (b_loca_type == 'loca_alc') {
							var marker = L.marker(b_latlng, { icon: loca_alc }).addTo(map);
							marker.bindPopup("<input type='hidden' id='ID' name='ID' value='" + b_ID + "'>\
								<b><center>" + b_loca_name + "</center>\
								</b><br><b>ประเภท:</b> " + b_loca_type_n + "<br><b>รายละเอียด:</b> " + b_loca_detail + " <br><br>\
								<center><img width='200px'src='" + b_img_path + "'></center><br>\
								<b>ความพึงพอใจ:</b> " + b_rating_point + "<br><b>ผู้เพิ่มหมุด:</b> " + b_user_name + "<br>\
								<b>แก้ไขล่าสุด:</b> " + b_last_edit + "<br><br>\
								<input id='start_driving' type='button' value='เริ่มเดินทาง'  name='start_driving' class='btn btn-primary btn-sm btn-block' onclick='start_driving("+ b_lat + "," + b_lng + ")'><br>\
								<input id='start_driving_gmap' type='button' value='เดินทางบน Google Map' style='margin-top: 3px;'  name='start_driving_gmap' class='btn btn-dark btn-sm btn-block' onclick='start_driving_gmap("+ b_lat + "," + b_lng + ")'><br>\
								<input id='editpin' type='button' value='แก้ไขหมุด' style='margin-top: 3px;'  name='editpin' class='btn btn-secondary btn-sm btn-block' onclick='editpin(" + b_ID + ")'><br>\
								<input id='delete_pin_button' type='button' value='ลบหมุด' style='margin-top: 3px;'  name='delpin_map' class='btn btn-danger btn-sm btn-block' onclick='delpin_check(" + b_ID + ")'>")
						}
						else if (b_loca_type == 'loca_cafe') {
							var marker = L.marker(b_latlng, { icon: loca_cafe }).addTo(map);
							marker.bindPopup("<input type='hidden' id='ID' name='ID' value='" + b_ID + "'>\
								<b><center>" + b_loca_name + "</center>\
								</b><br><b>ประเภท:</b> " + b_loca_type_n + "<br><b>รายละเอียด:</b> " + b_loca_detail + " <br><br>\
								<center><img width='200px'src='" + b_img_path + "'></center><br>\
								<b>ความพึงพอใจ:</b> " + b_rating_point + "<br><b>ผู้เพิ่มหมุด:</b> " + b_user_name + "<br>\
								<b>แก้ไขล่าสุด:</b> " + b_last_edit + "<br><br>\
								<input id='start_driving' type='button' value='เดินทาง'  name='start_driving' class='btn btn-primary btn-sm btn-block' onclick='start_driving("+ b_lat + "," + b_lng + ")'><br>\
								<input id='start_driving_gmap' type='button' value='เดินทางบน Google Map' style='margin-top: 3px;'  name='start_driving_gmap' class='btn btn-dark btn-sm btn-block' onclick='start_driving_gmap("+ b_lat + "," + b_lng + ")'><br>\
								<input id='editpin' type='button' value='แก้ไขหมุด' style='margin-top: 3px;'  name='editpin' class='btn btn-secondary btn-sm btn-block' onclick='editpin(" + b_ID + ")'><br>\
								<input id='delete_pin_button' type='button' value='ลบหมุด' style='margin-top: 3px;'  name='delpin_map' class='btn btn-danger btn-sm btn-block' onclick='delpin_check(" + b_ID + ")'>")
						}
						else if (b_loca_type == 'loca_hotel') {
							var marker = L.marker(b_latlng, { icon: loca_hotel }).addTo(map);
							marker.bindPopup("<input type='hidden' id='ID' name='ID' value='" + b_ID + "'>\
								<b><center>" + b_loca_name + "</center>\
								</b><br><b>ประเภท:</b> " + b_loca_type_n + "<br><b>รายละเอียด:</b> " + b_loca_detail + " <br><br>\
								<center><img width='200px'src='" + b_img_path + "'></center><br>\
								<b>ความพึงพอใจ:</b> " + b_rating_point + "<br><b>ผู้เพิ่มหมุด:</b> " + b_user_name + "<br>\
								<b>แก้ไขล่าสุด:</b> " + b_last_edit + "<br><br>\
								<input id='start_driving' type='button' value='เดินทาง'  name='start_driving' class='btn btn-primary btn-sm btn-block' onclick='start_driving("+ b_lat + "," + b_lng + ")'><br>\
								<input id='start_driving_gmap' type='button' value='เดินทางบน Google Map' style='margin-top: 3px;'  name='start_driving_gmap' class='btn btn-dark btn-sm btn-block' onclick='start_driving_gmap("+ b_lat + "," + b_lng + ")'><br>\
								<input id='editpin' type='button' value='แก้ไขหมุด' style='margin-top: 3px;'  name='editpin' class='btn btn-secondary btn-sm btn-block' onclick='editpin(" + b_ID + ")'><br>\
								<input id='delete_pin_button' type='button' value='ลบหมุด' style='margin-top: 3px;'  name='delpin_map' class='btn btn-danger btn-sm btn-block' onclick='delpin_check(" + b_ID + ")'>")
						}
						$(marker._icon).addClass(b_loca_type + '_icon');
						$(marker._icon).addClass('r_' + b_rating + 'point');
					}
				})
			}
		}


		var lc = L.control.locate({
			strings: {
				title: "ไปยังตำแหน่งปัจจุบัน"
			}
		})
			.addTo(map);

		var wp_control = L.Routing.control({
			routeWhileDragging: true,
			itineraryFormatter: "routing_system",
			serviceUrl: 'https://router.project-osrm.org/route/v1',
			geocoder: L.Control.Geocoder.nominatim(),
			createMarker: function (i, waypoints, n) {
				var startIcon = L.icon({
					iconUrl: 'assets/icon/car_icon.png',
					iconSize: [40, 40]
				});
				var sampahIcon = L.icon({
					iconUrl: 'assets/icon/flag_icon.png',
					iconSize: [50, 50]
				});
				var destinationIcon = L.icon({
					iconUrl: 'assets/icon/flag_icon.png',
					iconSize: [50, 50]
				});
				if (i == 0) {
					marker_icon = startIcon
				} else if (i > 0 && i < n - 1) {
					marker_icon = sampahIcon
				} else if (i == n - 1) {
					marker_icon = destinationIcon
				}
				var marker = L.marker(waypoints.latLng, {
					draggable: true,
					bounceOnAdd: false,
					bounceOnAddOptions: {
						duration: 1000,
						height: 800,
						function() {
							(bindPopup(myPopup).openOn(mymap))
						}
					},
					icon: marker_icon
				})
				return marker
			}
		}).addTo(map)



		var routingControlContainer = wp_control.getContainer();
		var controlContainerParent = routingControlContainer.parentNode;
		controlContainerParent.removeChild(routingControlContainer);
		var itineraryDiv = document.getElementById('navigator_osrm');
		itineraryDiv.appendChild(routingControlContainer);
		document.getElementsByClassName('leaflet-routing-container')[0].style.width = '100%'


		map.on('popupopen', function (e) {
			var popup = e.popup;
			var popup_pos = popup.getLatLng()
			map.panTo(popup_pos, { animate: true });
		});


		map.on('click', function (e) {
			var container = L.DomUtil.create('div', 'menuOnmap', container),
				startBtn = createButton('เลือกจุดเริ่มต้น', container),
				destBtn = createButton2('เลือกจุดหมาย', container),
				pin_current_location = createButton5('เพิ่มหมุดที่อยู่ปัจจุบัน', container);
			pin_map = createButton6('เพิ่มหมุดจุดที่เลือก', container);

			L.DomEvent.on(startBtn, 'click', function () {
				wp_control.spliceWaypoints(0, 1, e.latlng);
				map.closePopup();
			});

			L.DomEvent.on(destBtn, 'click', function () {
				wp_control.spliceWaypoints(wp_control.getWaypoints().length - 1, 1, e.latlng);
				map.closePopup();
			});

			L.DomEvent.on(pin_map, 'click', function () {
				$(document).ready(function () {
					$.ajax({
						url: "api/check_session.php",
						type: "POST",
						data: {},
						success: function (data) {
							if (data == 'false') {
								pc_modal();
							}
							else if (data == 'true') {
								document.getElementById('user_coor2').value = e.latlng.lat + "," + e.latlng.lng;
								$.ajax({
									method: "POST",
									url: "api/get_username_name.php",
									success: function (data) {
										if (data != '') {
											document.getElementById('pin_username').value = data;
										}
										else {
											return '#NONAME';
										}
									}
								});
								$('#pinModal').modal('show');
							}
						}
					})
				});
				map.closePopup();
			});

			L.DomEvent.on(pin_current_location, 'click', function () {
				lc.start();
				$(document).ready(function () {
					$.ajax({
						url: "api/check_session.php",
						type: "POST",
						data: {},
						success: function (data) {
							if (data == 'false') {
								pc_modal();
							}
							else if (data == 'true') {
								document.getElementById('user_coor2').value = map.getCenter().lat + "," + map.getCenter().lng;
								$.ajax({
									method: "POST",
									url: "api/get_username_name.php",
									success: function (data) {
										if (data != '') {
											document.getElementById('pin_username').value = data;
										}
										else {
											return '#NONAME';
										}
									}
								});
								$('#pinModal').modal('show');
							}
						}
					})
				});
				map.closePopup();
			});

			if (document.getElementsByClassName("leaflet-popup-content")[0] == undefined) {
				L.popup()
					.setContent(container)
					.setLatLng(e.latlng)
					.openOn(map);
			}
			if (document.getElementById("main_navbar").style.marginBottom != '0px') {
				closeNav();
			}
		});


		function createButton(label, container) {
			var btn = L.DomUtil.create('button', 'btn btn-outline-primary btn-sm btn-block', container);
			btn.setAttribute('type', 'button');
			btn.innerHTML = label;
			return btn;
		}

		function createButton2(label, container) {
			var btn = L.DomUtil.create('button', 'btn btn-outline-success btn-sm btn-block', container);
			btn.setAttribute('type', 'button');
			btn.innerHTML = label;
			return btn;
		}

		function createButton3(label, container) {
			var btn = L.DomUtil.create('button', 'btn btn-danger btn-sm btn-block', container);
			btn.setAttribute('type', 'button');
			btn.innerHTML = label;
			return btn;
		}


		function createButton5(label, container) {
			var btn = L.DomUtil.create('button', 'btn btn-outline-info btn-sm btn-block', container);
			btn.setAttribute('type', 'button');
			btn.setAttribute('id', 'add_current_button');
			btn.innerHTML = label;
			return btn;
		}

		function createButton6(label, container) {
			var btn = L.DomUtil.create('button', 'btn btn-outline-warning btn-sm btn-block', container);
			btn.setAttribute('type', 'button');
			btn.setAttribute('id', 'add_pin_button');
			btn.innerHTML = label;
			return btn;
		}

		function createButton7(label, container) {
			var btn = L.DomUtil.create('button', 'btn btn-danger btn-sm btn-block', container);
			btn.setAttribute('type', 'button');
			btn.innerHTML = label;
			return btn;
		}


		new L.basemapsSwitcher([
			{
				layer: L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
				}).addTo(map), //DEFAULT MAP
				icon: 'assets/img/map1.png',
				name: 'Openstreet'
			},
			{
				layer: L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
					attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
				}),
				icon: 'assets/img/map2.png',
				name: 'OpenTopo'
			},
		], { position: 'topright' })/*.addTo(map);*/

		function success() {
			$('#myModal').modal('hide');
			$('#myModal2').modal('show');
			setTimeout(() => {
				document.getElementById("line-notify").submit();
			}
				, 3000);
		}

		function pc_modal() {
			$('#pc_modal').modal('show');
			close_collapes('passcode');
			closeNav();
		}

		function session_check() {
			$.ajax({
				url: "api/check_session.php",
				type: "POST",
				data: {},
				success: function (data) {
					if (data == 'true') {
						document.getElementById("passcode_signin").className = "btn btn-danger text-white";
						document.getElementById("passcode_signin").innerHTML = "ออกจากระบบ";
						document.getElementById("passcode_signin").setAttribute('onclick', 'delSession()');
					}
					else if (data == 'false') {
						document.getElementById("passcode_signin").className = "btn btn-primary text-white";
						document.getElementById("passcode_signin").innerHTML = "เข้าสู่ระบบ";
						document.getElementById("passcode_signin").setAttribute('onclick', 'pc_modal()');
					}
				}
			})
		}

		function openNav() {
			var h = window.innerHeight;
			if (document.getElementById("Sidenav").style.height == '0px') {
				if (h >= 400) {
					document.getElementById("Sidenav").style.height = "200px";
					document.getElementById("main_navbar").style.marginBottom = "200px";
				}
				else if (h < 400) {
					document.getElementById("Sidenav").style.height = "300px";
					document.getElementById("main_navbar").style.marginBottom = "300px";
				}
				document.getElementById("menu_icon").className = "fa-solid fa-xmark fa-lg";
			}
			else {
				closeNav();
			}
		}

		function closeNav() {
			document.getElementById("Sidenav").style.height = "0px";
			document.getElementById("main_navbar").style.marginBottom = "0px";
			document.getElementById("menu_icon").className = "fa-solid fa-bars fa-lg";
			$('.collapse').collapse('hide');
		}

		function delSession() {
			$.ajax({
				url: "api/del_session.php",
				type: "POST",
				data: {},
				success: function (data) {
					if (data = 'del_complete') {
						closeNav();
						session_check();
						setTimeout(function () {
							swal({
								title: "ออกจากระบบเรียบร้อยแล้ว",
								type: "success"
							}, function () {
								//func
							});
						}, 100);
					}
				}
			})
		}



		$('#signout_modal').on('hidden.bs.modal', function () {
			location.reload();
		})

		$('#filter_food').on('change', function () {
			$(".loca_food_icon").remove();
			get_IDs('food');
		});

		$('#filter_tamiya').on('change', function () {
			$(".loca_tamiya_icon").remove();
			get_IDs('tamiya');
		});

		$('#filter_alc').on('change', function () {
			$(".loca_alc_icon").remove();
			get_IDs('alc');
		});

		$('#filter_cafe').on('change', function () {
			$(".loca_cafe_icon").remove();
			get_IDs('cafe');
		});

		$('#filter_r1').on('change', function () {
			$(".r_1point").remove();
			get_IDs('all');
		});

		$('#filter_r2').on('change', function () {
			$(".r_2point").remove();
			get_IDs('all');
		});

		$('#filter_r3').on('change', function () {
			$(".r_3point").remove();
			get_IDs('all');
		});

		$('#filter_r4').on('change', function () {
			$(".r_4point").remove();
			get_IDs('all');
		});

		$('#filter_r5').on('change', function () {
			$(".r_5point").remove();
			get_IDs('all');
		});

		function close_collapes(x) {
			if (x == 'passcode') {
				$('.filter_collapse').collapse('hide');
				$('.filter_rating_collapse').collapse('hide');
				$('.navigator_collapse').collapse('hide');
			}
			if (x == 'navigator') {
				$('.filter_collapse').collapse('hide');
				$('.filter_rating_collapse').collapse('hide');
				if (document.getElementById('button_for_navigator').getAttribute('aria-expanded') == 'false') {
					document.getElementById("Sidenav").style.height = "480px";
					document.getElementById("main_navbar").style.marginBottom = "480px";
				}
				else {
					document.getElementById("Sidenav").style.height = "200px";
					document.getElementById("main_navbar").style.marginBottom = "200px";
				}
			}
			if (x == 'filter') {
				$('.navigator_collapse').collapse('hide');
				if (document.getElementById('filter_rating_collapse').className == 'filter_rating_collapse collapse show') {
					$('.filter_rating_collapse').collapse('hide');
					document.getElementById("Sidenav").style.height = "200px";
					document.getElementById("main_navbar").style.marginBottom = "200px";
					document.getElementById("button_for_filter").setAttribute('data-target', '#filter_collapse');
				}
				else if (document.getElementById('filter_collapse').className == 'filter_collapse collapse show') {
					$('.filter_collapse').collapse('hide');
					document.getElementById("Sidenav").style.height = "200px";
					document.getElementById("main_navbar").style.marginBottom = "200px";
				}
				else {
					$('.filter_collapse').collapse('hide');
					document.getElementById("Sidenav").style.height = "450px";
					document.getElementById("main_navbar").style.marginBottom = "450px";
				}
			}
			if (x == 'filter_rating') {
				document.getElementById("button_for_filter").setAttribute('data-target', '#filter_rating_collapse');
				$('.navigator_collapse').collapse('hide');
				$('.filter_collapse').collapse('hide');
				$('.filter_rating_collapse').collapse('show');
			}
			if (x == 'filter_rating_back') {
				document.getElementById("button_for_filter").setAttribute('data-target', '#filter_collapse');
				$('.navigator_collapse').collapse('hide');
				$('.filter_rating_collapse').collapse('hide');
				$('.filter_collapse').collapse('show');
			}
		}

		function delpin_check(ID) {
			$.ajax({
				url: "api/check_session_perm.php",
				type: "POST",
				data: { 'ID': ID },
				success: function (data) {
					if (data == 'false') {
						pc_modal();
					}
					else if (data == 'perm_access') {
						map.closePopup();
						document.getElementById("delpin_button").setAttribute('onclick', 'delpin(' + ID + ')');
						$('#delpin_confirm').modal('show');
					}
					else if (data == 'perm_denied') {
						setTimeout(function () {
							swal({
								title: "ไม่ใช่เจ้าของหมุดนี้",
								type: "error"
							}, function () {
								//function
							});
						}, 100);
					}
				}
			})
		}

		function delpin(ID) {
			$.ajax({
				url: "api/delpin.php",
				type: "POST",
				data: { 'ID': ID },
				success: function (data) {
					var data = JSON.parse(data);
					if (data[1] == 'del_complete') {
						$('#delpin_confirm').modal('hide');
						const type_array = data[0].split("_");
						var type_function_del = type_array[1];
						$(".loca_" + type_function_del + "_icon").remove();
						get_IDs(type_function_del);
						setTimeout(function () {
							swal({
								title: "ลบหมุดเรียบร้อย",
								type: "success"
							}, function () {
								//func
							});
						}, 100);
					}
					else {
						setTimeout(function () {
							swal({
								title: "เกิดข้อผิดพลาด",
								type: "error"
							}, function () {
								//function
							});
						}, 100);
					}
				}
			})


		}
		$('#pin_map').on('submit', function (e) {
			e.preventDefault();
			document.querySelector('#addpin_button').disabled = true;
			if ($('#line_noti_check').is(':checked')) {
				var line_noti = 'true';
			}
			else {
				var line_noti = 'false';
			}
			var pinform = $("#pin_map");
			var params = pinform.serializeArray();
			var pinfile = $("#file")[0].files;
			var pin_formData = new FormData();
			$(params).each(function (index, element) {
				pin_formData.append(element.name, element.value);
			});
			pin_formData.append('file', pinfile[0]);
			$.ajax({
				method: "POST",
				cache: false,
				url: "api/pinmap_add.php",
				data: pin_formData,
				contentType: false,
				processData: false,
				success: function (data) {
					if (data != 'failed') {
						setTimeout(function () {
							swal({
								title: "เพิ่มหมุดสำเร็จ",
								type: "success"
							}, function () {
								document.getElementById("pin_map").reset();
								$('#pinModal').modal('hide');
								get_IDs(data);
								document.querySelector('#addpin_button').disabled = false;
							});
						}, 100);
					}
					else {
						setTimeout(function () {
							swal({
								title: "เกิดข้อผิดพลาด",
								type: "error"
							}, function () {
								document.querySelector('#addpin_button').disabled = false;
							});
						}, 100);
					}
				}
			});
			if (line_noti == 'true') {
				$.ajax({
					method: "POST",
					cache: false,
					url: "api/line-notify-api.php",
					data: pin_formData,
					contentType: false,
					processData: false,
					success: function (data) {
						if (data != 'false') {
						}
						else {
							//func
						}
					}
				});
			}
		});

		$('#pin_map_edit').on('submit', function (e) {
			e.preventDefault();
			$('#editpin').modal('hide');
			map.closePopup();
			var pinform = $("#pin_map_edit");
			var params = pinform.serializeArray();
			if (document.getElementById("file_edit").value != "") {
				var pinfile = $("#file_edit")[0].files;
			}
			var pin_formData = new FormData();
			$(params).each(function (index, element) {
				pin_formData.append(element.name, element.value);
			});
			if (document.getElementById("file_edit").value != "") {
				pin_formData.append('file_edit', pinfile[0]);
			}
			$.ajax({
				method: "POST",
				cache: false,
				url: "api/editpin.php",
				data: pin_formData,
				contentType: false,
				processData: false,
				success: function (data) {
					if (data != 'failed') {
						get_IDs(data);
						setTimeout(function () {
							swal({
								title: "แก้ไขหมุดสำเร็จ",
								type: "success"
							}, function () {
								document.getElementById("pin_map").reset();
								$('#pinModal').modal('hide');
							});
						}, 100);
					}
					else {
						setTimeout(function () {
							swal({
								title: "เกิดข้อผิดพลาด",
								type: "error"
							}, function () {
								//function
							});
						}, 100);
					}
				}
			});
		});

		$('#pc_form').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				method: "POST",
				url: "api/pc_verify.php",
				data: $("#pc_form").serialize(),
				success: function (data) {
					if (data == 'pass') {
						$('#pc_modal').modal('hide');
						session_check();
						setTimeout(function () {
							swal({
								title: "เข้าสู่ระบบสำเร็จ",
								type: "success"
							}, function () {
								document.getElementById("pc_form").reset();
							});
						}, 100);
					}
					else {
						setTimeout(function () {
							swal({
								title: "เกิดข้อผิดพลาด",
								type: "error"
							}, function () {
								//function
							});
						}, 100);
					}
				}
			});
		})

		function start_driving(dest_lat, dest_lng) {
			map.closePopup();
			var dest_coor = [dest_lat, dest_lng];
			lc.start();
			setTimeout(() => {
				var start_coor_1 = [map.getCenter().lat, map.getCenter().lng];
				wp_control.spliceWaypoints(0, 1, start_coor_1);
				wp_control.spliceWaypoints(wp_control.getWaypoints().length - 1, 1, dest_coor);
				map.flyTo([map.getCenter().lat, map.getCenter().lng], 10);
			}
				, 500);
		}

		function start_driving_gmap(dest_lat, dest_lng) {
			map.closePopup();
			var dest_coor = dest_lat + ',' + dest_lng;
			window.open("https://www.google.com/maps?saddr=My+Location&daddr=" + dest_coor + "", "_blank");
		}

		function editpin(ID) {
			$.ajax({
				method: "POST",
				url: "api/editpin_get_perm.php",
				data: { 'id_edit': ID },
				success: function (data) {
					data = JSON.parse(data);
					if (data[8] == 'access') {
						var ID_edit = data[0];
						var coordinate_edit = data[1];
						var user_name_edit = data[2];
						var loca_name_edit = data[3];
						var loca_type_edit = data[4];
						var loca_detail_edit = data[5];
						var rating_edit = data[6];
						var img_path_edit = data[7];
						document.getElementById("user_coor2_edit").value = coordinate_edit;
						document.getElementById("user_name_edit").value = user_name_edit;
						document.getElementById("loca_name_edit").value = loca_name_edit;
						document.getElementById("loca_type_edit").value = loca_type_edit;
						document.getElementById("loca_detail_edit").value = loca_detail_edit;
						document.getElementById("rating_" + rating_edit + "").checked = true;
						document.getElementById("imagepreview").src = img_path_edit;
						$('#editpin').modal('show');
					}
					else if (data == false) {
						$('#pc_modal').modal('show');
					}
					else if (data[8] == 'denied') {
						setTimeout(function () {
							swal({
								title: "ไม่ใช่เจ้าของหมุดนี้",
								type: "error"
							}, function () {
								//function
							});
						}, 100);
					}
				}
			});
		}

		file.onchange = evt => {
			const [file_preview] = file.files;
			if (file_preview) {
				imagepreview_2.src = URL.createObjectURL(file_preview);
			}
		}

		file_edit.onchange = evt => {
			const [file_preview_3] = file_edit.files;
			if (file_preview_3) {
				imagepreview_3.src = URL.createObjectURL(file_preview_3);
			}
		}

		$('#img_preview_2').on('hidden.bs.modal', function () {
			imagepreview_2.src = 'assets/img/no_photo.jpg';
		});

		$('#img_preview_3').on('hidden.bs.modal', function () {
			imagepreview_3.src = 'assets/img/no_photo.jpg';
		});

		function geturl_param() {
			const get_param = window.location.search;
			const urlparams = new URLSearchParams(get_param);
			const id_param = urlparams.get('id')
			if (id_param == null) {
				//console.log('null');
			}
			else {
				$.ajax({
					method: "POST",
					url: "api/url_param.php",
					data: { 'id_param': id_param },
					success: function (data) {
						const coor_split = data.split(',');
						map.flyTo([coor_split[0], coor_split[1]], 15);
					}
				});
			}
		}

		geturl_param();
		session_check();
		get_IDs('all');
	</script>
</body>

</html>