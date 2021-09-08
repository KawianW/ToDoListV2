<?php
include_once "functions.php";

function getList($listId)
{
    if(isset($listId)) {
     $dbconn = DBconnection();

    $query = $dbconn->prepare("SELECT * FROM `Lists` WHERE list_id = :list_id");
    $query->bindParam(":list_id", $listId);
    $query->execute();
    $result = $query->fetch();
    return $result;
    }
}

/**
 *  Functie die alle data van list uit mijn database haalt
 */
function getLists()
{
    $dbconn = DBconnection();
    /* Hier pakt de code alle data uit de table 'Lists' */
    $query = $dbconn->prepare('SELECT * FROM Lists');
    $query->execute();
    /* Het resultaat wordt uit de database gefechd */
    $result = $query->fetchAll();
    return $result;
}

/**
 *  Functie die mijn lijst update
 */
function updateList($list_id, $list_name) {
    if (isset($list_id)) {
        $dbconn = DBconnection();

        $query = $dbconn->prepare("UPDATE `Lists` SET list_name = :list_name WHERE list_id=:list_id");
        $query->bindParam(':list_name', $list_name);
        $query->bindParam(':list_id', $_POST["list_id"]);
        $query->execute();
    }

}

/**
 * Voegd lijst toe aan de database
 */
 function insertList($listName) {
     if (isset($listName)) {
        $dbconn = DBconnection();

        $query = $dbconn->prepare("INSERT INTO `Lists` (list_name) VALUES(:list_name)");
        $query->bindParam(":list_name" , $listName);
        $query->execute();
        // $dbconn = null;
     }
 }

 /**
  * verwijderd de lijst uit de database
  */
  function deleteList($listId) {
    //   Kijkt of het een waarde heeft en of het word gebruikt zo niet dan word het niet uitgevoerd
      if (isset($listId)) {
        $dbconn = DBconnection();
        
        $query = $dbconn->prepare("DELETE FROM `Lists` WHERE list_id = :list_id");
        $query->bindParam(":list_id" , $listId);
        $query->execute();
        // verwijderd de taak die bij de lijst hoord
        $query = $dbconn->prepare("DELETE FROM `Tasks` WHERE list_id = :list_id");
        $query->bindParam(":list_id" , $listId);
        $query->execute();
      }
  }