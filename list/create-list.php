<?php
include "../include/header.php";
?>

<body style="background-color: #343a40">
    <div class="container p-0">
        <h1 style="color: #fff">Maak een nieuwe lijst aan</h1>
        <form action="creating-list.php" method="POST">
            <div class="form-group">
                <label for="listName" style="color: #fff">Lijst naam</label>
                <input type="text" class="form-control" id="list_name" name="list_name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>