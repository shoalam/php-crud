<?php

include("dbconnect.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task'])) {
        $taskname = $_POST['task'];

        $sql = "INSERT INTO task (taskname) VALUES ('$taskname')";

        // Execute the query
        if (mysqli_query($dbconnect, $sql)) {
            echo "<h2>Task saved successfully: " . htmlspecialchars($taskname) . "</h2>";
        } else {
            echo "<h2>Error saving task: " . mysqli_error($dbconnect) . "</h2>";
        }
    } else {
        echo "<h2>No task data received</h2>";
    }
} else {
    echo "<h2>This page is meant to handle POST requests, not GET.</h2>";
}

mysqli_close($dbconnect);
