<?php
    $list_id = $_GET['list_id'];

    require '../include/conn.php';

    $query = $dbconn->prepare("DELETE FROM `Lists` WHERE list_id = :list_id");
    $query->bindParam(":list_id" , $list_id,PDO::PARAM_INT);
    $query->execute();

    $dbconn = null;

    header('location: ../list-index.php');
?>