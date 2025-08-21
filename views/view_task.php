<?php
require_once __DIR__ . '/../controllers/TaskController.php';
$controller = new TaskController();

$id = $_GET['id'] ?? null;
if (!$id)
    die("Task ID missing");

$task = $controller->readOne($id);
require 'header.php';
?>

<h2 class="mb-4">Task Details</h2>

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><?php echo $task['task_name']; ?></h5>
        <p class="card-text"><strong>Description:</strong> <?php echo $task['description_task']; ?></p>
        <p class="card-text"><strong>Start Date:</strong> <?php echo $task['start_date']; ?></p>
        <p class="card-text"><strong>End Date:</strong> <?php echo $task['end_date']; ?></p>
        <p class="card-text"><strong>Responsible:</strong> <?php echo $task['responsible_person']; ?></p>
        <p class="card-text"><strong>Status:</strong> <?php echo $task['status_task']; ?></p>
        <p class="card-text"><strong>Rating:</strong> <?php echo $task['rating']; ?></p>
        <a href="edit_task.php?id=<?php echo $task['id_task']; ?>" class="btn btn-warning">Edit</a>
        <a href="delete_task.php?id=<?php echo $task['id_task']; ?>" class="btn btn-danger"
            onclick="return confirm('Are you sure?')">Delete</a>
        <a href="list_tasks.php" class="btn btn-secondary">Back</a>
    </div>
</div>

<?php require 'footer.php'; ?>