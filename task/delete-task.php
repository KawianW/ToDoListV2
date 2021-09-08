<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../include/taskFunctions.php";
$taskId = $_GET['task_id'];
deleteTask($taskId);

header('location: ../task-index.php');
?>