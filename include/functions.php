<?php
function DBconnection(){
    $servername = "localhost";
    $dbname = "ToDoList";
    $username = "root";
    $password = "";

    try {
        $dbconn = new PDO("mysql:host={$servername}; dbname={$dbname}", $username, $password);
        $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "connection failed" . $e->getMessage() . "<br/>";
        die();
    }
    return $dbconn;
}

function getLists() {
    $dbconn = DBconnection();
    /* Hier pakt de code alle data uit de table 'Lists' */
    $query = $dbconn->prepare('SELECT * FROM Lists');
    $query->execute();
    /* Het resultaat wordt uit de database gefechd */
    $result = $query->fetchAll();
    return $result;
}

function getList() {
    $dbconn = DBconnection();

    $list_id = $_GET['list_id'];

    $query = $dbconn->prepare("SELECT * FROM `Lists` WHERE list_id = :list_id");
    $query->bindParam(":list_id" , $list_id);
    $query->execute();
    $result = $query->fetch();
    return $result;
}

function getTask() {
    $dbconn = DBconnection();

    $list_id = $_GET['list_id'];

    /* Hier pakt de code alle data uit de table 'Tasks' */
    $query = $dbconn->prepare("SELECT * FROM `Tasks` WHERE list_id = :list_id");
    $query->bindParam(":list_id" , $list_id);
    $query->execute();
     /* Het resultaat wordt uit de database gefechd */
    $result = $query->fetchAll();
    return $result;
}

function task() {
    $dbconn = DBconnection();

    $query = $dbconn->prepare("SELECT * FROM `Tasks` WHERE task_id=:task_id");
    $query->bindParam(':task_id', $_GET['task_id']);
    $query->execute();
    $result = $query->fetch();

    return $result;
}
