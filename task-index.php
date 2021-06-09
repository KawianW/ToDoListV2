<?php
require "include/conn.php";

$list_id = $_GET['id'];
$query = $dbconn->prepare("SELECT * FROM `Tasks` WHERE list_id = :list_id ORDER BY task_time DESC, task_status");
$query->bindParam(":list_id" , $list_id);
$query->execute();
$result = $query->fetchAll();

include "include/header.php";
include "include/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ToDoList</title>
</head>
<body style='background-color: #343a40'>
    <div class="container">
        <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">Task name</th>
            <th scope="col">Task status</th>
            <th scope="col">Task time</th>
            <th scope="col">Delete Task</th>
            <th scope="col">Edit Task</th>
            </tr>
        </thead>		
            <tbody>
                <tr>
                <?php 
                    foreach ($result as $row) {
                ?>
                    <td><?php echo $row['task_name'];?></td>
                    <td><?php echo $row['task_status'];?></td>
                    <td><?php echo $row['task_time'];?></td>
                    <td><a class="btn btn-danger" href="task/delete-task.php?task_id=<?php echo $row['task_id']?>"><i class="fas fa-dumpster"></i></a></td>
                    <td><a class="btn btn-warning"  href="task/edit-task.php?task_id=<?php echo $row['task_id']?>"><i class="fas fa-edit"></i></a></td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>     
        </table>

        <a class="btn btn-light createBtn" href="task/create-task.php?list_id=<?php echo $list_id?>">+ Voeg een taak toe</a>
    </div>  
</body>
</html>

<?php 
	$dbconn = null
 ?>