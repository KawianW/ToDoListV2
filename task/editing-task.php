<?php
include_once "../include/functions.php";
$dbconn = DBconnection();
$result = task();

$list_id = $_POST['list_id'];

// $task_id = $_GET['task_id'];
$task_name = $_POST['task_name'];
$task_status = $_POST['task_status'];
$task_time = $_POST['task_time'];


// Prepares the statement to update the tasks.

$query = $dbconn->prepare("UPDATE Tasks SET task_name = :task_name, task_time = :task_time, task_status = :task_status WHERE task_id = :task_id");
$query->bindParam(':task_name', $task_name);
$query->bindParam(':task_time', $task_time);
$query->bindParam(':task_status', $task_status);
$query->bindParam(':task_id', $_POST['task_id']);
$query->execute();

$dbconn = null;


header("location: ../task-index.php?list_id=" .  $list_id);

?>