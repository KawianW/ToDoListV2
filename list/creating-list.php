<?php
    require "./include/conn.php";
    print_r("het werkt");

    $list_name = $_POST['list_name'];

    $query = $dbconn->prepare("INSERT INTO `Lists` (list_name) VALUES(:list_name)");
    $query->bindParam(":list_name" , $list_name ,PDO::PARAM_STR);
    $query->execute();
    $dbconn = null;

    header("location: www.youtube.com");
?>