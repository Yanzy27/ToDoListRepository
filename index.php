<?php
require 'db.php';

$tasks = $db->query("SELECT * FROM tasks ORDER BY created_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>To-Do List</title>
</head>
<body>
<h1>To-Do List</h1>
<form action="add_task.php" method="POST">
    <input type="text" name="task" placeholder="Enter new task" required>
    <button type="submit">Add Task</button>
</form>
<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <?= htmlspecialchars($task['task']) ?>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>