<?php include("dbconnect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD with PHP and MYSQL</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    
    <h1 class="text-center mb-5">CRUD with PHP and MYSQL</h1>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="#" method="POST" class="submit-form">
                <div class="input-group">
                    <input type="text" name="task" class="form-control" placeholder="Add task">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Taskname</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            $query = "SELECT * FROM task";

            $result = mysqli_query($dbconnect, $query);

            if (mysqli_num_rows($result) > 0) { 
                while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['taskname'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        $(document).ready(function () {
            $(".submit-form").submit(function (e) {
                e.preventDefault();

                var taskname = $('input[name="task"]').val();
                console.log(taskname);

                $.ajax({
                    url: 'data.php',
                    method: "POST",
                    data: {
                        task: taskname
                    },
                    success: function (response){
                        console.log('Response from server:', response);
                    }
                })
            });
        });
    </script>
</body>
</html>