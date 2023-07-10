<?php
$servername = "localhost";
$username = "gimleng";
$password = "configtion";

try {
  $connect = new PDO("mysql:host=$servername;dbname=pinmap;charset=utf8", $username, $password);
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connection success ";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$connect->query("CREATE TABLE IF NOT EXISTS `pindata` (
	`ID` INT(11) NOT NULL,
	`coordinate` TEXT NOT NULL,
	`user_name` TEXT NOT NULL,
  `display_name` TEXT NOT NULL,
	`loca_name` TEXT NOT NULL,
	`loca_type` TEXT NOT NULL,
	`loca_detail` TEXT NOT NULL,
	`rating` INT(11) NOT NULL,
	`img_path` TEXT NOT NULL,
  `last_edit` TEXT NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
  
  ALTER TABLE `pindata`
  ADD PRIMARY KEY (`ID`);
  
  ALTER TABLE `pindata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;");

$connect->query("CREATE TABLE IF NOT EXISTS `pwd_verify` (
  `ID` int(11) NOT NULL,
  `note` TEXT NOT NULL,
   `username` TEXT NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `display_name` TEXT NOT NULL,
  `permission_lv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `pwd_verify`
  ADD PRIMARY KEY (`ID`);

  ALTER TABLE `pwd_verify`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
  ");

$connect->query("CREATE TABLE IF NOT EXISTS `pwd_sudo` (
  `ID` int(11) NOT NULL,
   `username` TEXT NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `permission_lv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `pwd_sudo`
  ADD PRIMARY KEY (`ID`);

  ALTER TABLE `pwd_sudo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
  ");