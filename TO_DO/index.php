<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <style>
        body {
  margin: 1px;
background-image: radial-gradient(circle, #020e1f, #1f3f4b, #4b7373, #88a997, #d5dfbf);}
    </style>
    <script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
    
</head>

<body>
    <form action="action.php" method="POST">
        <div class="container">
            <div class="row justify-content-center m-auto shadow rounded-4 p-4 bg-white mt-3 py-3 col-md-16">
                <center>
                <h3 class="text-success">TO DO LIST</h3>

                </center>
                <div class="col-4">
                    <input type="text" id="tasktodo" name="tasktodo" class="form-control" placeholder="Enter Your Task">
                </div>

                <div class="col-4">
                    <input type="datetime-local" id="datetodo" name="datetodo" class="form-control"
                        placeholder="Enter Your Task">
                </div>
                <br>

                <div class="col-4">


                    <select class="form-select " aria-label=".form-select-lg example" name='priority'>
                        <option selected>Select Priority of Task</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="col-2 mt-2">
                    <button class="btn btn-primary" type="submit">ADD</button>
                </div>
            </div>
        </div>
    </form>
    <?php
    include "config.php";
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $rd = mysqli_query($conn, "select * from to_do");
    $sd = mysqli_query($conn, "select * from done_to_do");


     
    ?>

    <div class="container">
        <div class="col-8 bg-white p-4 m-auto rounded-4  mt-3">
        <center>
        <h3 class="text-success">
            Tasks To Do
        </h3>
    </center>

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Date</th>
                        <th>Priority</th>
                        <th>&nbsp</th>
                        <th>&nbsp</th>
                        <th>&nbsp</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                while($row = mysqli_fetch_array($rd)){
                ?>
                    <tr>
                        <td><?php echo $row['Task']?></td>
                        <td><?php echo $row['Date']?></td>
                        <td><?php echo $row['priority']?></td>

                        <td style="width:10%"><a href="delete.php? id=<?php echo $row['id']?>"
                                class="btn btn-outline-danger">delete</a></td>
                        <td style="width:10%"><a href="update.php? id=<?php echo $row['id']?>"
                                class="btn btn-outline-success">update</a></td>
                                <td style="width:10%"><a href="complete.php? id=<?php echo $row['id']?>"
                                class="btn btn-outline-success">complete</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>


        <div class="col-8 bg-white p-4 rounded-4 m-auto mt-3">
        <center>
        <h3 class="text-success">
            Completed Tasks
        </h3>
    </center>
            <table class="table table-hover caption-top">

                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Date</th>
                        <th>Priority</th>
                        <th>&nbsp</th>
                        
                    </tr>
                </thead>
                <tbody>

                    <?php
                while($row = mysqli_fetch_array($sd)){
                ?>
                    <tr>
                        <td><?php echo $row['Task']?></td>
                        <td><?php echo $row['Date']?></td>
                        <td><?php echo $row['priority']?></td>

                        <td style="width:10%"><a href="delete1.php? id=<?php echo $row['id']?>"
                                class="btn btn-outline-danger">delete</a></td>
                        <td style="width:10%">&nbsp</td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('table').DataTable({

                'paging' : false,
                'columnDefs': [{
                    'targets': [0, 3, 4], // column index (start from 0)
                    'orderable': false, // set orderable false for selected columns
                    
                }]
            });


        });
    </script>
</body>

</html>