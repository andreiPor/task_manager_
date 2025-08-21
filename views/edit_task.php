<?php
require_once __DIR__ . '/../controllers/TaskController.php';
$controller = new TaskController();

$id = $_GET['id'] ?? null;
if (!$id)
    die("Task ID missing");

$task = $controller->readOne($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'task_name' => $_POST['task_name'],
        'description_task' => $_POST['description_task'],
        'start_date' => $_POST['start_date'],
        'end_date' => $_POST['end_date'],
        'responsible_person' => $_POST['responsible_person'],
        'status_task' => $_POST['status_task'],
        'rating' => $_POST['rating']
    ];

    if ($controller->update($id, $data)) {
        header("Location: list_tasks.php");
        exit;
    } else {
        $error = "Error updating task.";
    }
}

require 'header.php';
?>

<h2 class="mb-4">Edit Task</h2>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

<form method="post">
    <div class="mb-3">
        <label class="form-label">Task Name</label>
        <input type="text" name="task_name" class="form-control" value="<?php echo $task['task_name']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description_task" class="form-control"><?php echo $task['description_task']; ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Start Date</label>
        <input type="datetime-local" name="start_date" class="form-control"
            value="<?php echo date('Y-m-d\TH:i', strtotime($task['start_date'])); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">End Date</label>
        <input type="datetime-local" name="end_date" class="form-control"
            value="<?php echo date('Y-m-d\TH:i', strtotime($task['end_date'] ?? '')); ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Responsible Person</label>
        <input type="text" name="responsible_person" class="form-control"
            value="<?php echo $task['responsible_person']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status_task" class="form-select">
            <option value="not done" <?php echo ($task['status_task'] == 'not done') ? 'selected' : ''; ?>>Not Done
            </option>
            <option value="done" <?php echo ($task['status_task'] == 'done') ? 'selected' : ''; ?>>Done</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Rating (0-5)</label>
        <input type="number" name="rating" min="0" max="5" class="form-control" value="<?php echo $task['rating']; ?>">
    </div>
    <button type="submit" class="btn btn-warning">Update Task</button>
    <a href="list_tasks.php" class="btn btn-secondary">Back</a>
</form>

<?php require 'footer.php'; ?>