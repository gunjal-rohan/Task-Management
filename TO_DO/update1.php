<?php
 include "config.php";
 $id = $_POST['id'];
 $task = $_POST['tasktodo'];
 $date = $_POST['datetodo'];
 $priority = $_POST['priority'];



 
 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

mysqli_query($conn,"UPDATE `to_do` SET `Task`='$task',`Date`='$date',`priority`='$priority' WHERE id = $id");

echo "<script>window.location.href='index.php';</script>";
    exit;

?>