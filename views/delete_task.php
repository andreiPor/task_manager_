<?php
require_once '../controllers/TaskController.php';

$controller = new TaskController();

$id = $_GET['id'] ?? null;
if (!$id)
    die("Task ID missing");

if ($controller->delete($id)) {
    header("Location: list_tasks.php");
} else {
    echo "Error deleting task.";
}
?>