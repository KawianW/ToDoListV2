<?php
    
    $list_id = $_GET['list_id'];

    require '../include/conn.php';

    // verwijderd de lijst
    $query = $dbconn->prepare("DELETE FROM `Lists` WHERE list_id = :list_id");
    $query->bindParam(":list_id" , $list_id);
    $query->execute();
    // verwijderd de taak die bij de lijst hoord
    $query = $dbconn->prepare("DELETE FROM `Tasks` WHERE list_id = :list_id");
    $query->bindParam(":list_id" , $list_id);
    $query->execute();

    $dbconn = null;

    header('location: ../list-index.php');
?>