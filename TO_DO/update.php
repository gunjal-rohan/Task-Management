<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
  margin: 1px;
background-image: radial-gradient(circle, #020e1f, #1f3f4b, #4b7373, #88a997, #d5dfbf);}
    </style>
</head>


<?php
$id = $_GET['id'];
include "config.php";


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$rdata = mysqli_query($conn,"SELECT * FROM to_do WHERE id = $id");
$data = mysqli_fetch_array($rdata);

?>

<body>
    <form action="update1.php" method="POST">
        <div class="container">
            <div class="row justify-content-center m-auto shadow rounded-4 p-4 bg-white mt-3 py-3 col-md-16">
                <h3 class=" text-center text-primary font-monospace">TO Do List</h3>
                <div class="col-4">
                    <input type="text" id="tasktodo" name="tasktodo" class="form-control"
                        value="<?php echo $data['Task']?>" placeholder="Enter Your Task">
                </div>

                <div class="col-4">
                    <input type="datetime-local" id="datetodo" name="datetodo" class="form-control"
                        value="<?php echo $data['Date']?>" placeholder="Enter Your Task">
                </div>
                <br>

                <div class="col-4">


                    <select class="form-select " aria-label=".form-select-lg example" name='priority'>
                        <option>Select Priority of Task</option>
                        <option ><?php echo $data['priority']?></option>
                        <option value="1" <?php if($data['priority'] == '1'){ echo 'selected'; } ?> >1</option>
                        <option value="2" <?php if($data['priority'] == '2'){ echo 'selected'; } ?>>2</option>
                        <option value="3" <?php if($data['priority'] == '3'){ echo 'selected'; } ?>>3</option>
                        <option value="4" <?php if($data['priority'] == '4'){ echo 'selected'; } ?>>4</option>
                        <option value="5" <?php if($data['priority'] == '5'){ echo 'selected'; } ?>>5</option>
                    </select>
                </div>

                <div class="col-2 mt-2">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <input type="hidden" name="id" value="<?php echo $data['id']?>">
                </div>
            </div>
        </div>
    </form>
</body>

</html>