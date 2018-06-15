<?php
namespace controllers;
use core\http\Controller;
use models\TaskModel;

class TasksController extends Controller
{
    public function getList()
    {
        return TaskModel::getList($this->db);
    }
}
