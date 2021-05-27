<?php
$servername = "localhost";
$dbname = "ToDoList";
$username = "root";
$password = "";

try {
    $dbconn = new PDO("mysql:host={$servername}; dbname={$dbname}", $username, $password);
    $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection succesfull";
} catch(PDOException $e) {
    echo "connection failed" . $e->getMessage() . "<br/>";
    die();
}