<?php
include "../include/taskFunctions.php";
// include "../include/listFunctions.php";
$result = task($task_id);

$list_id = $_POST['list_id'];
$taskId = $_POST['task_id'];

$task_name = $_POST['task_name'];
$task_status = $_POST['task_status'];
$task_time = $_POST['task_time'];

updateTask($task_name, $task_time, $task_status, $taskId);



header("location: ../task-index.php?list_id=" . $list_id);
