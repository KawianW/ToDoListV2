<?php
require "../include/conn.php";

$list_id = $_GET['list_id'];
$list_name = $_POST['list_name'];

$query = $dbconn->prepare("UPDATE `Lists` SET list_name = :list_name WHERE list_id=:list_id");
$query->bindParam(':list_name', $_POST['list_name'], PDO::PARAM_STR);
$query->bindParam(':list_id', $_POST['list_id'], PDO::PARAM_INT);
$query->execute();

$dbconn = null;


header('location: ../list-index.php');

?>
