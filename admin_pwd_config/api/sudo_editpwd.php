<?php

require_once 'connect_db_pdo.php';

$username_v_edit = $_POST['username_v_edit'];
$password_v_edit = $_POST['pwd_v_edit'];
$permission_edit = 'SUDO';

if ($password_v_edit != '') {
    $password_v_edit_h = password_hash($password_v_edit, PASSWORD_DEFAULT);
    $stmt = $connect->prepare("UPDATE pwd_sudo SET pwd=:pwd_edit, username=:username, permission_lv=:permission_edit WHERE ID=1");
    $stmt->bindParam(':username', $username_v_edit, PDO::PARAM_STR);
    $stmt->bindParam(':pwd_edit', $password_v_edit_h, PDO::PARAM_STR);
    $stmt->bindParam(':permission_edit', $permission_edit, PDO::PARAM_STR);
    $result = $stmt->execute();
} else {
    echo 'failed';
    die();
}

echo 'pass';
die();

?>