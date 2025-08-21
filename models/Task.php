<?php
require_once __DIR__ . '/../config/database.php';

class Task
{
    private $conn;
    private $table_name = "tasks";

    public $id_task;
    public $task_name;
    public $description_task;
    public $start_date;
    public $end_date;
    public $responsible_person;
    public $status_task;
    public $rating;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Create Task
    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . "
                  SET task_name=:task_name, description_task=:description_task, start_date=:start_date,
                      end_date=:end_date, responsible_person=:responsible_person, status_task=:status_task, rating=:rating";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":task_name", $this->task_name);
        $stmt->bindParam(":description_task", $this->description_task);
        $stmt->bindParam(":start_date", $this->start_date);
        $stmt->bindParam(":end_date", $this->end_date);
        $stmt->bindParam(":responsible_person", $this->responsible_person);
        $stmt->bindParam(":status_task", $this->status_task);
        $stmt->bindParam(":rating", $this->rating);

        if ($stmt->execute()) {
            $this->id_task = $this->conn->lastInsertId();
            return true;
        }
        return false;
    }

    // Read all tasks
    public function readAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY start_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Read single task
    public function readOne($id_task)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_task = :id_task LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_task", $id_task);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update Task
    public function update()
    {
        $query = "UPDATE " . $this->table_name . "
                  SET task_name=:task_name, description_task=:description_task, start_date=:start_date,
                      end_date=:end_date, responsible_person=:responsible_person, status_task=:status_task, rating=:rating
                  WHERE id_task=:id_task";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":task_name", $this->task_name);
        $stmt->bindParam(":description_task", $this->description_task);
        $stmt->bindParam(":start_date", $this->start_date);
        $stmt->bindParam(":end_date", $this->end_date);
        $stmt->bindParam(":responsible_person", $this->responsible_person);
        $stmt->bindParam(":status_task", $this->status_task);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":id_task", $this->id_task);

        return $stmt->execute();
    }

    // Delete Task
    public function delete($id_task)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_task = :id_task";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_task", $id_task);
        return $stmt->execute();
    }
}
?>