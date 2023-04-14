<?php
 include "config.php";
 $id = $_GET['id'];
 
 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


mysqli_query($conn,"INSERT INTO done_to_do (id,Task,Date,priority) SELECT id, Task, Date, priority From to_do WHERE id=$id");

mysqli_query($conn,"DELETE FROM to_do WHERE id = $id");

echo "<script>window.location.href='index.php';</script>";
    exit;

?>