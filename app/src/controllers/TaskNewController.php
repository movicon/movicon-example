<?php
namespace controllers;
use \Exception;
use core\http\Controller;
use models\TaskModel;

class TaskNewController extends Controller
{
    public $task;

    public function __construct()
    {
        parent::__construct();
        $this->onOpen([$this, "open"]);
        $this->onPost([$this, "post"]);
    }

    public function open()
    {
        $this->task = new TaskModel($this->db);
    }

    public function post()
    {
        $title = $this->getParam("title", ["required" => true]);
        $state = $this->getParam("state", ["default" => "open"]);

        if (!in_array($state, ["open", "close"])) {
            throw new Exception("Invalid state");
        }

        // updates the record
        $this->task->title = $title;
        $this->task->state = $state;
        $this->task->save();
        $this->task->refresh();
    }
}
