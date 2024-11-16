<?php
require 'db.php';


if (isset($_GET['id'])) {
    $task_id = $_GET['id'];


    $stmt = $db->prepare("DELETE FROM tasks WHERE id = :id");
    $stmt->execute(['id' => $task_id]);


    header("Location: index.php");
    exit;
} else {

    header("Location: index.php");
    exit;
}
?>
