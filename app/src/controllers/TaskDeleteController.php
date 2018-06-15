<?php
namespace controllers;
use \Exception;
use core\http\Controller;
use models\TaskModel;

class TaskDeleteController extends Controller
{
    public $message = "";

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->onPost([$this, "post"]);
    }

    public function post()
    {
        $id = $this->getParam("id", ["required" => true]);

        $task = new TaskModel($this->db, $id);
        if (!$task->isFound()) {
            throw new Exception("Task not found");
        }

        $task->delete();
    }
}
