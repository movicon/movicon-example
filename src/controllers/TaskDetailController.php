<?php
namespace controllers;
use \Exception;
use core\http\Controller;
use models\TaskModel;

class TaskDetailController extends Controller
{
    public $task;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->onGet([$this, "open"]);
    }

    /**
     * OPEN request handler.
     *
     * This method is fired before any other request handler and it's a good
     * place to initiate resources, such as database connections, etc...
     *
     * @return void
     */
    public function open()
    {
        $id = $this->getParam("id", ["required" => true]);

        $this->task = new TaskModel($this->db, $id);
        if (!$this->task->isFound()) {
            throw new Exception("Task not found");
        }
    }
}
