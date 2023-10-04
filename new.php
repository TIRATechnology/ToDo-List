<?php
if(isset($_SESSION['massage'])){
    echo    "<div><strong> {$_SESSION['massage']} </storng>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            ";
}

?>

<?php 
    require 'dbconn.php';
    $result = mysqli_query($conn, "SELECT * FROM tasklist");
?>
<div>

<h2>All Tasks</h2>
    <center><table style = "border:2px solid blue;">
        <thead style = "border: 2px solid blue">
            <tr>
                <th style = "font-size: 20px;" >Task Name</th>
                <th>Date</th>
                <th>Time</th>
                <th colspan="6">Actions</th>
              </tr>
        </thead>
        <tbody id="myTable">
        <?php 
            while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['task']; ?></td>
                <td><?php echo $row['taskdate']; ?></td>
                <td><?php echo $row['tasktime']; ?></td>
                <td>
                  <a href="dbsave.php?delete=<?php echo $row['id']; ?>"><button class="EditTask" >Delete Task</button></a>
                  <a href="index.php?edit=<?php echo $row['id']; ?>"><button class="EditTask" >Edit Task</button></a>
                </td>
            </tr>
           

        <?php endwhile ?>
         </tbody>
    </table></center>
</div>
