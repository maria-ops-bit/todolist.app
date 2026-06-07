<?php

$servername = "localhost";
$dbUser = "root";
$dbPass = "";

$conn = mysqli_connect($servername, $dbUser, $dbPass);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Successful connection<br>";
}

$dbName = "todolistDB";

$conn->query("CREATE DATABASE IF NOT EXISTS $dbName");

/* Step 4: select database */
$conn->select_db($dbName);
echo "Done";
$conn->query("
CREATE TABLE IF NOT EXISTS credentials (
    username VARCHAR(50) PRIMARY KEY,
    password VARCHAR(50) NOT NULL
)
");
$conn->query("
CREATE TABLE IF NOT EXISTS tasks (
 task_id INT AUTO_INCREMENT PRIMARY KEY,
 task_title VARCHAR(100) NOT NULL,
 due_date DATE,
 priority ENUM('Low','Medium','High') NOT NULL,
 project_name VARCHAR(100)
)");
$conn->query("
CREATE TABLE IF NOT EXISTS projects (
 project_name VARCHAR(100) PRIMARY KEY
)");


?>