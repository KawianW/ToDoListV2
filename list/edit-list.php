<?php
    include "../include/header.php";
    include "../include/conn.php";

    $list_id = $_GET['list_id'];

    $query = $dbconn->prepare("SELECT * FROM `Lists` WHERE list_id = :list_id");
    $query->bindParam(":list_id" , $list_id,PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch();

?>
<body style='background-color: #343a40'>
  <div class="container p-0">
    <h1 style="color:#ffffff"> Pas de lijst aan </h1>
    <form action="editing-List.php" method="POST">
      <div class="form-group">
        <label for="listName" style="color:#ffffff;">List name</label>
        <input type="text" class="form-control" name="list_name" value="<?php echo $result['list_name'] ?>" placeholder="<?php echo $result['list_name'] ?>" required>
        <input type="hidden" name="list_id" value="<?php echo $result['list_id'] ?>">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>