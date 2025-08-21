<?php
require_once __DIR__ . '/../models/Task.php';

class TaskController
{
    private $task;

    public function __construct()
    {
        $this->task = new Task();
    }

    public function create($data)
    {
        $this->task->task_name = $data['task_name'];
        $this->task->description_task = $data['description_task'];
        $this->task->start_date = $data['start_date'];
        $this->task->end_date = $data['end_date'];
        $this->task->responsible_person = $data['responsible_person'];
        $this->task->status_task = $data['status_task'];
        $this->task->rating = $data['rating'];

        return $this->task->create();
    }

    public function readAll()
    {
        return $this->task->readAll();
    }

    public function readOne($id)
    {
        return $this->task->readOne($id);
    }

    public function update($id, $data)
    {
        $this->task->id_task = $id;
        $this->task->task_name = $data['task_name'];
        $this->task->description_task = $data['description_task'];
        $this->task->start_date = $data['start_date'];
        $this->task->end_date = $data['end_date'];
        $this->task->responsible_person = $data['responsible_person'];
        $this->task->status_task = $data['status_task'];
        $this->task->rating = $data['rating'];

        return $this->task->update();
    }

    public function delete($id)
    {
        return $this->task->delete($id);
    }
}
?>