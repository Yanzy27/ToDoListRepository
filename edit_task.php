<?php
require 'db.php';

// Check if the ID is passed
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];

    // Fetch the task details based on the task ID
    $stmt = $db->prepare("SELECT * FROM tasks WHERE id = :id");
    $stmt->execute(['id' => $task_id]);
    $task = $stmt->fetch();

    // If task doesn't exist, redirect to index page
    if (!$task) {
        header("Location: index.php");
        exit;
    }

    // Handle form submission for updating the task
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updated_task = $_POST['task'];

        // Update the task in the database
        $stmt = $db->prepare("UPDATE tasks SET task = :task WHERE id = :id");
        $stmt->execute(['task' => $updated_task, 'id' => $task_id]);

        // Redirect to the index page after updating
        header("Location: index.php");
        exit;
    }
} else {
    // If ID is not passed, redirect to index
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <link rel="stylesheet" href="style.css">
    <form action="edit_task.php?id=<?= $task['id'] ?>" method="POST">
        <input type="text" name="task" value="<?= htmlspecialchars($task['task']) ?>" required>
        <button type="submit">Update Task</button>
    </form>
    <a href="index.php">Back to To-Do List</a>
</body>
</html>
