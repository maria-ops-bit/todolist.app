<?php 
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

require_once "init_db.php";

$taskTitle = $_POST["taskTitle"];
$taskDate = $_POST["taskDate"];
$taskPriority = $_POST["taskPriority"];

$sql = "INSERT INTO tasks (task_title, due_date, priority) 
        VALUES ('$taskTitle', '$taskDate', '$taskPriority')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>