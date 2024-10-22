
<?php

include("dbconnect.php");

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    
    // Fetch the task from the database
    $query = "SELECT * FROM task WHERE id = $taskId";
    $result = mysqli_query($dbconnect, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $taskname = $row['taskname'];
    } else {
        die("Task not found.");
    }
} else {
    die("Invalid task ID.");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskname = mysqli_real_escape_string($dbconnect, $_POST['taskname']);
    $query = "UPDATE task SET taskname = '$taskname' WHERE id = $taskId";
    
    if (mysqli_query($dbconnect, $query)) {
        header("Location: index.php"); // Redirect back to the main page
        exit;
    } else {
        echo "Error updating task: " . mysqli_error($dbconnect);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
   <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2>Edit Task</h2>
                <form method="POST">
                    <label for="taskname">Task Name:</label>
                    <div class="input-group my-4">
                        <input type="text" name="taskname" class="form-control" value="<?php echo htmlspecialchars($taskname); ?>" required>
                        <button type="submit" class="btn btn-success">Update Task</button>
                    </div>
                </form>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </div>
   </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($dbconnect);
?>
