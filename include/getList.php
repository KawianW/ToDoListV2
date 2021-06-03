<?php

// function getList() {
    /* Hier pakt de code alle data uit de table 'Lists' */
    $query = $dbconn->prepare('SELECT * FROM Lists');
    $query->execute();
    /* Het resultaat wordt uit de database gefechd */
    $result = $query->fetchAll();
    return $result;
// }