<?php
namespace controllers;
use \Exception;
use core\http\Controller;
use models\TaskModel;

class TaskDetailController extends Controller
{
    public $task;

    public function __construct()
    {
        parent::__construct();
        $this->onGet([$this, "open"]);
    }

    public function open()
    {
        $id = $this->getParam("id", ["required" => true]);

        $this->task = new TaskModel($this->db, $id);
        if (!$this->task->isFound()) {
            throw new Exception("Task not found");
        }
    }
}
