<?php
namespace controllers;
use \Exception;
use core\http\Controller;
use models\TaskModel;

class TaskNewController extends Controller
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
        $this->task = new TaskModel($this->db);
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
        $state = $this->getParam("state", ["default" => "open"]);

        // updates the record and refreshes it
        $this->task->title = $title;
        $this->task->state = $state;
        $this->task->save();
        $this->task->refresh();
    }
}
