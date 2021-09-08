<?php
include_once "functions.php";
/**
 * Dit haalt de list_id op uit de Task table
 */
function getTask($filter, $list_id)
{
    if (isset($filter)) {
        $dbconn = DBconnection();

        // var query aangeroepen anders komt er geen gewnest relustaat uit deze $query
        $query = null;

        // hier is dus de logica achter de filter in de task index
        if ($filter == true) {
            $query = $dbconn->prepare("SELECT * FROM `Tasks` WHERE list_id = :list_id ORDER BY task_status");
        } else {
            $query = $dbconn->prepare("SELECT * FROM `Tasks` WHERE list_id = :list_id ORDER BY task_time");
        }
        //Hier pakt de code alle data uit de table 'Tasks'
        $query->bindParam(":list_id", $list_id);

        $query->execute();
        //Het resultaat wordt uit de database gefechd
        $result = $query->fetchAll();
        return $result;
    }
}

/**
 * Haalt de task_id op uit de table Tasks
 */
function task($taskId)
{
    if (isset($taskId)) {
        $dbconn = DBconnection();

        $query = $dbconn->prepare("SELECT * FROM `Tasks` WHERE task_id=:task_id");
        $query->bindParam(':task_id', $taskId);
        $query->execute();
        $result = $query->fetch();
    }
    return $result;
}
/**
 * Update de task
 */
function updateTask($task_name, $task_time, $task_status, $taskId) {

    if (isset($taskId)) {
        $dbconn = DBconnection();
    
        // Prepared de statement om geupdate te worden.

        $query = $dbconn->prepare("UPDATE Tasks SET task_name = :task_name, task_time = :task_time, task_status = :task_status WHERE task_id = :task_id");
        $query->bindParam(':task_name', $task_name);
        $query->bindParam(':task_time', $task_time);
        $query->bindParam(':task_status', $task_status);
        $query->bindParam(':task_id', $taskId);
        $query->execute();
    }
    // return $query;
}
/**
 * Deze functie zorgt ervoor dat er een nieuwe taak word aangemaakt
 */
function createTask($taskName, $task_status, $task_time, $list_id) {
    if (isset($taskName)) {
        $dbconn = DBconnection();
    
        // $task_name = $_POST['task_name'];
        // $task_status = $_POST['task_status'];
        // $task_time = $_POST['task_time'];
        // $list_id = $_GET['list_id'];
        
        // prepares the statement to create the tasks

        $query = $dbconn->prepare("INSERT INTO Tasks (task_name, list_id, task_time, task_status) VALUES (:task_name, :list_id, :task_time, :task_status)");
        $query->bindParam(':task_name', $taskName);
        $query->bindParam(':list_id', $list_id);
        $query->bindParam(':task_time', $task_time);
        $query->bindParam(':task_status', $task_status);
        $query->execute();
    }
    return $query;

}

function deleteTask($taskId) {
    if (isset($taskId)) {
        $dbconn = DBconnection();
    
        // verwijderd de taak
        $query = $dbconn->prepare("DELETE FROM `Tasks` WHERE task_id = :task_id");
        $query->bindParam(":task_id" , $taskId);
        $query->execute();
    }
}
