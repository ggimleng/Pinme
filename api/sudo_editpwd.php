<?php
session_start();
if ($_SESSION["pwd_sudo"] == 'SUDO') {
    $session_stat = 'true';
} else {
    $_SESSION["pwd_sudo"] = 'none';
    $session_stat = 'false';
    die();
}

if (isset($_POST['note_edit']) && isset($_POST['username_v_edit']) && isset($_POST['display_name_edit']) && isset($_POST['permission_edit'])) {
    if ($_POST['permission_edit'] == 'DEFAULT') {
        $permission_rr = 'USER';
    } elseif ($_POST['permission_edit'] == 'VIP') {
        $permission_rr = 'cf';
    } elseif ($_POST['permission_edit'] == 'OWNER') {
        $permission_rr = 'ADMIN';
    }

    require_once 'connect_db_pdo.php';

    $username_v_edit = $_POST['username_v_edit'];
    $password_v_edit = $_POST['pwd_v_edit'];
    $display_name_edit = $_POST['display_name_edit'];
    $note_edit = $_POST['note_edit'];
    $permission_edit = $permission_rr;

    if ($password_v_edit != '') {
        $password_v_edit_h = password_hash($password_v_edit, PASSWORD_DEFAULT);
        $stmt = $connect->prepare("UPDATE pwd_verify SET note=:note_edit, pwd=:pwd_edit, display_name=:display_name_edit, permission_lv=:permission_edit WHERE username='" . $username_v_edit . "'");
        $stmt->bindParam(':note_edit', $note_edit, PDO::PARAM_STR);
        $stmt->bindParam(':pwd_edit', $password_v_edit_h, PDO::PARAM_STR);
        $stmt->bindParam(':display_name_edit', $display_name_edit, PDO::PARAM_STR);
        $stmt->bindParam(':permission_edit', $permission_edit, PDO::PARAM_STR);
        $result = $stmt->execute();
    } else {
        $stmt = $connect->prepare("UPDATE pwd_verify SET note=:note_edit, display_name=:display_name_edit, permission_lv=:permission_edit WHERE username='" . $username_v_edit . "'");
        $stmt->bindParam(':note_edit', $note_edit, PDO::PARAM_STR);
        $stmt->bindParam(':display_name_edit', $display_name_edit, PDO::PARAM_STR);
        $stmt->bindParam(':permission_edit', $permission_edit, PDO::PARAM_STR);
        $result = $stmt->execute();

    }

    echo 'pass';
    die();
}
?>