<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../include/taskFunctions.php";

$list_id = $_POST['list_id'];
$taskName = $_POST['task_name'];
$task_status = $_POST['task_status'];
$task_time = $_POST['task_time'];

createTask($taskName, $task_status, $task_time, $list_id);

header("location: ../task-index.php?list_id=" . $list_id);
