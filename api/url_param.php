<?php
$id_param = $_POST['id_param'];
require_once 'connect_db_pdo.php';
$sql = $connect->prepare("SELECT * FROM pindata WHERE ID = '" . $id_param . "'");
$sql->execute();
$result_param = $sql->fetch(PDO::FETCH_ASSOC);
$coordinate = $result_param['coordinate'];
echo $coordinate;
?>