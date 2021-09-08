<?php
    include "../include/header.php";
    $list_id = $_GET['list_id'];
    $list_name = $_POST['list_name'];
?>

<!-- dit is de form die je ziet als je een taak wilt toevoegen -->

<body style="background-color: #343a40">
    <div class="container">
    <h1 style="color: #ffffff">Taak toevoegen aan lijst "<?php echo $result['list_name'] ?>"</h1>
        <form action="creating-task.php?list_id=<?php echo $list_id?>" method="POST">
            <input type="hidden" id="list_id" name="list_id" value="<?php echo $list_id?>">
            <div class="form-group">
                <label style="color: #ffffff" for="task_name">Taak beschrijving</label>
                <input type="text" class="form-control" name="task_name" placeholder="Voer hier je beschrijving in" required>
            </div>
            <div class="form-group">
                <label style="color: #ffffff" for="task_time">Tijd nodig(in minuten):</label>
                <input type="number" class="form-control" name="task_time" max="1440" required>
            </div>
            <div class="form-group">
                <label style="color: #ffffff" for="task_status">Status van de taak</label>
                <select class="form-control" name="task_status" id="task_status" required>
                    <option>Nog niet begonnen</option>
                    <option>Bezig</option>
                    <option>Klaar</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Taak toevoegen aan lijst</button>
        </form>
    </div>
</body>