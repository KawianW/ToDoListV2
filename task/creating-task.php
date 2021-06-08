<?php
require "../include/conn.php";
include "../include/getList.php";

// prepares and executes the statement and gets the id from the list you are working in
$list_id = $_GET['list_id'];

$task_id = $_GET['task_id'];
$task_name = $_POST['task_name'];
$task_status = $_POST['task_status'];
$task_time = $_POST['task_time'];

// prepares the statement to create the tasks

$query = $dbconn->prepare("INSERT INTO `Tasks` (task_name, list_id, task_time, task_status) VALUES (:task_name, :list_id, :task_time, :task_status)");
$query->bindParam(':task_name', $task_name);
$query->bindParam(':list_id', $list_id);
$query->bindParam(':task_time', $task_time);
$query->bindParam(':task_status', $task_status);
$query->execute();



$dbconn = null;

header("location: ../task-index.php?id=" . $list_id);
?>