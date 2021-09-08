<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../include/header.php";
include "../include/listFunctions.php";
$list_id = $_GET['list_id'];
$list_name = $_GET['list_name']
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body style='background-color: #343a40'>
  <div class="container p-0">
    <h1 style="color:#ffffff"> Pas de lijst aan </h1>
    <form action="editing-List.php" method="POST">
      <div class="form-group">
        <label for="listName" style="color:#ffffff;">List name</label>
        <input type="text" class="form-control" name="list_name" value="<?php echo $list_name ?>" placeholder="<?php echo $list_name ?>" required>
        <input type="hidden" name="list_id" value="<?php echo $list_id ?>">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>