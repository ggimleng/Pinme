<?php
session_start();
if ($_SESSION["pwd_check"] == 'USER' or $_SESSION["pwd_check"] == 'VIP' or $_SESSION["pwd_check"] == 'ADMIN') {
	$session_stat = 'true';
} else {
	$_SESSION["pwd_check"] = 'none';
	$session_stat = 'false';
    die();
}

echo $_SESSION["username_name"];
?>