<?php
namespace controllers;
use core\http\Controller;
use models\TaskModel;

class TasksController extends Controller
{
    /**
     * Gets the list of tasks.
     *
     * @return TaksModel[]
     */
    public function getList()
    {
        return TaskModel::getList($this->db);
    }
}
