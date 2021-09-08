<?php
include_once "../include/listFunctions.php";
    $listName = $_POST['list_name'];
    insertList($listName);

    header("location: ../list-index.php");
