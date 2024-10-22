<?php

include("dbconnect.php");

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    
    // Delete the task from the database
    $query = "DELETE FROM task WHERE id = $taskId";
    
    if (mysqli_query($dbconnect, $query)) {
        header("Location: index.php"); // Redirect back to the main page
        exit;
    } else {
        echo "Error deleting task: " . mysqli_error($dbconnect);
    }
} else {
    die("Invalid task ID.");
}

// Close the database connection
mysqli_close($dbconnect);