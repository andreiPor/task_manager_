<?php
require_once __DIR__ . '/../controllers/TaskController.php';
$controller = new TaskController();
$tasks = $controller->readAll();
require 'header.php';
?>

<h2 class="mb-3">All Tasks</h2>
<a href="create_task.php" class="btn btn-primary mb-3">Create New Task</a>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Responsible</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Rating</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $tasks->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $row['id_task']; ?></td>
                <td><?php echo $row['task_name']; ?></td>
                <td><?php echo $row['responsible_person']; ?></td>
                <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['end_date']; ?></td>
                <td><?php echo $row['status_task']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td>
                    <a href="view_task.php?id=<?php echo $row['id_task']; ?>" class="btn btn-info btn-sm">View</a>
                    <a href="edit_task.php?id=<?php echo $row['id_task']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_task.php?id=<?php echo $row['id_task']; ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php require 'footer.php'; ?>