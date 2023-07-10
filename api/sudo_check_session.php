<?php
session_start();
if (isset($_SESSION["pwd_sudo"])) {
	if ($_SESSION["pwd_sudo"] == 'SUDO') {
		$session_stat = 'true';
	} else {
		$_SESSION["pwd_sudo"] = 'none';
		$session_stat = 'false';
	}
} else {
	$_SESSION["pwd_sudo"] = 'none';
	$session_stat = 'false';
}

echo $session_stat;
?>