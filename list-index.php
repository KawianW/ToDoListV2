<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "include/header.php";
include "include/navbar.php";
include "include/listFunctions.php";
$result = getLists();

//dbConnectie functie alleen in mn function map 
//geen request meer in de functies. alle get/post dingen er uit
//geen queries meer in mijn view, alles scheiden en in functies zetten
//goed gebruik van commentaar. doc block boven functies, inline in de functies
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
</head>

<body style='background-color: #343a40'>
    <div class="container">
        <h1 style="color: #fff; margin-bottom: 25px;">Kawian's To Do List <i style="color: #36e336;" class="far fa-check-square"></i></h1>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th style="border: none;" scope="col">List name</th>
                    <th style="border: none;" scope="col">See list</th>
                    <th style="border: none;" scope="col">Delete list</th>
                    <th style="border: none;" scope="col">Edit list</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($result as $row) {  ?>

                        <td style="border: none;"><?php echo $row['list_name']; ?></td>
                        <td style="border: none;"><a class="btn btn-info" href="task-index.php?list_id=<?php echo $row['list_id']?>&filter=time"><i class="fas fa-tasks"></i></td>
                        <td style="border: none;"><a class="btn btn-danger" href="list/delete-list.php?list_id=<?php echo $row['list_id'] ?>"><i class="fas fa-dumpster"></i></a></td>
                        <td style="border: none;"><a class="btn btn-warning" href="list/edit-list.php?list_id=<?php echo $row['list_id']?>&<?php echo $row['list_name']?>"><i class="fas fa-edit"></i></a></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
        <a class="btn btn-light createBtn" href="list/create-list.php">+ Voeg een lijst toe</a>
    </div>
</body>

</html>