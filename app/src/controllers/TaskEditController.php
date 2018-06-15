<?php
namespace controllers;
use \Exception;
use core\http\Controller;
use models\TaskModel;

class TaskEditController extends Controller
{
    public $task;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->onOpen([$this, "open"]);
        $this->onPost([$this, "post"]);
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

    /**
     * POST request handler.
     *
     * This method processes POST requests.
     *
     * @return void
     */
    public function post()
    {
        $title = $this->getParam("title", ["required" => true]);
        $state = $this->getParam("state", ["required" => true]);

        // updates the record and refreshes it
        $this->task->title = $title;
        $this->task->state = $state;
        $this->task->save();
        $this->task->refresh();
    }
}
