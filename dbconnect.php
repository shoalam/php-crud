<?php

$dbhost = "localhost";
$dbname = "crud";
$dbusername = "root";
$dbpassword = "";

$dbconnect = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

if (!$dbconnect) {
    die("Database connection failed: " . mysqli_connect_error());
} 
