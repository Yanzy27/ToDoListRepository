<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $_POST['task'];
    $stmt = $db->prepare("INSERT INTO tasks (task) VALUES (:task)");
    $stmt->bindParam(':task', $task);
    $stmt->execute();
    header("Location: index.php");
}
?>
