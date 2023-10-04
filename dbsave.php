<?php
    $task = '';
    $id = 0;
    $taskdate = date('m/d/Y');
    $tasktime = date('h:i:sa');
    $update = false;
    require_once 'dbconn.php';
    session_start();
    if(isset($_POST['save'])){
        $taskName = $_POST['taskName'];
        $taskdate = $_POST['taskdate'];
        $tasktime = $_POST['tasktime'];
        $query = mysqli_query($conn, "INSERT INTO tasklist (task, taskdate, tasktime) VALUES ('$taskName', '$taskdate', '$tasktime')"); 
        header("location: index.php");
        echo "<script>alert('Task has been deleted')</script>";
        $_SESSION['massage'] = "Task Added !";
        $_SESSION['msg_type'] = "info";

    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        //$update = true;
        $result = mysqli_query($conn, "SELECT * FROM tasklist WHERE id=$id");
      
        if(mysqli_num_rows($result) == 1){
            $row = $result->fetch_assoc();
            $task = $row['task'];
            $taskdate = $row['taskdate'];
            $tasktime = $row['tasktime'];
            $update = true;
        }
    }

    if(isset($_POST['cancel'])){
        $update = false;
        header("location: index.php");

    }

 //<!--delete data-->//
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        //echo "$_GET['delete']";//
        $query = mysqli_query($conn, "DELETE FROM tasklist WHERE id=$id");
    
       echo "<script>alert.window('Task has been deleted')</script>";
       $_SESSION['massage'] = "Task Deleted !";
        $_SESSION['msg_type'] = "danger";
       header("location: index.php");
    }


    if(isset($_POST['update'])){
        $id = $_POST['id'];
         $check = mysqli_query($conn, "SELECT * FROM tasklist WHERE id= $id");
  
       if(mysqli_num_rows($check) == 1){
           //$row = $check->fetch_assoc();//
       $task = $_POST['taskName'];
       $taskdate = $_POST['taskdate'];
       $tasktime = $_POST['tasktime'];
       $query = mysqli_query($conn, "UPDATE tasklist SET task='$task', taskdate='$taskdate', tasktime='$tasktime' WHERE id='$id'");
       echo "<script>alert('Task has been updated');</script>";
       $_SESSION['massage'] = "Task Updated !";
       $_SESSION['msg_type'] = "success";
       header("location: index.php");
       }
       else{
                echo "<script>alert('Error!!! Task could not be updated');</script>";
            }
        }

?>