<?php
/**
 * functie die een connectie maakt met de database
*/
function DBconnection()
{
    $servername = "localhost";
    $dbname = "ToDoList";
    $username = "root";
    $password = "";
    
    try {
        $dbconn = new PDO("mysql:host={$servername}; dbname={$dbname}", $username, $password);
        $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "connection failed" . $e->getMessage() . "<br/>";
        die();
    }
    return $dbconn;
}

