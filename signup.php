<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

require_once "init_db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO credentials (username, password) 
            VALUES ('$username', '$password')";

    if ($conn->query($sql)) {

        header("Location: ../index.php");
        exit();

    } else {

        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>