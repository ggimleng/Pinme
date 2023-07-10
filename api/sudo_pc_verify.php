<?php
require_once 'connect_db_pdo.php';
session_start();

if (isset($_POST['passcode']) && isset($_POST['sudo_username'])) {
    $sudo_username = $_POST['sudo_username'];
    $passcode = $_POST['passcode'];
    $sql = $connect->prepare("SELECT * FROM pwd_sudo WHERE username='" . $sudo_username . "'");
    $sql->execute();
    $result__verify = $sql->fetch(PDO::FETCH_ASSOC);
    if (password_verify($passcode, $result__verify['pwd'])) {
        $_SESSION["pwd_sudo"] = $result__verify['permission_lv'];
        echo 'pass';
        die();
    } else {
        echo 'failed';
        die();
    }

} else {
    echo 'failed';
}
?>