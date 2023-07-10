<?php
require_once 'connect_db_pdo.php';
session_start();

if (isset($_POST['passcode']) && isset($_POST['username_u'])) {
    $username_u = $_POST['username_u'];
    $passcode = $_POST['passcode'];
    $sql = $connect->prepare("SELECT * FROM pwd_verify WHERE username=:username_u");
    $sql->bindParam(':username_u', $username_u, PDO::PARAM_STR);
    $sql->execute();
    while ($result__verify = $sql->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($passcode, $result__verify['pwd'])) {
            $_SESSION["pwd_check"] = $result__verify['permission_lv'];
            $_SESSION["username"] = $result__verify['username'];
            $_SESSION["username_name"] = $result__verify['display_name'];
            echo 'pass';
            die();

        }
    }
} else {
    echo 'failed';
}
?>