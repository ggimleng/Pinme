<?php
session_start();
if ($_SESSION["pwd_sudo"] == 'SUDO') {
    $session_stat = 'true';
} else {
    $_SESSION["pwd_sudo"] = 'none';
    $session_stat = 'false';
}

if ($session_stat != 'true') {
    echo $session_stat;
    die();
}

$id_edit = $_POST['id_edit'];
$user_array = array();

require_once 'connect_db_pdo.php';
$stmt = $connect->prepare("SELECT * FROM pwd_verify WHERE ID='" . $id_edit . "'");
$stmt->execute();
while ($id_getdata = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if($id_getdata['permission_lv'] == 'USER'){
        $permission_rr = 'DEFAULT';
    }
    elseif ($id_getdata['permission_lv'] == 'VIP'){
        $permission_rr = 'PRIVILEGE';
    }
    elseif ($id_getdata['permission_lv'] == 'ADMIN'){
        $permission_rr = 'OWNER';
    }
    array_push($user_array, $id_getdata['ID']);
    array_push($user_array, $id_getdata['note']);
    array_push($user_array, $id_getdata['username']);
    array_push($user_array, '');
    array_push($user_array, $id_getdata['display_name']);
    array_push($user_array, $permission_rr);
    array_push($user_array, 'true');
}

echo json_encode($user_array);
?>