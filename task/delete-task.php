<?php 

    include_once "../include/listFunctions.php";
    include_once "../include/taskFunctions.php";

    $taskId = $_GET['task_id'];
    $list_id = $_GET['list_id'];
    deleteTask($taskId);
    getList($list_id);

    header("location: ../task-index.php?list_id=" . $list_id);
