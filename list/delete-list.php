<?php

    include_once "../include/listFunctions.php";
    $listId = $_GET['list_id'];
    deleteList($listId);

    header('location: ../list-index.php');
