<?php
include_once "../include/functions.php";
$dbconn = DBconnection();

$list_id = $_POST['list_id'];
$list_name = $_POST['list_name'];

// update de lijst
$query = $dbconn->prepare("UPDATE `Lists` SET list_name = :list_name WHERE list_id=:list_id");
$query->bindParam(':list_name', $list_name);
$query->bindParam(':list_id', $list_id);
$query->execute();

$dbconn = null;


header('location: ../list-index.php');
