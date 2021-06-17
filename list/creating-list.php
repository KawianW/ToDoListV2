<?php
include_once "../include/functions.php";

    $dbconn = DBconnection();

    $list_name = $_POST['list_name'];

    $query = $dbconn->prepare("INSERT INTO `Lists` (list_name) VALUES(:list_name)");
    $query->bindParam(":list_name" , $list_name);
    $query->execute();
    $dbconn = null;

    header("location: ../list-index.php");
?>