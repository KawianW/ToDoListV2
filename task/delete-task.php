<?php 
$task_id = $_GET['task_id'];

include_once "../include/functions.php";
$dbconn = DBconnection();

$query = $dbconn->prepare("DELETE FROM `Tasks` WHERE task_id = :task_id");
$query->bindParam(":task_id" , $task_id);
$query->execute();

$dbconn = null;

header('location: ../list-index.php');
?>