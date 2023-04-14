<?php
include "config.php";

$task = $_POST['tasktodo'];
$date = $_POST['datetodo'];
$priority = $_POST['priority'];

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

mysqli_query($conn,"INSERT INTO `to_do`( `Task`, `Date`, `priority`) VALUES ('$task','$date','$priority')");

//header("location : index.php")
echo "<script>window.location.href='index.php';</script>";
    exit;


?>