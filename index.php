<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="mystyle.css">
    <style>
        .button .EditTask {
            background: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ToDo List Application</h1>
        <div class="content">
            <form name="form-1" action="dbsave.php" method="POST">
                <?php require_once 'dbsave.php'; ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
               <input type="text" id="inputText" placeholder="Enter Task" name="taskName" value="<?php echo $task; ?>" ><br>
               <input type="date" id="inputText" placeholder="" name="taskdate" value="<?php echo $taskdate; ?>" ><br>
               <input type="time" id="inputText" placeholder="" name="tasktime" value="<?php echo $tasktime; ?>" >
               <br>
               <?php if($update == true): ?>
                <button type="submit" name="update" class="">Update Task</button>
                <button type="cancel" name="cancel" class="">Cancel</button>
                <?php else: ?>
                <button type="submit" name="save" class="">Add Task</button>
                <button type="reset" name="reset" class="">Reset</button>
                <?php endif; ?>


                <!--<button name="save">Add Task</button>-->
            </form>
        </div>
        <div>
            <?php
            include 'new.php'
            //session_destroy();
            ?>
        </div>

    </div>

   <!-- <script src="myscript.js"></script> -->
</body>
</html>